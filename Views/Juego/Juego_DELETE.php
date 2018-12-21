<?php

/**
 * Funcion: Vista que nos permite eliminar un juego
 * Autor: Mario Gayoso Pérez
 */

class Loteria_DELETE {

    function __construct($emailuser,$nombreuser,$apellidosuser,$participacionuser,$resguardouser,$ingresadouser,$premiopersonaluser,$pagadouser){

        $this->pinta($emailuser,$nombreuser,$apellidosuser,$participacionuser,$resguardouser,$ingresadouser,$premiopersonaluser,$pagadouser);

    }


    function pinta($emailuser,$nombreuser,$apellidosuser,$participacionuser,$resguardouser,$ingresadouser,$premiopersonaluser,$pagadouser){
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
                <h4><?php echo $strings['Delete']; ?></h4>
                <h4><?php echo $strings['Eliminarpart']; ?></h4>
                <form enctype="multipart/form-data" action="../Controllers/LOTERIAIU_Controller.php" method="post">
                    <ul>
                        <li>
                            <h5><?php echo $strings['#Juego']; ?></h5>
                            <span><?php echo $id_juego; ?></span>
                        </li>
						
						<li>
                            <h5><?php echo $strings['Nombre']; ?></h5>
                            <span><?php echo $nombre_juego; ?></span>
                        </li>
						
					    <li>
                            <h5><?php echo $strings['Plataforma']; ?></h5>
                            <span><?php echo $plataforma; ?></span>
                        </li>
						
						<li>
                            <h5><?php echo $strings['Genero']; ?></h5>
                            <span><?php echo $genero; ?></span>
                        </li>
						
						<li>
                            <h5><?php echo $strings['Precio']; ?></h5>
                            <span><?php echo $precio_compra; ?></span>
                        </li>
						
						<li>
                            <h5><?php echo $strings['Categoria']; ?></h5>
                            <span><?php echo $categoria_vendedor; ?></span>
                        </li>
						
						<li>
                            <h5><?php echo $strings['Novedad']; ?></h5>
                            <span><?php echo $novedad; ?></span>
                        </li>
						
						<li>
                            <h5><?php echo $strings['Compra']; ?></h5>
                            <span><?php echo $compra_juego; ?></span>
                        </li>
                        <li>
                            <h5><?php echo $strings['Venta']; ?></h5>
                            <span><?php echo $alquiler_juego; ?></span>
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
				<span><img style="height:60px; width:50px;" src="../Views/imgs/logolot.png"></span>
				<h6>Prueba formulario DELETE Juego</h6>
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
