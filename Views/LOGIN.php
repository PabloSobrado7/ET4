<?php

/**
 * Funcion: Vista que nos permite loguearnos al sistema
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
 */
    include_once '../Functions/Authentication.php';

    class Login {

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
                    <form class="form-basic" method="" action="../Controllers/Login_Controller.php">
                        <div class="form-group">
                            <label class="form-label" for="login"><?php echo $strings['Login']; ?></label>
                            <input type="text" class="form-control" maxlength="15" size="15" id="login" name="login" tabindex="1">
                        </div>    
                        <div class="form-group">
                            <label class="form-label" for="password1"><?php echo $strings['Password']; ?></label>
                            <input type="password" class="form-control" maxlength="20" size="20" id="password1" name="password" maxlength="5" tabindex="1" >
                        </div>
                        <button name="action" value="" type="submit" class="boton-env">
                            <img src="../Views/imgs/send.png" alt="">
                        </button>
                    </form> 
                </div>
                
            <footer>
				<h6>GAMERENTING - 2018</h6>
            </footer>
            </section>
            <!--<script src="../Views/js/md5.js"></script>
            <script src="../Views/js/main.js"></script>
            <?php include '../Views/js/validaciones.js'  ?>-->
            
        </body>
        </html>
        
        <?php
    
        }
    }
?>