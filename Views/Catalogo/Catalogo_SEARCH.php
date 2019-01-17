<?php
/**
 * Funcion: Vista que nos permite buscar por juegos
 * Autor: Mario Gayoso Pérez
  */
class Catalogo_SEARCH {

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
                        <label class="form-label" for="nombre_juego"><?php echo $strings['Nombre juego'];?></label>
                        <input type="text" class="form-control" maxlength="60" size="60" id="nombre_juego" name="nombre_juego" >
                    </div>
               
               <div class="showall">
                    <button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>
                </div>
				</form> 
                 <form  action="<?php echo $message; ?>" method="post"> 
				<label class="form-label" for="plataforma"><?php echo $strings['Plataforma'];?></label>
					 
        <select name="plataforma">
          <option value="PS4">PS4</option>
          <option value="Xbox 360">Xbox 360</option>
          <option value="PC">PC</option>
          <option value="Nintendo Switch">Nintendo Switch</option>
        </select>
              
               <div class="showall">
                    <button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>
                </div>
				</form> 
                 <form  action="<?php echo $message; ?>" method="post">  
                    
					<label class="form-label" for="genero"><?php echo $strings['Genero'];?></label>
				
        <select name="genero">
          <option value="PS4"><?php echo $strings['Accion'];?></option>
          <option value="Xbox 360"><?php echo $strings['Estrategia'];?></option>
          <option value="PC"><?php echo $strings['Deporte'];?></option>
          <option value="Nintendo Switch"><?php echo $strings['Plataforma'];?></option>
        </select>
                    
                <div class="showall">
                    <button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>
                </div>
				</form> 
                 <form  action="<?php echo $message; ?>" method="post">  
                    <div class="form-group">
                        <label class="form-label" for="precio_compra"><?php echo $strings['Precio compra'];?></label>
                        <input type="text" class="form-control" maxlength="15" size="15" id="precio_compra" name="precio_compra" onblur=" comprobarVacio(this); comprobarEntero(this,2,0,200)">
						 </div>
                   
               <div class="showall">
                    <button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>
                </div>
				</form> 

                 <form  action="<?php echo $message; ?>" method="post"> 
				 
                    <label class="form-label" for="novedad"><?php echo $strings['Novedad'];?></label>
                <input type="checkbox" name="novedad" value="1"><?php echo $strings['Si'];?><br>
				<input type="checkbox" name="novedad" value="0"><?php echo $strings['No'];?><br>
					
               <div class="showall">
                    <button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>
                </div>
				</form> 
				
                 <form  action="<?php echo $message; ?>" method="post"> 
				 
                    <label class="form-label" for="compra"><?php echo $strings['Compra'];?></label>
                <input type="checkbox" name="compra" value="1"><?php echo $strings['Si'];?><br>
				<input type="checkbox" name="compra" value="0"><?php echo $strings['No'];?><br>
				
                <div class="showall">
                    <button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>
                </div>
				 </form> 
				 
				<form  action="<?php echo $message; ?>" method="post"> 
				
			 <label class="form-label" for="venta"><?php echo $strings['Venta'];?></label>
                <input type="checkbox" name="venta" value="1"><?php echo $strings['Si'];?><br>
				<input type="checkbox" name="venta" value="0"><?php echo $strings['No'];?><br>
				
               <div class="showall">
                    <button class="showall-action" name="action" value="SEARCH" type="submit"><img src="../Views/imgs/search.png" alt="" srcset=""></button>
                </div>
			 </form>
			 
            </div>

            <footer>
				<span><img style="height:60px; width:50px;" src="../Views/imgs/logolot.png"></span>
				<h6>GameRenting 2019</h6>
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