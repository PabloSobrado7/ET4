<?php
/**
 * Funcion: Vista que nos permite buscar loterias por cada campo
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
 */
class Vendedor_SEARCH {

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
                <h3><?php echo $strings['Busqueda']; ?></h3>
                <?php

                ?>
 
				<form  action="<?php echo $message; ?>" method="post">	
					<div class="form-group">
                        <label class="form-label" for="login_vendedor"><?php echo $strings['Usuario']; ?></label>
                        <input type="text" class="form-control" maxlength="60" size="60" id="login_vendedor" name="login_vendedor" >
                    </div>
					
				<div class="showall">
					<button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>
				</div>
				</form>

				<form  action="<?php echo $message; ?>" method="post">
					<div class="form-group">
                        <label class="form-label" for="pass_vendedor"><?php echo $strings['Contraseña']; ?></label>
                        <input type="text" class="form-control" maxlength="30" size="30" id="pass_vendedor" name="pass_vendedor">
                    </div>
					
				<div class="showall">
					<button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>
                </div>
				</form>
					
				<form  action="<?php echo $message; ?>" method="post">
                    <div class="form-group">
                        <label class="form-label" for="dni_vendedor"><?php echo $strings['DNI']; ?></label>
                        <input type="text" class="form-control" maxlength="30" size="30" id="dni_vendedor" name="dni_vendedor">
                    </div>
                    
                <div class="showall">
                    <button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>
                </div>
                </form>
				
				<form  action="<?php echo $message; ?>" method="post">
                    <div class="form-group">
                        <label class="form-label" for="nombre_vendedor"><?php echo $strings['Nombre']; ?></label>
                        <input type="text" class="form-control" maxlength="30" size="30" id="nombre_vendedor" name="nombre_vendedor">
                    </div>
                    
                <div class="showall">
                    <button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>
                </div>
                </form> 
				   
				<form  action="<?php echo $message; ?>" method="post">
                    <div class="form-group">
                        <label class="form-label" for="apellidos_vendedor"><?php echo $strings['Apellidos']; ?></label>
                        <input type="text" class="form-control" maxlength="30" size="30" id="apellidos_vendedor" name="apellidos_vendedor">
                    </div>
                    
                <div class="showall">
                    <button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>
                </div>
                </form>
					
				<form  action="<?php echo $message; ?>" method="post">
                    <div class="form-group">
                        <label class="form-label" for="email_vendedor"><?php echo $strings['Correo']; ?></label>
                        <input type="text" class="form-control" maxlength="30" size="30" id="email_vendedor" name="email_vendedor">
                    </div>
                    
                <div class="showall">
                    <button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>
                </div>
                </form>

                <form  action="<?php echo $message; ?>" method="post">
                    <div class="form-group">
                        <label class="form-label" for="telefono_vendedor"><?php echo $strings['Telefono']; ?></label>
                        <input type="text" class="form-control" maxlength="30" size="30" id="telefono_vendedor" name="telefono_vendedor">
                    </div>
                    
                <div class="showall">
                    <button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>
                </div>
                </form>

            </div>

            </div>
            <footer>
				<span><img style="height:60px; width:50px;" src="../Views/imgs/logolot.png"></span>
				<h6>Gamerenting</h6>
            </footer>
        </section>
        <!--<script src="../Views/js/md5.js"></script>
        <?php include '../Views/js/validaciones.js'; ?>
        <script src="../Views/js/main.js"></script>-->
        </body>
        </html>

        <?php

    }
}
?>