<?php

/**
 * Funcion: Vista donde se encuentra el menu lateral de la pagina web
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
 */
    include_once '../Functions/Authentication.php';

    class Aside {

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
    
            include '../Locales/Strings_index.php';
            
            $stringslang;//almacena idioma
            $lang;//almacena el idioma en uso

            //bucle foreach que comprueba que idioma esta seleccionado para cargar los strings
            foreach($stringslang as $lang){
                //Comprueba que idioma está seleccionado y carga el strings correspondiente
                if($lang == $_SESSION['idioma'])
                    include '../Locales/Strings_'. $lang .'.php';
            }

            ?>
    
            <aside id="menu">
            <div class="resp-menu-close" onclick="hide()">
                <img src="../Views/imgs/cross.png" alt="">
            </div>
                <?php 
				if(isset($_SESSION['login'])) {?>
            <ul>
                <a href="../Controllers/Login_Controller.php">
                    <li>
                        <?php echo $strings['Inicio']; ?>
                    </li>
                </a>
				<?php 
				
				$archivo = fopen('../tipouser.txt', 'r');		
				$useractual = fgets($archivo);
				fclose($archivo);

				if($useractual=='admin'){ ?>
                <ul>Admin
					<a href="../Controllers/VENDEDOR_Controller.php" ><li><?php echo $strings['Administrar vendedores']; ?></li></a>
                     </ul>
				<?php }  ?>
				<?php if($useractual=='vendedor'){ ?>
				<ul>Vendedor
					<a href="../Controllers/JUEGO_Controller.php" ><li><?php echo $strings['Gestionar juegos']; ?></li></a>
                    <a href="../Controllers/SOCIO_Controller.php" ><li><?php echo $strings['Gestionar socios']; ?></li></a>
                    <a href="../Controllers/COMPRA_Controller.php" ><li><?php echo $strings['Gestiónar compra']; ?></li></a>
					<a href="../Controllers/ALQUILA_Controller.php" ><li><?php echo $strings['Gestiónar alquiler']; ?></li></a>
					<a href="../Controllers/RANKING_Controller.php" ><li><?php echo $strings['Productos mas comprados/alquilados']; ?></li></a>
					<a href="../Controllers/ACTIVOS_Controller.php" ><li><?php echo $strings['Socios más activos']; ?></li></a>
					</ul>
					<?php } ?>
					<?php if($useractual=='socio'){ ?>
				<ul>Socio
				<a href="../Controllers/CATALOGO_Controller.php" ><li><?php echo $strings['Consultar catálogo']; ?></li></a>
					<a href="../Controllers/NOVEDADES_Controller.php" ><li><?php echo $strings['Consultar novedades']; ?></li></a>
					<a href="../Controllers/RANKING_Controller.php" ><li><?php echo $strings['Productos mas comprados/alquilados']; ?></li></a>
					<a href="../Controllers/SOCIOP_Controller.php" ><li><?php echo $strings['Mis compras/alquileres']; ?></li></a>
                    </ul>
					<?php } ?>

                
            </ul>
            <?php } ?>
        </aside>

        <?php
        }
}

?>