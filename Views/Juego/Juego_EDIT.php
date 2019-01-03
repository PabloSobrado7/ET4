<?php

/**
 * Funcion: Vista que nos permite editar un juego
 * Autor: Mario Gayoso Perez 

 */
 class Juego_EDIT {

    function __construct($id_juego,$nombre_juego,$plataforma,
	$genero,$precio_compra,$categoria_vendedor,$novedad,$compra_juego,$venta_juego){

        $this->pinta($id_juego,$nombre_juego,$plataforma,
	$genero,$precio_compra,$categoria_vendedor,$novedad,$compra_juego,$venta_juego);

    }


    //función que contiene la vista
    function pinta($id_juego,$nombre_juego,$plataforma,
    $genero,$precio_compra,$categoria_vendedor,$novedad,$compra_juego,$venta_juego){
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
              
                <h3><?php echo $strings['Editarpart']; ?></h3>
               
        <form class="form-basic" enctype="multipart/form-data" id="form"  method="post" action="../Controllers/JUEGO_Controller.php">
                   <div class="form-group">
                        <label class="form-label" for="id_juego">#Juego</label>
                        <input type="text" class="form-control" maxlength="15" size="15" id="id_juego" name="id_juego">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="nombre_juego">Nombre</label>
                        <input type="text" class="form-control" maxlength="20" size="15" id="nombre_juego" name="nombre_juego">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="plataforma">Plataforma</label>
                        <input type="text" class="form-control" maxlength="20" size="15" id="plataforma" name="plataforma">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="genero">Genero</label>
                        <input type="text" class="form-control" maxlength="20" size="15" id="genero" name="genero">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="precio_compra">Precio Compra</label>
                        <input type="text" class="form-control" maxlength="15" size="15" id="precio_compra" name="precio_compra">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="categoria_vendedor">Categoria</label>
                        <input type="text" class="form-control" maxlength="15" size="15" id="categoria_vendedor" name="categoria_vendedor">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="login">Novedad</label>
                        <input type="text" class="form-control" maxlength="15" size="15" id="novedad" name="novedad">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="compra_juego">Compra</label>
                        <input type="text" class="form-control" maxlength="15" size="15" id="compra_juego" name="compra_juego">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="venta_juego">Venta</label>
                        <input type="text" class="form-control" maxlength="15" size="15" id="venta_juego" name="venta_juego">
                    </div>
						                
					   
                    
                    <button name="action" value="EDIT" type="submit" class="boton-env">
                        <img src="../Views/imgs/send.png" alt="">
                    </button>
                </form>
            </div>

            </div>
            <footer>
				<span><img style="height:60px; width:50px;" src="../Views/imgs/logolot.png"></span>
				<h6>Loteria ESEI</h6>
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
