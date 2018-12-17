<?php

/**
 * Funcion: Vista donde se encuentra la cabecera de la pagina web
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
 */
    include_once '../Functions/Authentication.php';

    class HEADER{

        function __construct(){

            $this->pinta();

        }

    //función que contiene la vista
    function pinta(){

        include '../Locales/Strings_index.php';

        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="../Views/css/style.css">

            <link rel="shortcut icon" type="image/png" href="../Views/imgs/ball.png"/>
            <link rel="stylesheet" type="text/css" href="../Views/css/tcal.css" />

            <link rel="stylesheet" href="../Views/css/button.css">
              
            <title>GAMERENT</title>
        </head>
        <body>
                <header>   
                        <div class="menu-dev" onclick="menu()" >
                            <img src="../Views/imgs/menu.png" alt="">
                        </div> 
                        <div class="head-sec">
                        </div>
                        <a href="../Controllers/Login_Controller.php">
                            <h1>
                                <span>Game</span>
                                <span>RENTING</span>
                                <span><img style="height:60px; width:90px;" src="../Views/imgs/grlogo.png"></span>
                            </h1>

                        </a>
                        <div class="head-sec">
                        
                            <?php
                            
                                if(IsAuthenticated()){
                            ?>

                            <div class="user" tabindex="1">
                                <img src="../Views/imgs/user_icon.png" alt="" srcset="">
                                <h5><?php echo $_SESSION['login']; ?></h5>

                            </div>
                            <?php

                                }else{
                                    ?>
                                    <?php
                                }
                            ?>
                            <button class="lang">
                                <img src="../Views/imgs/world.png" alt="" srcset="">
                                <div class="sub-list">
                                    <form class="menu-lang" action="../Functions/SwitchLanguage.php" method="post">


                                    <?php
                                        //comprueba que idioma esta cargado y carga el String correspodiente
                                        foreach($stringslang as $lang){
                                            ?>
                                                <input type="submit" value="<?php echo $lang ?>" name="idioma">    
                                            <?php
                                        }
                                    ?>
                                    </form>
                                </div>                                
                            </button>
                            <button class="log">
                                <a href="../Functions/Disconnect.php">
                                    <img src="../Views/imgs/close.png" alt="" srcset="">
                                </a>
                            </button>
                            
                        </div>
                    </header>

                                <?php

                    include '../Views/ASIDE_View.php';
                    new Aside();

    }
       }
       ?>
