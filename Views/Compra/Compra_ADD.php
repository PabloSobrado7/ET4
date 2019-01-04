<?php

/**
 * Funcion: Vista que nos permite añadir una compra
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
 */
 class Compra_ADD {

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
                <h3>Realizar compra</h3>
                <?php

                ?>
                <form class="form-basic" enctype="multipart/form-data" id="form"  method="post" action="../Controllers/COMPRA_Controller.php">
                    <div class="form-group">
                        <label class="form-label" for="login_socio">Login socio</label>
                        <input type="text" class="form-control" maxlength="15" size="15" id="login_socio" name="login_socio">
                    </div>
	
					 <div class="form-group">
                        <label class="form-label" for="id_juego">Id Juego</label>
                        <input type="text" class="form-control" id="id_juego" name="id_juego">
                    </div>
					
					 <div class="form-group">
                        <label class="form-label" for="fecha_compra">Fecha compra</label>
                        <input type="date" class="form-control" id="fecha_compra" name="fecha_compra">
                    </div>
					
                    <button name="action" value="ADD" type="submit" class="boton-env">
                        <img src="../Views/imgs/send.png" alt="">
                    </button>
                </form>
            </div>

            </div>
            <footer>
				<h6>GAMERENTING - 2018</h6>
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