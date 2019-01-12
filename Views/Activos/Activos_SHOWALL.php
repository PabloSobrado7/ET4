<?php

/**
 * Funcion: Vista que nos permite ver el catalogo para los users
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
 */
include_once '../Functions/Authentication.php';

class Activos_SHOWALL {

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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="jquery.tablesorter.js"></script> 

<script>
$(document).ready(function() {
  //cuando la página se cargue convertimos la tabla con id "simple" en una tabla ordenable
	$("#juegos").tableSorter();
});
</script>

        <section class="form-basic-start">

            <div class="showall">
SOCIOS MÁS ACTIVOS
                <div >
                    <form  action="../Controllers/CATALOGO_Controller.php" method="">
						<button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>
						 </form>

                </div>
				
                <table id="socios" class="showall-tab">
                    <tr>
						<th>Login</th>
						<th>Email</th>
						<th>Telefono</th>


                        <th>
                        </th>
                    </tr>
                    <?php

                    $row;//almacena usuarios

                    //mientras existan usuarios
                    while ($row = $users->fetch_array()){
                        ?>

                        <tr>

								<td><?php echo $row['login_socio']; ?></td>
								<td><?php echo $row['email_socio']; ?></td>
								<td><?php echo $row['telefono_socio']; ?></td>
					
					           <td>
									</td>
                            
                        </tr>

                        <?php
                    }
                    ?>
                </table>
            </div>

			
            <footer>
				<span><img style="height:60px; width:50px;" src="../Views/imgs/logolot.png"></span>
				<h6>Socio Showall</h6>
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