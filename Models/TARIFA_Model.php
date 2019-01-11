<?php

/**
 * Funcion: Modelo de socios que nos permite acceder a la tabla en la bd
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
 */

class TARIFA_Model
{
	var $id_tarifa;
	var $precio_tarifa;
	var $categoria_tarifa;
	var $tiempo_tarifa;
	
    var $mysqli; // declaración del atributo manejador de la bd

    function __construct($id_tarifa,$precio_tarifa,
	$categoria_tarifa,$tiempo_tarifa)
    {
        //asignación de valores de parámetro a los atributos de la clase
        $this->id_tarifa = $id_tarifa;
		$this->precio_tarifa = $precio_tarifa;
		$this->categoria_tarifa = $categoria_tarifa;
		$this->tiempo_tarifa = $tiempo_tarifa;
		
        include '../Models/DB/BdAdmin.php';

        // conectamos con la bd y guardamos el manejador en un atributo de la clase
        $this->mysqli = ConnectDB();

    }

    function ADD()
    {
    }
	
	function EDIT()
	{
	} 


    function __destruct()
    {
    }
	
	    function SEARCH()
    {

    }

    function AllData()
    {

        $sql; //variable que alberga la sentencia sql
        $resultado; //almacena la consulta sql
        $result; //variable que albergara el valor de resultado

        // construimos el sql para buscar esa clave en la tabla
        $sql = "SELECT * FROM `TARIFA`";

        if (!($resultado = $this->mysqli->query($sql))) {//Si la busqueda no da resultados, se devuelve el mensaje de que no existe
            return 'It does not exist in DB';
        } else { // si existe
            $result = $resultado;//guarda el valor deresultado en result
            return $result; //devuelve result
        }
    }


    function DELETE()
    {

    }


}
?>