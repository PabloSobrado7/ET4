<?php

/**
 * Funcion: Vista que nos permite ver todos los vendedores
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
 */
include_once '../Functions/Authentication.php';

class Vendedor_SHOWALL {

    function __construct($users,$message){

        $this->pinta($users,$message);

    }
    //función que contiene la vista
    function pinta($users,$message){
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
		 
        <section class="form-basic-start">

            <div class="showall">

                <div >
                    <form  action="<?php echo $message; ?>" method="">
						<button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>
						<button class="showall-action" name="action" value="ADD" type="submit"><img src="../Views/imgs/add.png" alt="" srcset="">
                        </button>
                    </form>

                </div>
				
                <table class="showall-tab">
                    <tr>
                        <th><?php echo $strings['Login']; ?></th>
						<th><?php echo $strings['Password']; ?></th>
						<th><?php echo $strings['DNI']; ?></th>
                        <th><?php echo $strings['Nombre']; ?></th>
						<th><?php echo $strings['Apellidos']; ?></th>
						<th><?php echo $strings['Email']; ?></th>
						<th><?php echo $strings['Telefono']; ?></th>
                        <th>
                        </th>
                    </tr>
                    <?php

                    $row;//almacena usuarios

                    //mientras existan usuarios
                    while ($row = $users->fetch_array()){
                        ?>

                        <tr>
                            <form action="../Controllers/VENDEDOR_Controller.php" method="" >
                               
							<input type="hidden" name="login_vendedor" value="<?php echo $row['login_vendedor']; ?>">
							<input type="hidden" name="pass_vendedor" value="<?php echo $row['pass_vendedor']; ?>">
							<input type="hidden" name="dni_vendedor" value="<?php echo $row['dni_vendedor']; ?>">
							<input type="hidden" name="nombre_vendedor" value="<?php echo $row['nombre_vendedor']; ?>">
							<input type="hidden" name="apellidos_vendedor" value="<?php echo $row['apellidos_vendedor']; ?>">
							<input type="hidden" name="email_vendedor" value="<?php echo $row['email_vendedor']; ?>">
							<input type="hidden" name="telefono_vendedor" value="<?php echo $row['telefono_vendedor']; ?>">
							
								<td><?php echo $row['login_vendedor']; ?></td>
								<td><?php echo $row['pass_vendedor']; ?></td>
								<td><?php echo $row['dni_vendedor']; ?></td>
								<td><?php echo $row['nombre_vendedor']; ?></td>
								<td><?php echo $row['apellidos_vendedor']; ?></td>
								<td><?php echo $row['email_vendedor']; ?></td>
								<td><?php echo $row['telefono_vendedor']; ?></td>
								
                                <td>
									<button class="showall-action" name="action" value="EDIT" type="submit"><img src="../Views/imgs/edit.png" alt="" srcset=""></button>
                                    <button class="showall-action" name="action" value="DELETE" type="submit"><img src="../Views/imgs/delete.png" alt="" srcset=""></button>
                                </td>
                            </form>
                        </tr>

                        <?php
                    }
                    ?>
                </table>
            </div>
			
            <footer>
				<span><img style="height:60px; width:50px;" src="../Views/imgs/logolot.png"></span>
				<h6>GameRenting 2019</h6>
            </footer>
        </section>

        <!--<script src="../Views/js/main.js"></script>
        <?php include '../Views/js/validaciones.js' ?>-->
        </body>
        </html>

        <?php

    }
}
?>