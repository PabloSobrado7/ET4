<?php

/**
 * Funcion: Vista que nos permite ver todas las compras
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
 */
include_once '../Functions/Authentication.php';

class Compra_SHOWALL {

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
						<button class="showall-action" name="action" value="ADD" type="submit"><img src="../Views/imgs/add.png" alt="" srcset=""></button>
                    </form>

                </div>

                <table class="showall-tab">
                    <tr>
                        <th><?php echo $strings['Login socio'];?></th>
						<th><?php echo $strings['ID Juego'];?></th>
						<th><?php echo $strings['Fecha compra'];?></th>

                        <th>
                        </th>
                    </tr>
                    <?php
                    $row;//almacena usuarios

                    //mientras existan usuarios
                    while ($row = $users->fetch_array()){
                        ?>

                        <tr>
                            <form action="../Controllers/COMPRA_Controller.php" method="" >

							<input type="hidden" name="login_socio" value="<?php echo $row['login_socio']; ?>">
							<input type="hidden" name="id_juego" value="<?php echo $row['id_juego']; ?>">
							<input type="hidden" name="fecha_compra" value="<?php echo $row['fecha_compra']; ?>">
								<td><?php echo $row['login_socio']; ?></td>
								<td><?php echo $row['id_juego']; ?></td>
								<td><?php echo $row['fecha_compra'];?></td>

                                <td>
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