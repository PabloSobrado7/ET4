<?php
/**
 * Funcion: Archivo php para desconectar a un usuario y cerrar sesion
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
 */
session_start();
session_destroy();
header('Location: ../index.php');

?>
