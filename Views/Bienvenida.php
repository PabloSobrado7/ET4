<?php
/**
 * Funcion: Vista donde se encuentra el mensaje de bienvenida al usuario logueado
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
 */


    class Bienvenida{

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
                if($lang == $_SESSION['idioma'])
                    include '../Locales/Strings_'. $lang .'.php';
            }

            include '../Views/HEADER_View.php';
            new HEADER();
            ?>
            <section>
                <link rel="stylesheet" href="../Views/css/button.css">
                <link href="https://fonts.googleapis.com/css?family=Pavanam" rel="stylesheet">
                <div class="bienvenida">
                    <img id="ima" src="../Views/imgs/gamerenting.jpg">
                    <?php $str='¡ ' . $strings['Bienvenido'] . ' ' . $_SESSION['login'] . ' !';
                    $str = strtoupper($str);?>
                    <h3 id="tit"><?php echo $str ?></h3>

				 
            <footer>
				<h6>GAMERENTING - 2018</h6>
            </footer>
            </section>
            </body>
            </html>
            <?php
        }
    }
?>