<?php
    $lista = 1;
    include "inc/cabecera.php"
?>  

    <section>
        <h2>Registro</h2>
        <form method="post">
                <label for="usuario">Usuario:</label> <input type="text" name="usuario" id="usuario"  >
                <label for="clave">Contraseña:</label> <input type="password" name="clave" id="clave"  >
                <label for="clave2">Repetir contraseña:</label> <input type="password" name="clave2" id="clave2"  >
                <label for="email">Email:</label> <input type="email" name="email" id="email"  >
                <div>
                    <label>Género:</label> <br>
                    <input type="radio" id="generoh" name="genero" value="Hombre">
                        <label for="generoh">Hombre</label>
                    <input type="radio" id="generom" name="genero" value="Mujer">
                        <label for="generom">Mujer</label> 
                    <input type="radio" id="generoo" name="genero" value="Otro">
                        <label for="generoo">Otro</label>
                </div>

                <label for="fdn">Fecha de nacimiento:</label> <input type="date" name="fdn" id="fdn"  >
                <label for="ciudad">Ciudad:</label> <input type="text" name="ciudad" id="ciudad"  >
                <label for="pais">Pa&iacute;s</label>
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
                    <!--Aquí debería haber un 👍-->
                    <label for="img">Foto:</label>
                <label for="img" class="file">Elige una foto</label> <input type="file" id="img" name="img" accept="image/*"  >
            
                <input type="button" value="Registrar" class="btn" id="pulsame">   
        </form>
    </section>
        
    <?php
    include "inc/footer.php"
?>