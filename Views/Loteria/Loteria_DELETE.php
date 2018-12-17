<?php

/**
 * Funcion: Vista que nos permite eliminar una loteria
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
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
                            <h5><?php echo $strings['Email']; ?></h5>
                            <span><input type="hidden" name="emailuser" value="<?php echo $emailuser; ?>"><?php echo $emailuser; ?></span>
                        </li>
						
						<li>
                            <h5><?php echo $strings['Name']; ?></h5>
                            <span><?php echo $nombreuser; ?></span>
                        </li>
						
					    <li>
                            <h5><?php echo $strings['Surname']; ?></h5>
                            <span><?php echo $apellidosuser; ?></span>
                        </li>
						
						<li>
                            <h5><?php echo $strings['Participacion']; ?></h5>
                            <span><?php echo $participacionuser; ?></span>
                        </li>
						
						<li>
                            <h5><?php echo $strings['Resguardo']; ?></h5>
                            <span><?php echo $resguardouser; ?></span>
                        </li>
						
						<li>
                            <h5><?php echo $strings['Ingresado']; ?></h5>
                            <span><?php echo $ingresadouser; ?></span>
                        </li>
						
						<li>
                            <h5><?php echo $strings['Premiopersonal']; ?></h5>
                            <span><?php echo $premiopersonaluser; ?></span>
                        </li>
						
						<li>
                            <h5><?php echo $strings['Pagado']; ?></h5>
                            <span><?php echo $pagadouser; ?></span>
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
				<h6>Loteria ESEI</h6>
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