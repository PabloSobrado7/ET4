<?php

/**
 * Funcion: Vista que nos permite eliminar una loteria
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
 */

class Vendedor_DELETE {

    function __construct($login_vendedor,$pass_vendedor,$dni_vendedor,$nombre_vendedor,$apellidos_vendedor,$email_vendedor,$telefono_vendedor){

        $this->pinta($login_vendedor,$pass_vendedor,$dni_vendedor,$nombre_vendedor,$apellidos_vendedor,$email_vendedor,$telefono_vendedor);

    }


    function pinta($login_vendedor,$pass_vendedor,$dni_vendedor,$nombre_vendedor,$apellidos_vendedor,$email_vendedor,$telefono_vendedor){
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
                <h4><?php echo $strings['Eliminarvendedor']; ?></h4>
                <form enctype="multipart/form-data" action="../Controllers/VENDEDOR_Controller.php" method="post">
                    <ul>
                        <li>
                            <h5>Login</h5>
                            <span><input type="hidden" name="login_vendedor" value="<?php echo $login_vendedor; ?>"><?php echo $login_vendedor; ?></span>
                        </li>
						
						<li>
                            <h5>Password</h5>
                            <span><?php echo $pass_vendedor; ?></span>
                        </li>

                        <li>
                            <h5>DNI</h5>
                            <span><?php echo $dni_vendedor; ?></span>
                        </li>

                         <li>
                            <h5>Nombre</h5>
                            <span><?php echo $nombre_vendedor; ?></span>
                        </li>
						
					    <li>
                            <h5>Apellidos</h5>
                            <span><?php echo $apellidos_vendedor; ?></span>
                        </li>
						
						<li>
                            <h5>Email</h5>
                            <span><?php echo $email_vendedor; ?></span>
                        </li>
						
						<li>
                            <h5>Telefono</h5>
                            <span><?php echo $telefono_vendedor; ?></span>
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