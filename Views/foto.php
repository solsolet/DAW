<?php  
    include "inc/devolver.php";
    $titulo = "Foto";
    $lista = 2;
    include "inc/cabecera.php";

    if($_GET){
        if($id%2==0){
            echo<<<hereDOC
                <section class="foto">
                    <img src="imagenes/rashito.jpeg" alt="El Rasho Macuin FIAUUUUUUUUU" width="272" height="108">
                    <h2>Rayo Mqueen</h2>
                    <p>01-11-2020</p>
                    <p>EEUU</p>
                    <p>Cars</p>
                    <p>Usuario1</p>
                </section>
hereDOC;
        }
        else{
            echo<<<hereDOC
                <section class="foto">
                    <img src="imagenes/francesco.jpg" alt="La Maquina Mas Blos, de TOTE ITALE FIAUUUUU" width="272" height="108"></a>
                    <h3>Francesco Virgoarticleni</h3>
                    <p>08-04-2014</p>
                    <p>Italia</p>
                    <p>Cars</p>
                    <p>Usuario1</p>
                </section>
hereDOC;
        }
    }
    
    include "inc/footer.php"
?>