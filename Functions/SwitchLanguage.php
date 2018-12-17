<?php
/**
 * Funcion: Archivo php donde se gestiona el cambio de idioma
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
 */
session_start();
$idioma = $_POST['idioma'];
$_SESSION['idioma'] = $idioma;
header('Location:' . $_SERVER["HTTP_REFERER"]);
?>



