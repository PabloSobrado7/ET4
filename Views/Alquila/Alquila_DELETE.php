<?php

/**
 * Funcion: Vista que nos permite eliminar un alquiler
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
 */

class Alquila_DELETE {

    function __construct($login_socio,$id_tarifa,$fecha_alquiler,$id_juego){

        $this->pinta($login_socio,$id_tarifa,$fecha_alquiler,$id_juego);

    }


    function pinta($login_socio,$id_tarifa,$fecha_alquiler,$id_juego){
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

            <div class="form2">
                <h4>Eliminar</h4>
                <h4>Eliminar alquiler</h4>
                <form enctype="multipart/form-data" action="../Controllers/ALQUILA_Controller.php" method="post">
                    <ul>
                        <li>
                            <h5>Login socio</h5>
                            <span><?php echo $login_socio; ?></span>
							<input type="hidden" name="login_socio" value="<?php echo $login_socio; ?>">
							 </li>
						
						<li>
                            <h5>Id Tarifa</h5>
                            <span><?php echo $id_tarifa; ?></span>
							<input type="hidden" name="id_tarifa" value="<?php echo $id_tarifa; ?>">
		
                        </li>
						
					    <li>
                            <h5>Fecha alquiler</h5>
							<span><?php echo $id_juego; ?></span>
							<input type="hidden" name="id_juego" value="<?php echo $id_juego; ?>">
                        </li>

						<li>
                            <h5>Id Juego</h5>
                            <span><?php echo $fecha_alquiler; ?></span>
							<input type="hidden" name="fecha_alquiler" value="<?php echo $fecha_alquiler; ?>">
                        </li>

                    </ul>
                    <div class="boton-grup">

                        <div class="boton-grup">
                            <button name="action" value="DELETE" class="boton-env">
                                <img src="../Views/imgs/delete.png" alt="">
                            </button>
                            <button name="action" value="" class="boton-env">
                                <img src="../Views/imgs/return.png" alt="" >
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <footer>
				<h6>GAMERENTING - 2018</h6>
            </footer>
        </section>
        <!--<script src="../js/main.js"></script>
        <?php include '../Views/js/validaciones.js' ?>-->
        </body>
        </html>

        <?php

    }
}
?>