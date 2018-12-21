<?php
/**
 * Funcion: Vista que nos permite buscar por juegos
 * Autor: Mario Gayoso Pérez
  */
class Loteria_SEARCH {

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
                <h3><?php echo $strings['Busqueda']; ?></h3>
                <?php

                ?>
 
				<form  action="<?php echo $message; ?>" method="post">	
					<div class="form-group">
                        <label class="form-label" for="login"><?php echo $strings['#Juego']; ?></label>
                        <input type="text" class="form-control" maxlength="60" size="60" id="id_juego" name="id_juego" >
                    </div>
					
				<div class="showall">
					<button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>
				</div>
				
                <form  action="<?php echo $message; ?>" method="post">  
                    <div class="form-group">
                        <label class="form-label" for="login"><?php echo $strings['Nombre']; ?></label>
                        <input type="text" class="form-control" maxlength="60" size="60" id="nombre_juego" name="nombre_juego" >
                    </div>
                    
                <div class="showall">
                    <button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>
                </div>
                 <form  action="<?php echo $message; ?>" method="post">  
                    <div class="form-group">
                        <label class="form-label" for="login"><?php echo $strings['Plataforma']; ?></label>
                        <input type="text" class="form-control" maxlength="60" size="60" id="plataforma" name="plataforma" >
                    </div>
                    
                <div class="showall">
                    <button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>
                </div>
                 <form  action="<?php echo $message; ?>" method="post">  
                    <div class="form-group">
                        <label class="form-label" for="login"><?php echo $strings['Genero']; ?></label>
                        <input type="text" class="form-control" maxlength="60" size="60" id="genero" name="genero" >
                    </div>
                    
                <div class="showall">
                    <button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>
                </div>
                 <form  action="<?php echo $message; ?>" method="post">  
                    <div class="form-group">
                        <label class="form-label" for="login"><?php echo $strings['Precio Compra']; ?></label>
                        <input type="text" class="form-control" maxlength="60" size="60" id="precio_compra" name="precio_compra" >
                    </div>
                    
                <div class="showall">
                    <button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>
                </div>
                 <form  action="<?php echo $message; ?>" method="post">  
                    <div class="form-group">
                        <label class="form-label" for="login"><?php echo $strings['Categoria']; ?></label>
                        <input type="text" class="form-control" maxlength="60" size="60" id="categoria_vendedor" name="categoria_vendedor" >
                    </div>
                    
                <div class="showall">
                    <button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>
                </div>
                 <form  action="<?php echo $message; ?>" method="post">  
                    <div class="form-group">
                        <label class="form-label" for="login"><?php echo $strings['Novedad']; ?></label>
                        <input type="text" class="form-control" maxlength="60" size="60" id="novedad" name="novedad" >
                    </div>
                    
                <div class="showall">
                    <button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>
                </div>
                 <form  action="<?php echo $message; ?>" method="post">  
                    <div class="form-group">
                        <label class="form-label" for="login"><?php echo $strings['Compra']; ?></label>
                        <input type="text" class="form-control" maxlength="60" size="60" id="novedad" name="novedad" >
                    </div>
                    
                <div class="showall">
                    <button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>
                </div>
                 <form  action="<?php echo $message; ?>" method="post">  
                    <div class="form-group">
                        <label class="form-label" for="login"><?php echo $strings['Novedad']; ?></label>
                        <input type="text" class="form-control" maxlength="60" size="60" id="compra_juego" name="compra_juego" >
                    </div>
                    
                <div class="showall">
                    <button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>
                </div>
                 <form  action="<?php echo $message; ?>" method="post">  
                    <div class="form-group">
                        <label class="form-label" for="login"><?php echo $strings['Venta']; ?></label>
                        <input type="text" class="form-control" maxlength="60" size="60" id="compra_juego" name="compra_juego" >
                    </div>
                    
                <div class="showall">
                    <button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>
                </div>


					</form>
					
					<form  action="<?php echo $message; ?>" method="post">
						<div class="form-group">
                        <label class="form-label" for="login"><?php echo $strings['Pagado']; ?></label>
						<input type="hidden" name="id_pista" >
			
	<input type="radio" name="lotpagado" value="SI"> <?php echo $strings['SI']; ?>
    <input type="radio" name="lotpagado" value="NO"> <?php echo $strings['NO']; ?> 
                    
				<div class="showall">
                  
						<button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>
					
                </div>					
				</form>

            </div>

            </div>
            <footer>
				<span><img style="height:60px; width:50px;" src="../Views/imgs/logolot.png"></span>
				<h6>Formulario de prueba SEARCH juego</h6>
            </footer>
        </section>
        <!--<script src="../Views/js/md5.js"></script>
        <?php include '../Views/js/validaciones.js'; ?>
        <script src="../Views/js/main.js"></script>-->
        </body>
        </html>

        <?php

    }
}
?>