<?php

/**
 * Funcion: Vista que nos permite ver todas las loteria
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

                <div >
                    <form  action="<?php echo $message; ?>" method="">
						<button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>
						<button class="showall-action" name="action" value="ADD" type="submit"><img src="../Views/imgs/add.png" alt="" srcset=""></button>
                    </form>

                </div>
				
                <table id="juegos" class="showall-tab">
                    <tr>
                        <th>#Juego</th>
						<th>Nombre</th>
						<th>Plataforma</th>
						<th>Genero</th>
						<th>Precio Compra</th>
						<th>Categoria</th>
						<th>Novedad</th>
                        <th>Compra</th>
                        <th>Venta</th>

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
                              <input type="hidden" name="id_juego" value="<?php echo $row['id_juego']; ?>">      
                              <input type="hidden" name="nombre_juego" value="<?php echo $row['nombre_juego']; ?>">
                              <input type="hidden" name="plataforma" value="<?php echo $row['plataforma']; ?>">
                              <input type="hidden" name="genero" value="<?php echo $row['genero']; ?>">
                              <input type="hidden" name="precio_compra" value="<?php echo $row['precio_compra']; ?>">
                              <input type="hidden" name="categoria" value="<?php echo $row['categoria']; ?>">                      
                              <input type="hidden" name="novedad" value="<?php echo $row['novedad']; ?>">
                              <input type="hidden" name="compra" value="<?php echo $row['compra']; ?>">
                              <input type="hidden" name="venta" value="<?php echo $row['venta']; ?>">

								<td><?php echo $row['id_juego']; ?></td>
								<td><?php echo $row['nombre_juego']; ?></td>
								<td><?php echo $row['plataforma']; ?></td>
								<td><?php echo $row['genero']; ?></td>
								<td><?php echo $row['precio_compra']; ?></td>
								<td><?php echo $row['categoria']; ?></td>
								<td><?php echo $row['novedad']; ?></td>
                                <td><?php echo $row['compra']; ?></td>
                                <td><?php echo $row['venta']; ?></td>
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
				<h6>Juego Showall</h6>
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