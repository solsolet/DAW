<?php
    $bool = false;
    include "inc/debug.php";
    if(isset($_GET['pasado']))
        $pasado = $_GET['pasado'];
    else
        $pasado;
    
    global $mensaje;
    $lista = 2;
    global $usuario; global $clave; global $clave2; global $email; global $genero; global $fecha; global $ciudad; global $pais;   
    
    if (!isset($_POST["usuario"]) || (strcmp($_POST["usuario"],"") == "0")){
        $bool = true;
        $mensaje = "El usuario no puede estar vacío.<br>";

    }
    if (!isset($_POST["clave"]) || (strcmp($_POST["clave"],"") == "0")){
        $bool = true;    
        $mensaje = $mensaje."La contraseña no puede estar vacía.<br>";
        
    }
    else if ((isset($_POST["clave"])) && (!isset($_POST["clave2"]) || (strcmp($_POST["clave2"],$_POST["clave"]) != "0"))){
        $bool = true;
        $mensaje = $mensaje."Las contraseñas tienen que coincidir.";
    }
    
    if($bool == true && $pasado == true){
        $extra = 'registro?mensaje='.$mensaje;
        if (isset($_POST["usuario"]))
        $extra = $extra."&usu=".$_POST["usuario"];

        if (isset($_POST["clave"])) 
        $extra = $extra."&clv=".$_POST["clave"];

        if (isset($_POST["clave2"]) )   
        $extra = $extra."&clv2=".$_POST["clave2"];

        if (isset($_POST["email"]))
        $extra = $extra."&email=".$_POST["email"]; 

        if (isset($_POST["genero"]))
        $extra = $extra."&gen=".$_POST["genero"];

        if (isset($_POST["fdn"]))
        $extra = $extra."&fdn=".$_POST["fdn"];

        if (isset($_POST["ciudad"]))
        $extra = $extra."&ciu=".$_POST["ciudad"];

        if (isset($_POST["pais"]))
        $extra = $extra."&pais=".$_POST["pais"];

        /* Redirecciona a una página diferente que se encuentra en el directorio actual */
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');       
        header("Location: http://$host$uri/$extra");
        exit;
    }

if($bool == false){
    $lista = 2;
    include "inc/cabecera.php"; 

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

    include "inc/footer.php";
}
?>