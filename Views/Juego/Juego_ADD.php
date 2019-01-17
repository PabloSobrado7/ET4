<?php
/* 
* Funcion: Vista que nos permite añadir un juego 
* Autor : Mario Gayoso Pérez
*/
class Juego_ADD {
	  function __construct(){

        $this->pinta();
    }
    //función que contiene la vista
    function pinta(){
        //comprueba si hay un idioma en $_SESSION
        //si no, inserta el idioma español
        if(!isset($_SESSION['idioma'])){
            $_SESSION['idioma'] = 'SPANISH';
        }

        include_once '../Locales/Strings_index.php';

        $stringslang;//almacena idioma
        $lang;//almacena el idioma en uso

        //bucle foreach que comprueba que idioma esta seleccionado para cargar los strings
        foreach($stringslang as $lang){
            //Comprueba que idioma está seleccionado y carga el strings correspondiente
            if($lang == $_SESSION['idioma'])
                include_once '../Locales/Strings_'. $lang .'.php';
        }

        include '../Views/HEADER_View.php';

        new HEADER();
        ?>
        <section>
            <div class="form">
                <?php

                ?>
                <h3><?php echo $strings['Añadir juego'];?></h3>
                <?php

                ?>
                <form class="form-basic" enctype="multipart/form-data" id="form"  method="post" action="../Controllers/JUEGO_Controller.php">
                    <div class="form-group">
                        <label class="form-label" for="id_juego"><?php echo $strings['ID Juego']; ?></label>
                        <input type="text" class="form-control" maxlength="15" size="15" id="id_juego" name="id_juego" onblur=" comprobarVacio(this); comprobarTexto(this, 15)" >
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="nombre_juego"><?php echo $strings['Nombre']; ?></label>
                        <input type="text" class="form-control" maxlength="20" size="15" id="nombre_juego" name="nombre_juego" onblur=" comprobarVacio(this); comprobarTexto(this, 20); comprobarAlfabetico(this,20)" >
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="plataforma"><?php echo $strings['Plataforma'];?></label>
                        <input type="text" class="form-control" maxlength="20" size="15" id="plataforma" name="plataforma" onblur=" comprobarVacio(this); comprobarTexto(this, 15);comprobarAlfabetico(this,20)" >
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="genero"><?php echo $strings['Genero'];?></label>
                        <input type="text" class="form-control" maxlength="20" size="15" id="genero" name="genero" onblur=" comprobarVacio(this); comprobarTexto(this, 15); comprobarAlfabetico(this,15)" >
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="precio_compra"><?php echo $strings['Precio compra'];?></label>
                        <input type="text" class="form-control" maxlength="15" size="15" id="precio_compra" name="precio_compra" onblur=" comprobarVacio(this); comprobarEntero(this,2,0,200)" >
                    </div>
					<div class="form-group">
                        <label class="form-label" for="categoria"><?php echo $strings['Categoria'];?></label>
                        <input type="text" class="form-control" maxlength="15" size="15" id="categoria" name="categoria" onblur=" comprobarVacio(this); comprobarTexto(this, 15); comprobarAlfabetico(this,15)">
                    </div>
                    <div>
                   	<label class="form-label" for="novedad"><?php echo $strings['Novedad'];?></label>
									 
				        <select name="novedad">
				          <option value="1">Sí</option>
				          <option value="0">No</option>
				        </select>
				    <label class="form-label" for="compra"><?php echo $strings['Compra'];?></label>
									 
				        <select name="compra">
				          <option value="1">Sí</option>
				          <option value="0">No</option>
				        </select>
				    <label class="form-label" for="venta"><?php echo $strings['Venta'];?></label>
									 
				        <select name="venta">
				          <option value="1">Sí</option>
				          <option value="0">No</option>
				        </select>
				    </div> 
                    <button name="action" value="ADD" type="submit" class="boton-env">
                        <img src="../Views/imgs/send.png" alt="">
                    </button>
                </form>
            </div>

            </div>
            <footer>
				<span><img style="height:60px; width:50px;" src="../Views/imgs/logolot.png"></span>
				<h6>Prueba formulario ADD Juego</h6>
            </footer>
        </section>
        
        <!--<?php include '../Views/js/validaciones.js'; ?>*/ -->
        <script type="text/javascript" src="../Views/js/validaciones.js"></script>
        </body>
        </html>
		
        <?php

    }
}
?>

