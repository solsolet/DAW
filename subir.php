<?php
    $lista = 2;
    include "inc/cabecera.php"
?>  

    <section>
        <h2>Crear álbum</h2>
        <form>
            <fieldset>
                <label for="img">Foto:</label> <input type="file" id="img" name="img" accept="image/*" class="archivo" required><br>
                <input type="submit" value="Subir Imagen" class="btn">
            </fieldset>
        </form> 
            
    </section>    
    <?php
    include "inc/footer.php"
?>