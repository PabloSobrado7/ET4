<?php

/**
 * Funcion: Vista que nos permite ver las compras y alquileres de un socio
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
 */
include_once '../Functions/Authentication.php';

class SocioP_SHOWALL {

    function __construct($users,$datos,$message){

        $this->pinta($users,$datos,$message);

    }
    //función que contiene la vista
    function pinta($users,$datos,$message){
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

<?php echo $strings['MIS COMPRAS']; ?>
				
                <table id="juegos" class="showall-tab">
                    <tr>
						<th><?php echo $strings['Nombre']; ?></th>
						<th><?php echo $strings['Plataforma']; ?></th>
						<th><?php echo $strings['Genero']; ?></th>
						<th><?php echo $strings['Precio compra']; ?></th>

                        <th>
                        </th>
                    </tr>
                    <?php

                    $row;//almacena usuarios
					$acumulado = 0;
                    //mientras existan usuarios
                    while ($row = $users->fetch_array()){
                        ?>

                        <tr>

								<td><?php echo $row['nombre_juego']; ?></td>
								<td><?php echo $row['plataforma']; ?></td>
								<td><?php echo $row['genero']; ?></td>
								<td><?php echo $row['precio_compra']; 
								$acumulado = $acumulado + $row['precio_compra'];?>€</td>

					           <td>
									</td>
                            
                        </tr>

                        <?php
                    }
                    ?>
					
                </table>
				
            </div>
			
			<td><?php echo $strings['TOTAL GASTADO EN COMPRAS']; ?>: <?php echo $acumulado; 
				
								?>€ </td>
			
			            <div class="showall">

<?php echo $strings['MIS ALQUILERES']; ?>

				
                <table id="juegos" class="showall-tab">
                    <tr>
		
						<th><?php echo $strings['Nombre']; ?></th>
                        <th><?php echo $strings['Plataforma']; ?></th>
                        <th><?php echo $strings['Genero']; ?></th>
						<th><?php echo $strings['Fecha alquiler']; ?></th>
						<th><?php echo $strings['Tiempo alquiler']; ?></th>
						<th><?php echo $strings['Precio alquiler']; ?></th>

                        <th>
                        </th>
                    </tr>
                    <?php

                    $row;//almacena usuarios
					$acumulado2 = 0;
                    //mientras existan usuarios
                    while ($row = $datos->fetch_array()){
                        ?>

                        <tr>

								<td><?php echo $row['nombre_juego']; ?></td>
								<td><?php echo $row['plataforma']; ?></td>
								<td><?php echo $row['genero']; ?></td>
								<td><?php echo $row['fecha_alquiler']; ?></td>
								<td><?php 
								if($row['id_tarifa']=='1'){
								echo '2 días';}
								if($row['id_tarifa']=='2'){
								echo '7 días';}
								if($row['id_tarifa']=='3'){
								echo '15 días';}
								if($row['id_tarifa']=='4'){
								echo '30 días';}
								?></td>
								<td><?php 
								if($row['id_tarifa']=='1'){
								echo '4€'; $acumulado2 = $acumulado2 + 4;}
								if($row['id_tarifa']=='2'){
								echo '9€'; $acumulado2 = $acumulado2 + 9;}
								if($row['id_tarifa']=='3'){
								echo '12€'; $acumulado2 = $acumulado2 + 12;}
								if($row['id_tarifa']=='4'){
								echo '17€'; $acumulado2 = $acumulado2 + 17;}
								?></td>
								<td></td>
								
					           <td>
									</td>
                            
                        </tr>

                        <?php
                    } 
                    ?>
                </table>
            </div>
						<td><?php echo $strings['TOTAL GASTADO EN ALQUILER']; ?>: <?php echo $acumulado2; ?>€ </td>
	

					
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