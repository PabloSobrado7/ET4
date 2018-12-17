<?php

/**
 * Funcion: Vista que nos permite añadir una loteria
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
 */
 class Loteria_ADD {

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
                <h3><?php echo $strings['Anadirparticipante']; ?></h3>
                <?php

                ?>
                <form class="form-basic" enctype="multipart/form-data" id="form"  method="post" action="../Controllers/LOTERIAIU_Controller.php" onsubmit="return anadirLoteria()">
                    <div class="form-group">
                        <label class="form-label" for="login"><?php echo $strings['Email']; ?></label>
                        <input type="text" class="form-control" maxlength="60" size="60" id="lotemail" name="lotemail" onblur="comprobarExpresionRegular(this,/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/,50)">
                    </div>
					
					 <div class="form-group">
                        <label class="form-label" for="login"><?php echo $strings['Name']; ?></label>
                        <input type="text" class="form-control" maxlength="30" size="30" id="lotnombre" name="lotnombre" onblur="comprobarTexto(this,30)">
                    </div>
					
					 <div class="form-group">
                        <label class="form-label" for="login"><?php echo $strings['Surname']; ?></label>
                        <input type="text" class="form-control" maxlength="40" size="40" id="lotapellidos" name="lotapellidos" onblur="comprobarTexto(this,40)">
                    </div>
					
					 <div class="form-group">
                        <label class="form-label" for="login"><?php echo $strings['Participacion']; ?></label>
                        <input type="text" class="form-control" maxlength="3" size="3" id="lotparticipacion" name="lotparticipacion" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                    </div>
					
					 <div class="form-group">
                        <label class="form-label" for="login"><?php echo $strings['Resguardo']; ?></label>
                        <input type="file" name="lotresguardo" id="lotresguardo">
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