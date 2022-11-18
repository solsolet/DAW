<?php
    include "inc/devolver.php";
    $titulo = "Solicitud";
    $lista = 2; 
    include "inc/cabecera.php";
    include "inc/debug.php";

    $i = 12;
    $acum;
    $cont1; 
    $coste; 
    $fotos = $i*3; 
    $pfoto = 0.02;
    $pfotocolor = 0.05;

    if($i < 5){
        $ppagina = 0.1;
        $cont1 = $i * $ppagina;    
    }            
    else if($i >= 5 && $i <= 11){
        $acum = 0.4;
        $ppagina = 0.08;
        $cont1 = ($i-4)*$ppagina+$acum;
    }
    else {
        $acum = 0.96;
        $ppagina = 0.07;
        $cont1 = ($i-11)*$ppagina+$acum;
    }

    if (!isset($_POST["impresion"]) || (strcmp($_POST["impresion"],"Blanco y negro") == "0")){
        
        if($_POST["resolucion"] <= 300)
            $coste = $cont1;
        else
            $coste = $cont1 + $fotos * $pfoto;
    }
    else {
        if($_POST["resolucion"] <= 300)
            $coste = $cont1 + $fotos * $pfotocolor;
        else
            $coste = $cont1 + $fotos * ($pfoto + $pfotocolor);
    }

    $coste *= $_POST["ncopias"];
    debug($_SERVER['HTTP_REFERER']);
    echo <<<hereDOC
    
    <section>                
        <h2>Solicitud confirmada</h2>   
        <p><b>{$_POST["nombre"]}</b>, su solicitud ha sido aceptada y va a ser procesada para imprimir un total de 
        <b>{$_POST["ncopias"]}</b> copia/s del álbum <b>{$_POST["albumes"]}</b> y se enviará con el título 
        <b>{$_POST["titulo"]}</b> a <b>{$_POST["calle"]} nº{$_POST["nportal"]}</b>
hereDOC;

if(strcmp($_POST["piso"],"") != "0" && strcmp($_POST["puerta"],"") != "0")
    echo ", piso <b>{$_POST["piso"]}º</b>, puerta <b>{$_POST["puerta"]}</b>";
else if(strcmp($_POST["piso"],"") != "0" && strcmp($_POST["puerta"],"") == "0")
    echo ", piso <b>{$_POST["piso"]}</b>"; 
else if(strcmp($_POST["piso"],"") == "0" && strcmp($_POST["puerta"],"") != "0")
    echo ", puerta <b>{$_POST["puerta"]}</b>";  

    echo ", a la localidad <b>{$_POST["localidad"]}</b>, en la provincia <b>{$_POST["provincia"]}</b>, con el código postal 
    <b>{$_POST["cp"]}</b>, en el país <b>{$_POST["pais"]}</b>.</p>";

    echo "<p>El precio de la operación será <b>€$coste</b>";


if (!isset($_POST["impresion"]) || (strcmp($_POST["impresion"],"Blanco y negro") == "0"))
    echo "<b> sin coste adicional por la impresión a blanco y negro</b>";
else
    echo "<b> con coste adicional por la impresión a color</b>";

    echo " con una resolución de <b>{$_POST["resolucion"]}dpi</b> por foto.</p>";
if(strcmp($_POST["frecepcion"],"") != "0")
    echo "<p>La recepción de su pedido será alrededor de la fecha <b>{$_POST["frecepcion"]}</b>.</p>";

   
if(strcmp($_POST["t_adicional"],"") != 0)
    echo "<p>Texto adicional: <b>{$_POST["t_adicional"]}</b></p>";

    echo "<p>Color de la portada: <b>{$_POST["color"]}</b></p>";
echo <<<hereDOC
        <h3>Información adjunta</h3>
        <p>Email: <b>{$_POST["email"]}</b> </p>
hereDOC;
if(strcmp($_POST["telf"],"") != 0)
        echo "<p>Teléfono: <b> {$_POST["telf"]}</b></p>";

    echo"</section>";
    include "inc/footer.php"
?>