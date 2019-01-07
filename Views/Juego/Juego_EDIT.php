<?php

/**
 * Funcion: Vista que nos permite editar un juego
 * Autor: Mario Gayoso Perez 

 */
 class Juego_EDIT {

    function __construct($id_juego,$nombre_juego,$plataforma,
	$genero,$precio_compra,$categoria,$novedad,$compra,$venta){

        $this->pinta($id_juego,$nombre_juego,$plataforma,
	$genero,$precio_compra,$categoria,$novedad,$compra,$venta);

    }


    //función que contiene la vista
    function pinta($id_juego,$nombre_juego,$plataforma,
    $genero,$precio_compra,$categoria,$novedad,$compra,$venta){
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
              
                <h3>Editar</h3>
               
        <form class="form-basic" enctype="multipart/form-data" id="form"  method="post" action="../Controllers/JUEGO_Controller.php">
                   <div class="form-group">
                        <label class="form-label" for="id_juego">#Juego</label>
                        <input type="text" class="form-control" maxlength="15" size="15" id="id_juego" name="id_juego" value="<?php echo $id_juego; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="nombre_juego">Nombre</label>
                        <input type="text" class="form-control" maxlength="20" size="15" id="nombre_juego" name="nombre_juego" value="<?php echo $nombre_juego; ?>">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="plataforma">Plataforma</label>
                        <input type="text" class="form-control" maxlength="20" size="15" id="plataforma" name="plataforma" value="<?php echo $plataforma; ?>">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="genero">Genero</label>
                        <input type="text" class="form-control" maxlength="20" size="15" id="genero" name="genero" value="<?php echo $genero; ?>">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="precio_compra">Precio Compra</label>
                        <input type="text" class="form-control" maxlength="15" size="15" id="precio_compra" name="precio_compra" value="<?php echo $precio_compra; ?>">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="categoria">Categoria</label>
                        <input type="text" class="form-control" maxlength="15" size="15" id="categoria" name="categoria" value="<?php echo $categoria; ?>">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="novedad">Novedad</label>
                        <input type="text" class="form-control" maxlength="15" size="15" id="novedad" name="novedad" value="<?php echo $novedad; ?>">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="compra">Compra</label>
                        <input type="text" class="form-control" maxlength="15" size="15" id="compra" name="compra" value="<?php echo $compra; ?>">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="venta">Venta</label>
                        <input type="text" class="form-control" maxlength="15" size="15" id="venta" name="venta" value="<?php echo $venta; ?>">
                    </div>
						                
					   
                    
                    <button name="action" value="EDIT" type="submit" class="boton-env">
                        <img src="../Views/imgs/send.png" alt="">
                    </button>
                </form>
            </div>

            </div>
            <footer>
				<span><img style="height:60px; width:50px;" src="../Views/imgs/logolot.png"></span>
				<h6>Prueba de Formulario EDIT</h6>
            </footer>
        </section>
        <!--<script src="../Views/js/md5.js"></script>
        <?php include '../Views/js/validaciones.js'; ?>
        <script src="../Views/js/main.js"></script>-->
        </body>
        </html>
		<script src="../js/validaciones.js"></script> 

        
        <?php
    }
   

    
}
?>
