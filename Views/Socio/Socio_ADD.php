<?php

/**
 * Funcion: Vista que nos permite añadir un socio
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
 */
 class Socio_ADD {

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
                <h3><?php echo $strings['Añadir socio'];?></h3>
                <?php

                ?>
                <form class="form-basic" enctype="multipart/form-data" id="form"  method="post" action="../Controllers/SOCIO_Controller.php">
                    <div class="form-group">
                        <label class="form-label" for="login_socio"><?php echo $strings['Login'];?></label>
                        <input type="text" class="form-control" maxlength="25" size="25" id="login_socio" name="login_socio">
                    </div>
					
					 <div class="form-group">
                        <label class="form-label" for="pass_socio"><?php echo $strings['Password'];?></label>
                        <input type="text" class="form-control" maxlength="20" size="20" id="pass_socio" name="pass_socio">
                    </div>
					
					 <div class="form-group">
                        <label class="form-label" for="dni_socio"><?php echo $strings['DNI'];?></label>
                        <input type="text" class="form-control" maxlength="9" size="9" id="dni_socio" name="dni_socio" onblur="comprobarVacio(this);comprobarDNI(this)">
                    </div>
					
					 <div class="form-group">
                        <label class="form-label" for="nombre_socio"><?php echo $strings['Nombre'];?></label>
                        <input type="text" class="form-control" maxlength="25" size="25" id="nombre_socio" name="nombre_socio" onblur="comprobarVacio(this); comprobarTexto(this,25); comprobarAlfabetico (this,25)">
                    </div>
					
					 <div class="form-group">
                        <label class="form-label" for="apellidos_socio"><?php echo $strings['Apellidos'];?></label>
                        <input type="text" class="form-control" maxlength="50" size="50" id="apellidos_socio" name="apellidos_socio" onblur="comprobarVacio(this); comprobarTexto(this,50); comprobarAlfabetico (this,25)">
                    </div>
					
					<div class="form-group">
                        <label class="form-label" for="email_socio"><?php echo $strings['Email'];?></label>
                        <input type="text" class="form-control" maxlength="50" size="50" id="email_socio" name="email_socio" onblur="comprobarVacio(this); comprobarCorreo(this)">
                    </div>
					
					<div class="form-group">
                        <label class="form-label" for="telefono"><?php echo $strings['Telefono'];?></label>
                        <input type="text" class="form-control" maxlength="12" size="12" id="telefono_socio" name="telefono_socio" onblur="comprobarVacio(this); comprobarTelf(this)">
                    </div>
 
                        <input type="hidden" class="form-control" maxlength="1" size="1" id="socio_bloqueado" name="socio_bloqueado" value="NO">
					
                    <button name="action" value="ADD" type="submit" class="boton-env">
                        <img src="../Views/imgs/send.png" alt="">
                    </button>
                </form>
            </div>

            </div>
            <footer>
				<span><img style="height:60px; width:50px;" src="../Views/imgs/logolot.png"></span>
				<h6>GameRenting 2019</h6>
            </footer>
        </section>
        <script type="text/javascript" src="../Views/js/validaciones.js"></script>

        </body>
        </html>
	
        <?php

    }
}
?>