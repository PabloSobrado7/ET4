<?php
/**
 * Funcion: Vista que nos permite buscar loterias por cada campo
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
 */
class Loteria_SEARCH {

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
                        <label class="form-label" for="login"><?php echo $strings['Email']; ?></label>
                        <input type="text" class="form-control" maxlength="60" size="60" id="lotemail" name="lotemail" >
                    </div>
					
				<div class="showall">
					<button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>
				</div>
				</form>

				<form  action="<?php echo $message; ?>" method="post">
					<div class="form-group">
                        <label class="form-label" for="login"><?php echo $strings['Name']; ?></label>
                        <input type="text" class="form-control" maxlength="30" size="30" id="lotnombre" name="lotnombre">
                    </div>
					
				<div class="showall">
					<button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>
                </div>
				</form>
					
					<form  action="<?php echo $message; ?>" method="post">
					 <div class="form-group">
                        <label class="form-label" for="login"><?php echo $strings['Surname']; ?></label>
                        <input type="text" class="form-control" maxlength="40" size="40" id="lotapellidos" name="lotapellidos">
                    </div>
					
				<div class="showall">
                    
						<button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>
					
                </div>							
					</form>
					
					 <form  action="<?php echo $message; ?>" method="post">
					 <div class="form-group">
                        <label class="form-label" for="login"><?php echo $strings['Participacion']; ?></label>
                        <input type="text" class="form-control" maxlength="3" size="3" id="lotparticipacion" name="lotparticipacion" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                    </div>
				
				<div class="showall">
                    
						<button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>
					
                </div>
				</form>
				
				 <form  action="<?php echo $message; ?>" method="post">
						 <div class="form-group">
                        <label class="form-label" for="login"><?php echo $strings['Ingresado']; ?></label>
						<input type="hidden" name="id_pista" >
						</div>					
						
						<input type="radio" name="lotingresado" value="SI"> <?php echo $strings['SI']; ?>
						<input type="radio" name="lotingresado" value="NO"> <?php echo $strings['NO']; ?> 

				<div class="showall">
                    
						<button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>
					
                </div>
                   </form> 
				   
				   <form  action="<?php echo $message; ?>" method="post">
											 <div class="form-group">
                        <label class="form-label" for="login"><?php echo $strings['Premiopersonal']; ?></label>
						<input type="text" class="form-control" maxlength="3" size="3" id="lotpremiopersonal" name="lotpremiopersonal" >
                    </div>
				<div class="showall">
                    
						<button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>
					
                </div>					
					</form>
					
					<form  action="<?php echo $message; ?>" method="post">
						<div class="form-group">
                        <label class="form-label" for="login"><?php echo $strings['Pagado']; ?></label>
						<input type="hidden" name="id_pista" >
			
	<input type="radio" name="lotpagado" value="SI"> <?php echo $strings['SI']; ?>
    <input type="radio" name="lotpagado" value="NO"> <?php echo $strings['NO']; ?> 
                    
				<div class="showall">
                  
						<button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>
					
                </div>					
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

        <?php

    }
}
?>