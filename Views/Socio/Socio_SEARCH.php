<?php
/**
 * Funcion: Vista que nos permite buscar socios por cada campo
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
 */
class Socio_SEARCH {

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
                        <label class="form-label" for="login_socio"><?php echo $strings['Login']; ?></label>
                        <input type="text" class="form-control" maxlength="25" size="50" id="login_socio" name="login_socio" >
                    </div>
					
				<div class="showall">
					<button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>
				</div>
				</form>
					
					<form  action="<?php echo $message; ?>" method="post">
					<div class="form-group">
                        <label class="form-label" for="dni_socio"><?php echo $strings['DNI']; ?></label>
                        <input type="text" class="form-control" maxlength="9" size="50" id="dni_socio" name="dni_socio">
                    </div>
					
				<div class="showall">                    
					<button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>
					
                </div>							
					</form>
					
					 <form  action="<?php echo $message; ?>" method="post">
					 <div class="form-group">
                        <label class="form-label" for="nombre_socio"><?php echo $strings['Nombre']; ?></label>
                        <input type="text" class="form-control" maxlength="25" size="50" id="nombre_socio" name="nombre_socio">
                    </div>
				
				<div class="showall">                    
					<button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>
					
                </div>
				</form>

                 <form  action="<?php echo $message; ?>" method="post">
                     <div class="form-group">
                        <label class="form-label" for="apellidos_socio"><?php echo $strings['Apellidos']; ?></label>
                        <input type="text" class="form-control" maxlength="50" size="50" id="apellidos_socio" name="apellidos_socio">
                    </div>
                
                <div class="showall">                    
                    <button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>
                    
                </div>
                </form>

                 <form  action="<?php echo $message; ?>" method="post">
                     <div class="form-group">
                        <label class="form-label" for="email_socio"><?php echo $strings['Email']; ?></label>
                        <input type="text" class="form-control" maxlength="50" size="50" id="email_socio" name="email_socio">
                    </div>
                
                <div class="showall">                    
                    <button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>
                    
                </div>
                </form>

                 <form  action="<?php echo $message; ?>" method="post">
                     <div class="form-group">
                        <label class="form-label" for="telefono_socio"><?php echo $strings['Telefono']; ?></label>
                        <input type="text" class="form-control" maxlength="12" size="50" id="telefono_socio" name="telefono_socio">
                    </div>
                
                <div class="showall">                    
                    <button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>                    
                </div>
                </form>	

                 <form  action="<?php echo $message; ?>" method="post">
                     <div class="form-group">
                        <label class="form-label" for="socio_bloqueado"><?php echo $strings['Socio bloqueado']; ?></label>
                            <select name="socio_bloqueado">
                            <option value="1"><?php echo $strings['Si'];?></option>
                            <option value="0"><?php echo $strings['No'];?></option>
                        </select>
                    </div>
                
                <div class="showall">                    
                    <button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>                    
                </div>
                </form>					
				
				
            </div>

            </div>
            <footer>
				<span><img style="height:60px; width:50px;" src="../Views/imgs/logolot.png"></span>
				<h6>GameRenting 2019</h6>
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