<?php

/**
 * Funcion: Vista que nos permite eliminar una loteria
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
 */

class Socio_DELETE {

    function __construct($login_socio,$pass_socio,$dni_socio,$nombre_socio,$apellidos_socio,$email_socio,$telefono_socio,$socio_bloqueado){

        $this->pinta($login_socio,$pass_socio,$dni_socio,$nombre_socio,$apellidos_socio,$email_socio,$telefono_socio,$socio_bloqueado);

    }


    function pinta($login_socio,$pass_socio,$dni_socio,$nombre_socio,$apellidos_socio,$email_socio,$telefono_socio,$socio_bloqueado){
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
               <h4><?php echo $strings['Eliminar socio']; ?></h4>
                <form enctype="multipart/form-data" action="../Controllers/SOCIO_Controller.php" method="post">
                    <ul>
                        <li>
                            <h5><?php echo $strings['Login']; ?></h5>
                            <span><input type="hidden" name="login_socio" value="<?php echo $login_socio; ?>"><?php echo $login_socio; ?></span>
                        </li>

                         <li>
                            <h5><?php echo $strings['Password']; ?></h5>
                            <span><input type="hidden" name="pass_socio" value="<?php echo $pass_socio; ?>"><?php echo $pass_socio; ?></span>
                        </li>

                         <li>
                            <h5><?php echo $strings['DNI']; ?></h5>
                            <span><input type="hidden" name="dni_socio" value="<?php echo $dni_socio; ?>"><?php echo $dni_socio; ?></span>
                        </li>
						
						<li>
                            <h5><?php echo $strings['Nombre']; ?></h5>
                            <span><?php echo $nombre_socio; ?></span>
                        </li>
						
					    <li>
                            <h5><?php echo $strings['Apellidos']; ?></h5>
                            <span><?php echo $apellidos_socio; ?></span>
                        </li>

                         <li>
                            <h5><?php echo $strings['Email']; ?></h5>
                            <span><input type="hidden" name="email_socio" value="<?php echo $email_socio; ?>"><?php echo $email_socio; ?></span>
                        </li>
						
						 <li>
                            <h5><?php echo $strings['Telefono']; ?></h5>
                            <span><input type="hidden" name="telefono_socio" value="<?php echo $telefono_socio; ?>"><?php echo $telefono_socio; ?></span>
                        </li>						
						
						 <li>
                            <h5><?php echo $strings['Socio bloqueado']; ?></h5>
                            <span><input type="hidden" name="socio_bloqueado" value="<?php echo $socio_bloqueado; ?>"><?php echo $socio_bloqueado; ?></span>
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
				<h6>Gamerenting</h6>
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