<?php
    
    $bool = false;
    if(isset($_GET['pasado']))
        $pasado = $_GET['pasado'];
    else
        $pasado;
    
    global $mensaje;
    $titulo = "Registro";
    $lista = 2;
    global $usuario; global $clave; global $clave2; global $email; global $genero; global $fecha; global $ciudad; global $pais;   
    $expU = "/^[a-zA-Z]{1}[a-zA-Z0-9]{2,14}$/";
    $expC = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*_-]).{6,15}$/";
    $expE = "/^(?!\.)(?!.*\.$)(?!.*\.\.)[a-zA-Z0-9!#$%&'*+\-=\/?^_`{|}.]{1,64}@[a-zA-Z0-9\-]{1,254}$/";

    $mensaje = "";

    if (!isset($_POST["usuario"]) || (strcmp($_POST["usuario"],"") == "0") || preg_match($expU, $_POST['usuario']) == 0){
        $bool = true;
        $mensaje .= "Formato de usuario incorrecto.<br>";

    }
    if (preg_match($expC, $_POST['clave']) == 0){
        $bool = true;    
        $mensaje .= "Formato de contraseña incorrecto.<br>";
        
    }
    else if ((isset($_POST["clave"])) && (!isset($_POST["clave2"]) || (strcmp($_POST["clave2"],$_POST["clave"]) != "0"))){
        $bool = true;
        $mensaje .= "Las contraseñas tienen que coincidir.<br>";
    }

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) || !str_contains($_POST['email'], "@")){
        $bool = true;
        $mensaje .= "Formato de email incorrecto.<br>";
    }

    if (!isset($_POST['genero'])){
        $bool = true;
        $mensaje .= "Debes elegir un género con el que te identifiques.<br>";
    }

    if($_POST['fdn'] == "" || $_POST['fdn'] > date('Y-m-d', strtotime('18 years ago'))){
        $bool = true;
        $mensaje .= "Debes ser mayor de 18 años.";
    }
    
    if($bool == true && $pasado == true){
        $extra = 'registro?mensaje='.$mensaje;
        if (isset($_POST["usuario"]))
        $extra .= "&usu=".$_POST["usuario"];

        if (isset($_POST["clave"])) 
        $extra .= "&clv=".$_POST["clave"];

        if (isset($_POST["clave2"]) )   
        $extra .= "&clv2=".$_POST["clave2"];

        if (isset($_POST["email"]))
        $extra .= "&email=".$_POST["email"]; 

        if (isset($_POST["genero"]))
        $extra .= "&gen=".$_POST["genero"];

        if (isset($_POST["fdn"]))
        $extra .= "&fdn=".$_POST["fdn"];

        if (isset($_POST["ciudad"]))
        $extra .= "&ciu=".$_POST["ciudad"];

        if (isset($_POST["pais"]))
        $extra .= "&pais=".$_POST["pais"];

        /* Redirecciona a una página diferente que se encuentra en el directorio actual */
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');       
        header("Location: http://$host$uri/$extra");
        exit;
    }

if($bool == false){
    
    $foto = "predeterminado.jpg";
    if(isset($_FILES['img']) && !isset($_POST['borrar']) && $_FILES['img']['error'] != 4) {
        $target_dir = "imagenes/";
        $target_file = $target_dir . basename($_FILES["img"]["name"]);
        $foto = $_FILES["img"]["name"];
        move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
        // Checkea si existe (img con mismo nombre)
        
        
        //print_r($_FILES);
    }   
    session_start();
    $_SESSION['usuario'] = $_POST['usuario'];
    $_SESSION['estilo'] = "estilo/estilo.css";

    $lista = 2;
    include "inc/cabecera.php"; 

    if($_POST['genero'] == "Hombre"){
        $gen = 0;
    }
    else if ($_POST['genero'] == "Mujer"){
        $gen = 1;
    }
    else if ($_POST['genero'] == "Otro")
        $gen = 2;

    include "inc/conect.php";
    if($_POST['pais'] == "vacio"){            
        $pa = 4;
    }
    else {
        $sentencia = 'SELECT idPais FROM paises WHERE nomPais = "'.$_POST['pais'].'"';
        include "inc/request.php";
        $pais = $resultado -> fetch_assoc();
        $pa = $pais['idPais'];
    }

    $fecha = date("Y-m-d");
    $hora = date("H:i:s");
    $sentencia = 'INSERT into usuarios (nomUsuario, clave, email, sexo, fNacimiento, ciudad, pais, foto, fRegistro, estilo)
                values ("'.$_POST['usuario'].'", "'.$_POST['clave'].'", "'.$_POST['email'].'", "'.$gen.'", "'.$_POST['fdn'].'", "'.$_POST['ciudad'].'", 
                '.$pa.', "imagenes/'.$foto.'", "'.$fecha.' '.$hora.'", 3)';
    
    
    include "inc/request.php";

echo <<< hereDOC

    <section>
    <h2>Nuevo Usuario Registrado</h2>
    <p>Usuario: <b>{$_POST["usuario"]}</b>
hereDOC;  


if(strcmp($_POST["email"],"") != 0){
echo "<br>Email: <b>{$_POST["email"]}</b>";
}
if(isset($_POST["genero"])){
echo "<br>Género: <b>{$_POST["genero"]}</b>";
}
if(strcmp($_POST["fdn"],"") != 0){
echo "<br>Fecha de nacimiento: <b>{$_POST["fdn"]}</b>";
}
if(strcmp($_POST["ciudad"],"") != 0){
echo "<br>Ciudad: <b>{$_POST["ciudad"]}</b>";
}
if(isset($_POST['pais']) && strcmp($_POST['pais'],"vacio")!=0){
echo "<br>País: <b>{$_POST["pais"]}</b>";
}
    echo "</p></section>";

    $mysqli -> close();
    include "inc/footer.php";
}
?>