<?php

/**
 * Funcion: Vista que nos permite editar una loteria
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
 */
 class Vendedor_EDIT {

    function __construct($login,$password,$dni,
	$nombre,$apellidos,$email,$telefono){

        $this->pinta($login,$password,$dni,
	$nombre,$apellidos,$email,$telefono);

    }


    //función que contiene la vista
    function pinta($login,$password,$dni,
    $nombre,$apellidos,$email,$telefono){
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
                <h3><?php echo $strings['Editarpart']; ?></h3>
                <?php

                ?>
<form class="form-basic" enctype="multipart/form-data" id="form"  method="post" action="../Controllers/VENDEDOR_Controller.php">
                    <div class="form-group">
                        <label class="form-label" for="login_vendedor">Login</label>
                        <input type="text" class="form-control" maxlength="60" size="60" id="login_vendedor" name="login_vendedor" value="<?php echo $login; ?>" readonly>
                    </div>
					
					 <div class="form-group">
                        <label class="form-label" for="pass_vendedor">Password</label>
                        <input type="text" class="form-control" maxlength="30" size="30" id="pass_vendedor" name="pass_vendedor" value="<?php echo $password; ?>" readonly>
                    </div>
					
					 <div class="form-group">
                        <label class="form-label" for="dni_vendedor">DNI</label>
                        <input type="text" class="form-control" maxlength="40" size="40" id="dni_vendedor" name="dni_vendedor" value="<?php echo $dni; ?>" onblur="comprobarVacio(this);comprobarDNI(this)">
                    </div>
					
					<div class="form-group">
                        <label class="form-label" for="nombre_vendedor">Nombre</label>
                        <input type="text" class="form-control" maxlength="3" size="3" id="nombre_vendedor" name="nombre_vendedor" value="<?php echo $nombre; ?>"  onblur="comprobarVacio(this);comprobarTexto(this,25);comprobarAlfabetico(this,25)">
                    </div>
					
					<div class="form-group">
                        <label class="form-label" for="apellidos_vendedor">Apellidos</label>
                        <input type="text" class="form-control" maxlength="3" size="3" id="apellidos_vendedor" name="apellidos_vendedor" value="<?php echo $apellidos; ?>" onblur="comprobarVacio(this);comprobarTexto(this,50);comprobarAlfabetico(this,50)">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="email_vendedor">Email</label>
                        <input type="text" class="form-control" maxlength="3" size="3" id="email_vendedor" name="email_vendedor" value="<?php echo $email; ?>" onblur="comprobarVacio(this);comprobarTexto(this,60);comprobarCorreo(this)">
                    </div>

                     <div class="form-group">
                        <label class="form-label" for="telefono_vendedor">Telefono</label>
                        <input type="text" class="form-control" maxlength="3" size="3" id="telefono_vendedor" name="telefono_vendedor" value="<?php echo $telefono; ?>" onblur="comprobarVacio(this);comprobarTelefono(this)">
                    </div>

                    
                    <button name="action" value="EDIT" type="submit" class="boton-env">
                        <img src="../Views/imgs/send.png" alt="">
                    </button>
                </form>
            </div>

            </div>
            <footer>
				<span><img style="height:60px; width:50px;" src="../Views/imgs/logolot.png"></span>
				<h6>Gamerenting</h6>
            </footer>
        </section>
       
        <script type="text/javascript" src="../Views/js/validaciones.js"></script>
      
        </body>
        </html>
		
        <?php

    }
}
?>