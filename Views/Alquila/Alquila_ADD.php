<?php

/**
 * Funcion: Vista que nos permite añadir un alquiler
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
 */
 class Alquila_ADD {

    function __construct($datosjuego,$datossocio,$datostarifa){

        $this->pinta($datosjuego,$datossocio,$datostarifa);

    }


    //función que contiene la vista
    function pinta($datosjuego,$datossocio,$datostarifa){
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
                <h3>Realizar alquiler</h3>
                <?php

                ?>
                <form class="form-basic" enctype="multipart/form-data" id="form"  method="post" action="../Controllers/ALQUILA_Controller.php">
					 <div class="form-group">
                        <label class="form-label" for="login_socio">Socio</label>
                        
					<td>
								<select name="login_socio">

								<?php
								while ($row = $datossocio->fetch_array()){
									?>
								<option value="<?php echo $row['login_socio']; ?>"><?php echo $row['login_socio']; ?></option>
		                        <?php
								}
								?>

								</select></td>
					</div>
	
						 <div class="form-group">
                        <label class="form-label" for="id_tarifa">Tarifa</label>
                        
					<td>
								<select name="id_tarifa">

								<?php
								while ($row = $datostarifa->fetch_array()){
									?>
								
								<option value="<?php echo $row['id_tarifa']; ?>"><?php echo $row['tiempo_tarifa']; ?> días</option>
		                        <?php
								}
								?>

								</select></td>
					</div>

	
					 <div class="form-group">
                        <label class="form-label" for="id_juego">Juego</label>
                        
					<td>
								<select name="id_juego">

								<?php
								while ($row = $datosjuego->fetch_array()){
									?>
									
																		
									<?php
								if($row['venta']=='1'){ ?>
								<option value="<?php echo $row['id_juego']; ?>"><?php echo $row['nombre_juego']; ?> | <?php echo $row['plataforma']; ?> </option>
		                        <?php
								}}
								?>

								</select></td>
					</div>
					
					 <div class="form-group">
                       <input type="hidden" class="form-control" id="fecha_alquiler" name="fecha_alquiler" value="<?php echo date("Y-m-d\TH-i");?>">
                    </div>
					
                    <button name="action" value="ADD" type="submit" class="boton-env">
                        <img src="../Views/imgs/send.png" alt="">
                    </button>
                </form>
            </div>

            </div>
            <footer>
				<h6>GAMERENTING - 2018</h6>
            </footer>
        </section>
        <!--<script src="../Views/js/md5.js"></script>
        <?php include '../Views/js/validaciones.js'; ?>
        <script src="../Views/js/main.js"></script>-->
        </body>
        </html>
		<script src="../js/validaciones.js"></script>  

        <?php

    }
}
?>