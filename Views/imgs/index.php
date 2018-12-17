<?php 

 include("Locales/lang.php");

error_reporting(0);

 ?> 

<!DOCTYPE html>
<html lang="en">

<head>
  
    <meta charset="UTF-8"></meta>
    <link rel="stylesheet" href="thehole.css"></link>
	<title>Loteria IU</title>
	
</head>

<body> 
 
  <header>
 
    <ul class="logopag"><img class="logo" src="logolot.png" height="100" width="90"></ul><br><br>
  <a href="index.php?idioma=es"><img class="banderas" src="https://image.flaticon.com/icons/svg/299/299820.svg" height="30" width="30"></a>
  <a href="index.php?idioma=en"><img class="banderas" src="https://image.flaticon.com/icons/svg/299/299688.svg" height="30" width="30"></a>
  <a href="index.php?idioma=ga"><img class="banderas" src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c0/Bandeira_galega_civil.svg/1200px-Bandeira_galega_civil.svg.png" height="30" width="30"></a>
  
  <div class="login">
  <form action="Controllers/Login_Controller.php" method="post">
<input class="input" type="text" id="login" name="login" placeholder="Usuario">
<input class="input" type="password" id="password" name="password" placeholder="Contraseña">
	   <button type="submit" class="boton2" ><?php echo "$iniciarsesion";?></button><br>
	    <?php echo "$notienesunacuenta";?> <a href="views/REGISTRO_View.php"><?php echo "$registrateyaaqui";?></a>
  </form></div>
  
 <br><br>

 <div class="scrollmenu">
  <a href="Views/REGISTRO_View.php"><?php echo "$registrarse";?></a>
 </div>
 
 <br>
 
 </header>
 
	
 <div class="encuesta"> 
 Página web para la gestión de lotería de la ESEI.
	<br>
		

 

</div>

<td><img class="logoFloatRight" src="logolot.png" width="160" height="180" ></td>

<br><br><br>


<footer>

 <footer>
<br>
<?php echo "$comofunciona";?> <img src="logolot.png"width="30" height="33"></img> <?php echo "$comofunciona2";?>
<br><br>

<ul class="pie">
 <li><?php echo "$administraygestiona";?></li>
 <li><img src="encuesta2.png"width="60" height="60"></img></li>
 <li><?php echo "$participaloteria";?></li>
 <li><img src="encuesta.png"width="60" height="60"></img></li>
 
</ul>
<br>
<li><?php echo "$registrateparaacceder";?></li>
<br>

</footer>

</footer>

</body>

</html>
