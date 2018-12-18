<?php

/**
 * Funcion: Vista que nos permite añadir una loteria
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
 */
 class Vendedor_ADD {

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
                <h3>Añadir vendedor</h3>
                <?php

                ?>
                <form class="form-basic" enctype="multipart/form-data" id="form"  method="post" action="../Controllers/VENDEDOR_Controller.php">
                    <div class="form-group">
                        <label class="form-label" for="login">Login</label>
                        <input type="text" class="form-control" maxlength="15" size="15" id="login_vendedor" name="login_vendedor">
                    </div>
					
					 <div class="form-group">
                        <label class="form-label" for="password">Password</label>
                        <input type="text" class="form-control" maxlength="20" size="20" id="pass_vendedor" name="pass_vendedor">
                    </div>
					
					 <div class="form-group">
                        <label class="form-label" for="dni">DNI</label>
                        <input type="text" class="form-control" maxlength="9" size="9" id="dni_vendedor" name="dni_vendedor">
                    </div>
					
					 <div class="form-group">
                        <label class="form-label" for="nombre">Nombre</label>
                        <input type="text" class="form-control" maxlength="25" size="25" id="nombre_vendedor" name="nombre_vendedor">
                    </div>
					
					 <div class="form-group">
                        <label class="form-label" for="apellidos">Apellidos</label>
                        <input type="text" class="form-control" maxlength="50" size="50" id="apellidos_vendedor" name="apellidos_vendedor">
                    </div>
					
					 <div class="form-group">
                        <label class="form-label" for="email">Email</label>
                        <input type="text" class="form-control" maxlength="60" size="60" id="email_vendedor" name="email_vendedor">
                    </div>
					
					 <div class="form-group">
                        <label class="form-label" for="telefono">Teléfono</label>
                        <input type="text" class="form-control" maxlength="12" size="12" id="telefono_vendedor" name="telefono_vendedor">
                    </div>
					
                    <button name="action" value="ADD" type="submit" class="boton-env">
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