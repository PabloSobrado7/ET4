<?php

/**
 * Funcion: Vista que nos permite ver todas las loteria
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
						<button class="showall-action" name="action" value="ADD" type="submit"><img src="../Views/imgs/add.png" alt="" srcset=""></button>
                    </form>

                </div>
				
                <table class="showall-tab">
                    <tr>
                        <th>Login</th>
						<th>Password</th>
						<th>DNI</th>
						<th>Nombre</th>
						<th>Apellidos</th>
						<th>Email</th>
						<th>Teléfono</th>
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
                                <!--<input type="hidden" name="lotemail" value="<?php echo $row['lot.email']; ?>">
								<input type="hidden" name="lotnombre" value="<?php echo $row['lot.nombre']; ?>">
								<input type="hidden" name="lotapellidos" value="<?php echo $row['lot.apellidos']; ?>">
								<input type="hidden" name="lotparticipacion" value="<?php echo $row['lot.participacion']; ?>">
								<input type="hidden" name="lotresguardo" value="<?php echo $row['lot.resguardo']; ?>">
								<input type="hidden" name="lotingresado" value="<?php echo $row['lot.ingresado']; ?>">
								<input type="hidden" name="lotpremiopersonal" value="<?php echo $row['lot.premiopersonal']; ?>">
								<input type="hidden" name="lotpagado" value="<?php echo $row['lot.pagado']; ?>">-->
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
				<h6>Loteria ESEI</h6>
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