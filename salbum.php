<?php
    include "inc/debug.php";
    
    $lista = 2;
    include "inc/cabecera.php"
?>  

    <section>
        <h2>Solicitud de inpresión de álbum</h2>
        <p>Mediante esta opción se puede solicitar la impresión y envío de uno de tus álbumes todo a color, toda resoulución.
        Aquí mostramos una tabla con las tarifas de impresión por página para que se pueda tener una idea del dinero que 
        se quiere gastar. Después de tenerlo claro, para continuar con la solicitud, se deberá completar un formulario 
        para realizar el pedido final.</p>
        <h3>Tabla de PHP</h3>
        <article>
            <table>
               <?php                
                $ppagina;
                $pfoto = 0.02;
                $pfotocolor = 0.05;
                
        
            for($i = 1; $i < 3; $i++){       
                if($i == 1)
                    echo "<tr><th></th>
                        <th></th>
                        <th colspan='2'>Blanco y Negro</th>
                        <th colspan='2'>Color</th></tr>";  
                else
                echo "<tr><th>Nº de Páginas</th>
                        <th>Nº de Fotos</th>
                        <th>150-300 dpi</th>
                        <th>450-900 dpi</th>
                        <th>150-300 dpi</th>
                        <th>450-900 dpi</th>";                
            }
        
            for($i = 1; $i < 16; $i++){
                $acum;
                $cont1; $cont2; $cont3; $cont4; //cont x columnas
                $fotos = $i*3; 
        
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
                $cont2 = $cont1 + $fotos * $pfoto;
                $cont3 = $cont1 + $fotos * $pfotocolor;
                $cont4 = $cont1 + $fotos * ($pfoto + $pfotocolor); 
        
                
                echo "<tr><td>$i</td><td>$fotos</td><td>$cont1</td><td>$cont2</td><td>$cont3</td><td>$cont4</td>";
                //añade texto al div creado;
            }

               ?> 
            </table>
        </article><br>

        <h3>Tabla de JavaScript</h3>
        <article>
            <table id = "precios"></table>
        </article><br>

        <article class="estiqui" id="estiqui">
            <h3>Tarifas</h3>
            <table>
                <tr>
                    <th>Concepto</th>
                    <th>Tarifa</th>
                </tr>
                <tr>
                    <td>&lt;5 páginas</td>
                    <td>0.10 &euro; por pág.</td>
                </tr>
                <tr>
                    <td>entre 5 y 11 páginas</td>
                    <td>0.08 &euro; por pág.</td>
                </tr>
                <tr>
                    <td>&gt;11 páginas</td>
                    <td>0.07 &euro; por pág.</td>
                </tr>
                <tr>
                    <td>Blanco y negro</td>
                    <td>0 &euro;</td>
                </tr>
                <tr>
                    <td>Color</td>
                    <td>0.05 &euro; por foto</td>
                </tr>
                <tr>
                    <td>resolución &gt; 300 dpi</td>
                    <td>0.02 &euro; por foto</td>
                </tr>
            </table>
        </article>
        <article>
	    <h3>Formulario de solicitud</h3>
            <p>Rellena el siguiente formulario aportando todos los detalles para confeccionar tu álbum</p>
            <p>Todos los campos con un * son obligatorios</p>
            <form method="post" action="ralbum.php">
                
                    <label for="nombre">Nombre:*</label> <input type="text" name="nombre" id="nombre" placeholder="Juanico banana" maxlength="200" required>
                    <label for="titulo">Título:*</label> <input type="text" name="titulo" id="titulo" placeholder="Hola Presidente" maxlength="200" required>
                    <label for="t_adicional">Texto adicional:</label> <input type="text" name="t_adicional" id="t_adicional" placeholder="Para Serafín..." maxlength="4000">
                    <label for="email">Email:*</label> <input type="email" name="email" id="email" placeholder="juan@email.com" maxlength="200" required>
                    <!-- dirección formato para hacer los campor (calle nº, piso, puerta, cod postal, localidad, provincia y país)-->
                    <fieldset>
                        <legend>Dirección</legend>
                        <label for="calle">Calle:*</label> <input type="text" name="calle" id="calle" placeholder="Lillojuan" maxlength="200" required>
                        <label for="nportal">Número:*</label> <input type="number" name="nportal" id="nportal" placeholder="42" required>
                        <label for="piso">Piso:</label> <input type="number" name="piso" id="piso" placeholder="3º">
                        <label for="puerta">Puerta:</label> <input type="text" name="puerta" id="puerta" placeholder="A" maxlength="10">
                        <label for="cp">Código postal:*</label> <input type="number" name="cp" id="cp" placeholder="03570" required>
                        <label for="localidad">Localidad:*</label> <input type="text" name="localidad" id="localidad" placeholder="La Vila Joiosa" maxlength="200" required>
                        <label for="provincia">Província:*</label> <input type="text" name="provincia" id="provincia" placeholder="Alacant" maxlength="200" required>
                        <label for="pais">País:</label>
                        <select name="pais" id="pais">
                            <option value="Alemania">Alemania</option>
                            <option value="Austria">Austria</option>
                            <option value="China">China</option>
                            <option value="España">España</option>
                            <option value="EEUU">EEUU</option>
                            <option value="Francia">Francia</option>
                            <option value="Inglaterra">Inglaterra</option>
                            <option value="Italia">Italia</option>
                            <option value="Rusia">Rusia</option>                   
                            <option value="Venezuela">Venezuela</option>
                        </select>
                    </fieldset>
                    
                    <label for="telf">Teléfono:</label> <input type="tel" name="telf" id="telf" placeholder="123123123">
                    <!-- selector de color mirar-->
                    <label for="color">Color de la portada:</label> <input type="color" name="color" id="color" value="#000000">
                    <label for="ncopias">Número de copias:</label> <input type="number" name="ncopias" id="ncopias" value="1" min="1">
                    <label for="resolucion">Resolución:</label> <input type="number" name="resolucion" id="resolucion" value="150" min="150" max="900" step="150">
                    <!-- elegir album -->
                    <div>
                        <label>Selecciona un álbum:*</label> <br>
                        <input type="radio" id="album1" name="albumes" value="Verano 2010" required>
                            <label for="album1">Verano 2010</label>
                        <input type="radio" id="album2" name="albumes" value="Barcelona">
                            <label for="album2">Barcelona</label> 
                        <input type="radio" id="album3" name="albumes" value="Boda Juan">
                            <label for="album3">Boda Juan</label>
                    </div>
                    
                    <label for="frecepcion">Fecha de recepción:</label> <input type="date" name="frecepcion" id="frecepcion">
                    <div>
                        <label>Impresión a color:</label> <br>
                        <input type="radio" id="byn" name="impresion" value="Blanco y negro">
                            <label for="byn">Blanco y negro</label>
                        <input type="radio" id="acolor" name="impresion" value="A color">
                            <label for="acolor">A color</label>
                    </div>                   

                    <input type="submit" value="Enviar" class="btn">
                    
            </form>
        </article>
    </section>
    <script>
        precios();
    </script>
    <?php
    include "inc/footer.php"
?>