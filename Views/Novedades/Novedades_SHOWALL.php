<?php

/**
 * Funcion: Vista que nos permite ver todas las novedades
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
 */
include_once '../Functions/Authentication.php';

class Novedades_SHOWALL {

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

				
                <table id="juegos" class="showall-tab">
                    <tr>
                        <th><?php echo $strings['Id juego']; ?></th>
						<th><?php echo $strings['Nombre juego']; ?></th>
						<th><?php echo $strings['Plataforma']; ?></th>
						<th><?php echo $strings['Genero']; ?></th>
						<th><?php echo $strings['Precio compra']; ?></th>
						<th><?php echo $strings['Categoria']; ?></th>
						<th><?php echo $strings['Novedad']; ?></th>
                        <th><?php echo $strings['Compra']; ?></th>
                        <th><?php echo $strings['Alquiler']; ?></th>

                        <th>
                        </th>
                    </tr>
                    <?php

                    $row;//almacena usuarios

                    //mientras existan usuarios
                    while ($row = $users->fetch_array()){
                        ?>

                        <tr>
                            <form action="../Controllers/JUEGO_Controller.php" method="" >    

								<td><?php echo $row['id_juego']; ?></td>
								<td><?php echo $row['nombre_juego']; ?></td>
								<td><?php echo $row['plataforma']; ?></td>
								<td><?php echo $row['genero']; ?></td>
								<td><?php echo $row['precio_compra']; ?>€</td>
								<td><?php echo $row['categoria']; ?></td>
						<?php if ($row['novedad']=='1'){ ?> <td><?php echo $strings['Si'];?></td> <?php }else{?><td><?php echo $strings['No'];?></td><?php } ?>
					<?php if ($row['compra']=='1'){ ?> <td><?php echo $strings['Si'];?></td> <?php }else{?><td><?php echo $strings['No'];?></td><?php } ?>					
					<?php if ($row['venta']=='1'){ ?> <td><?php echo $strings['Si'];?></td> <?php }else{?><td><?php echo $strings['No'];?></td><?php } ?>
					
                                <td>
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