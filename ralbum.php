<?php
    $lista = 2; 
    include "inc/cabecera.php";
    include "inc/debug.php";

    #debug($_POST["impresion"]);
    echo <<<hereDOC
    
    <section>                
        <h2>Solicitud confirmada</h2>   
        <p><b>{$_POST["nombre"]}</b>, su solicitud ha sido aceptada y va a ser procesada para imprimir un total de 
        <b>{$_POST["ncopias"]}</b> copia/s del álbum <b>{$_POST["albumes"]}</b> y se enviará con el título 
        <b>{$_POST["titulo"]}</b> a <b>{$_POST["calle"]} nº{$_POST["nportal"]}</b>
hereDOC;

if(strcmp($_POST["piso"],"") != "0" && strcmp($_POST["puerta"],"") != "0")
    echo "<b>piso {$_POST["piso"]}, puerta {$_POST["puerta"]}</b>";
else if(strcmp($_POST["piso"],"") != "0" && strcmp($_POST["puerta"],"") == "0")
    echo "<b>piso {$_POST["piso"]}</b>"; 
else if(strcmp($_POST["piso"],"") == "0" && strcmp($_POST["puerta"],"") != "0")
    echo "<b>puerta {$_POST["puerta"]}</b>";  

    echo ", a la localidad <b>{$_POST["localidad"]}</b>, en la provincia <b>{$_POST["provincia"]}</b>, con el código postal <b>{$_POST["cp"]}</b>, en el país <b>{$_POST["pais"]}</b>.</p>";

    echo "<p>El precio de la operación será <b>€18,21</b>";


if (!isset($_POST["impresion"]) || (strcmp($_POST["impresion"],"Blanco y negro") == "0"))
    echo "<b> sin coste adicional por la impresión a blanco y negro</b>";
else
    echo "<b> con coste adicional por la impresión a color</b>";


    echo " con una resolución de <b>{$_POST["resolucion"]}</b> por foto.</p>";
if(strcmp($_POST["frecepcion"],"") != "0")
    echo "<p>La recepción de su pedido será alrededor de la fecha <b>25/08/2022</b>.</p>";

   
if(strcmp($_POST["t_adicional"],"") != 0)
    echo "<p>Texto adicional: <b> {$_POST["t_adicional"]}</b></p>";

    echo "<p>Color de la portada: <b> {$_POST["color"]}</b></p>";
echo <<<hereDOC
        <h3>Información adjunta</h3>
        <p>Email: <b>{$_POST["email"]}</b> </p>
hereDOC;
if(strcmp($_POST["telf"],"") != 0)
        echo "<p>Teléfono: <b> {$_POST["telf"]}</b></p>";

    include "inc/footer.php"
?>