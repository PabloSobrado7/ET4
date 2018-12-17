<?php

/**
 * Funcion: Vista que nos permite editar una loteria
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
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
                        <label class="form-label" for="login"><?php echo $strings['Email']; ?></label>
                        <input type="text" class="form-control" maxlength="60" size="60" id="lotemail" name="lotemail" value="<?php echo $lotemail; ?>" readonly>
                    </div>
					
					 <div class="form-group">
                        <label class="form-label" for="login"><?php echo $strings['Name']; ?></label>
                        <input type="text" class="form-control" maxlength="30" size="30" id="lotnombre" name="lotnombre" value="<?php echo $lotnombre; ?>" onblur="comprobarTexto(this,30)">
                    </div>
					
					 <div class="form-group">
                        <label class="form-label" for="login"><?php echo $strings['Surname']; ?></label>
                        <input type="text" class="form-control" maxlength="40" size="40" id="lotapellidos" name="lotapellidos" value="<?php echo $lotapellidos; ?>" onblur="comprobarTexto(this,40)">
                    </div>
					
					 <div class="form-group">
                        <label class="form-label" for="login"><?php echo $strings['Participacion']; ?></label>
                        <input type="text" class="form-control" maxlength="3" size="3" id="lotparticipacion" name="lotparticipacion" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php echo $lotparticipacion; ?>">
                    </div>
					
					 <div class="form-group">
                        <label class="form-label" for="login"><?php echo $strings['Resguardo']; ?></label>
						<td><a target="_blank" title="Resguardo" href="<?php echo $lotresguardo; ?>"><img alt="Actual (click para ver)" /></a></td>
						<br><input type="file" name="lotresguardo" id="lotresguardo"></div>
						
										 <div class="form-group">
                        <label class="form-label" for="login"><?php echo $strings['Ingresado']; ?></label>
						(Actual: <input type="hidden" name="lotingresado" value="<?php echo $lotingresado; ?>"><?php echo $lotingresado; ?>)

						
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