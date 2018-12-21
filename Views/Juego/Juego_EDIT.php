<?php

/**
 * Funcion: Vista que nos permite editar un juego
 * Autor: Mario Gayoso Perez 

 */
 class Loteria_EDIT {

    function __construct($lotemail,$lotnombre,$lotapellidos,
	$lotparticipacion,$lotresguardo,$lotingresado,$lotpremiopersonal,$lotpagado){

        $this->pinta($lotemail,$lotnombre,$lotapellidos,
	$lotparticipacion,$lotresguardo,$lotingresado,$lotpremiopersonal,$lotpagado);

    }


    //función que contiene la vista
    function pinta($lotemail,$lotnombre,$lotapellidos,
	$lotparticipacion,$lotresguardo,$lotingresado,$lotpremiopersonal,$lotpagado){
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
                <h3><?php echo $strings['Editarpart']; ?></h3>
                <?php

                ?>
<form class="form-basic" enctype="multipart/form-data" id="form"  method="post" action="../Controllers/LOTERIAIU_Controller.php" onsubmit="return editarLoteria()">
                   <div class="form-group">
                        <label class="form-label" for="id_juego">#Juego</label>
                        <input type="text" class="form-control" maxlength="15" size="15" id="id_juego" name="id_juego">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="nombre_juego">Nombre</label>
                        <input type="text" class="form-control" maxlength="20" size="15" id="nombre_juego" name="nombre_juego">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="plataforma">Plataforma</label>
                        <input type="text" class="form-control" maxlength="20" size="15" id="plataforma" name="plataforma">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="genero">Genero</label>
                        <input type="text" class="form-control" maxlength="20" size="15" id="genero" name="genero">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="precio_compra">Precio Compra</label>
                        <input type="text" class="form-control" maxlength="15" size="15" id="precio_compra" name="precio_compra">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="categoria_vendedor">Categoria</label>
                        <input type="text" class="form-control" maxlength="15" size="15" id="categoria_vendedor" name="categoria_vendedor">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="login">Novedad</label>
                        <input type="text" class="form-control" maxlength="15" size="15" id="novedad" name="novedad">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="compra_juego">Compra</label>
                        <input type="text" class="form-control" maxlength="15" size="15" id="compra_juego" name="compra_juego">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="venta_juego">Venta</label>
                        <input type="text" class="form-control" maxlength="15" size="15" id="venta_juego" name="venta_juego">
                    </div>
						<input type="radio" name="lotingresado" value="SI"> <?php echo $strings['SI']; ?>
						<input type="radio" name="lotingresado" value="NO"> <?php echo $strings['NO']; ?>  


                    
											 <div class="form-group">
                        <label class="form-label" for="login"><?php echo $strings['Premiopersonal']; ?></label>
						<input type="text" class="form-control" maxlength="6" size="6" id="lotpremiopersonal" name="lotpremiopersonal" value="<?php echo $lotpremiopersonal; ?>">
                    
											 <div class="form-group">
                        <label class="form-label" for="login"><?php echo $strings['Pagado']; ?></label>
						(Actual: <input type="hidden" name="lotpagado" value="<?php echo $lotpagado; ?>"><?php echo $lotpagado; ?>)
                        
	<input type="radio" name="lotpagado" value="SI"> <?php echo $strings['SI']; ?>
    <input type="radio" name="lotpagado" value="NO"> <?php echo $strings['NO']; ?> 
                    
                    <button name="action" value="EDIT" type="submit" class="boton-env">
                        <img src="../Views/imgs/send.png" alt="">
                    </button>
                </form>
            </div>

            </div>
            <footer>
				<span><img style="height:60px; width:50px;" src="../Views/imgs/logolot.png"></span>
				<h6>Loteria ESEI</h6>
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