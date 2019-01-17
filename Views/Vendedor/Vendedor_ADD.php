<?php

/**
 * Funcion: Vista que nos permite añadir un vendedor
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
              
                <h3><?php echo $strings['Añadir vendedor'];?></h3>
           
                <form class="form-basic" enctype="multipart/form-data" id="form"  method="post" action="../Controllers/VENDEDOR_Controller.php">
                    <div class="form-group">
                        <label class="form-label" for="login_vendedor"><?php echo $strings['Login vendedor'];?></label>
                        <input type="text" class="form-control" maxlength="15" size="25" id="login_vendedor" name="login_vendedor" onblur="comprobarVacio(this);comprobarTexto(this,15)">
                    </div>
					
					 <div class="form-group">
                        <label class="form-label" for="pass_vendedor"><?php echo $strings['Password'];?></label>
                        <input type="text" class="form-control" maxlength="20" size="25" id="pass_vendedor" name="pass_vendedor"  onblur="comprobarVacio(this);comprobarTexto(this,20)">
                    </div>
					
					 <div class="form-group">
                        <label class="form-label" for="dni_vendedor"><?php echo $strings['DNI'];?></label>
                        <input type="text" class="form-control" maxlength="9" size="25" id="dni_vendedor" name="dni_vendedor" onblur="comprobarVacio(this); comprobarDNI(this)">
                    </div>
					
					 <div class="form-group">
                        <label class="form-label" for="nombre_vendedor"><?php echo $strings['Nombre'];?></label>
                        <input type="text" class="form-control" maxlength="25" size="25" id="nombre_vendedor" name="nombre_vendedor" onblur="comprobarVacio(this);comprobarTexto(this,25);comprobarAlfabetico(this,25)">
                    </div>
					
					 <div class="form-group">
                        <label class="form-label" for="apellidos_vendedor"><?php echo $strings['Apellidos'];?></label>
                        <input type="text" class="form-control" maxlength="50" size="25" id="apellidos_vendedor" name="apellidos_vendedor" onblur="comprobarVacio(this);comprobarTexto(this,50);comprobarAlfabetico(this,50)">
                    </div>
					
					 <div class="form-group">
                        <label class="form-label" for="email_vendedor"><?php echo $strings['Email'];?></label>
                        <input type="text" class="form-control" maxlength="60" size="25" id="email_vendedor" name="email_vendedor" onblur="comprobarVacio(this);comprobarTexto(this,60);comprobarCorreo(this)">
                    </div>
					
					 <div class="form-group">
                        <label class="form-label" for="telefono_vendedor"><?php echo $strings['Telefono'];?></label>
                        <input type="text" class="form-control" maxlength="12" size="25" id="telefono_vendedor" name="telefono_vendedor" onblur="comprobarVacio(this); comprobarTelefono(this)">
                    </div>
					
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