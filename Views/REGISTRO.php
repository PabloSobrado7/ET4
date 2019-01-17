<?php

/**
 * Funcion: Vista de registros de usuario
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
 */
 
    class REGISTER {

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
                        <h3><?php echo $strings['Sign up']; ?></h3>        
                    <?php
                
            ?>
	
                <form class="form-basic" enctype="multipart/form-data" id="form"  method="post" action="../Controllers/Registro_Controller.php" onsubmit="return anadirUsuario()">
                    <div class="form-group">
                        <label class="form-label" for="login"><?php echo $strings['Login']; ?></label>
                        <input type="text" class="form-control" maxlength="15" size="15" id="login" name="login" onblur="comprobarTexto(this,15)">
                    </div>    
                    <div class="form-group">
                        <label class="form-label" for="password"><?php echo $strings['Password']; ?></label>
                        <input type="password" class="form-control" maxlength="20" size="20" id="password" name="password" onblur="comprobarAlfabetico(this,20)">
                    </div> 
                    <div class="form-group">
                        <label class="form-label" for="Nombre"><?php echo $strings['Name']; ?></label>
                        <input type="text" class="form-control" maxlength="30" size="30" id="nombre" name="nombre" onblur="comprobarTexto(this,30)">
                    </div> 
                    <div class="form-group">
                        <label class="form-label" for="Apellidos"><?php echo $strings['Surname']; ?></label>
                        <input type="text" class="form-control" maxlength="50" size="50" id="apellidos" name="apellidos" onblur="comprobarTexto(this,50)">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="dni">DNI</label>
                        <input type="text" class="form-control" maxlength="10" size="10" id="dni" name="dni" onblur="comprobarDni(this)">
                    </div>
				    <div class="form-group">
                        <label class="form-label" for="telefono"><?php echo $strings['Telefono']; ?></label>
                        <input type="text" class="form-control" maxlength="13" size="13" id="telefono" name="telefono" onblur="comprobarTelf(this)">
                    </div>
					<div class="form-group">
                        <label class="form-label" for="email"><?php echo $strings['Email']; ?></label>
                        <input type="text" class="form-control" maxlength="60" size="40" id="email" name="email" onblur="comprobarExpresionRegular(this,/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/,50)">
                    </div> 
					<div class="form-group">
                        <label class="form-label" for="FechaNacimiento"><?php echo $strings['Fecha nacimiento']; ?></label>
                        <input type="date" class="form-control" id="FechaNacimiento" name="FechaNacimiento" onblur="comprobarVacio(this)">
                    </div> 
					<div class="form-group">
                        <label class="form-label" for="fotopersonal"><?php echo $strings['Foto personal']; ?></label>
                        <input type="file" name="fotopersonal" id="fotopersonal">
					</div>
					
					<div class="form-group">
                        <label class="form-label" for="sexo"><?php echo $strings['Sexo']; ?></label>
                    <input type="radio" name="sexo" value="hombre"> <?php echo $strings['Hombre']; ?>
					<input type="radio" name="sexo" value="mujer"> <?php echo $strings['Mujer']; ?>  
					</div>	


					
                    <button name="action" value="ADD" type="submit" class="boton-env">
                        <img src="../Views/imgs/send.png" alt="">
                    </button>
                </form>
            </div>
            <footer>
				<h6>GameRenting 2019</h6>
            </footer>
            </section>
            <!--<script src="../Views/js/md5.js"></script>
            <script src="../Views/js/main.js"></script>
            <?php include '../Views/js/validaciones.js'; ?>-->
            
        </body>
        </html>
        <script src="../Views/js/validaciones.js"></script>  
        <?php
    
        }
    }
?>