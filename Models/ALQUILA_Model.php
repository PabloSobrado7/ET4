<?php

/**
 * Funcion: Modelo de alquiler que nos permite acceder a la tabla en la bd
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
 */

class ALQUILA_Model
{
	var $login_socio;
	var $id_tarifa;
	var $fecha_alquiler;
	var $id_juego;

    var $mysqli; // declaración del atributo manejador de la bd

    function __construct($login_socio,$id_tarifa,
	$fecha_alquiler,$id_juego)
    {
        //asignación de valores de parámetro a los atributos de la clase
        $this->login_socio = $login_socio;
		$this->id_tarifa = $id_tarifa;
		$this->fecha_alquiler = $fecha_alquiler;
		$this->id_juego = $id_juego;
		
        include '../Models/DB/BdAdmin.php';

        // conectamos con la bd y guardamos el manejador en un atributo de la clase
        $this->mysqli = ConnectDB();

    }

    function ADD()
    {


        $sql; //variable que alberga la sentencia sql
        $result; //almacena la consulta sql

        if (($this->login_socio <> '')&&($this->id_tarifa <> '')&&($this->fecha_alquiler <> '')) { // si el atributo clave de la entidad no esta vacio

            // construimos el sql para buscar esa clave en la tabla
            $sql = "SELECT * FROM `ALQUILA` WHERE ('login_socio' = '$this->login_socio' AND 'id_tarifa' = '$this->id_tarifa' AND
			'fecha_alquiler' = '$this->fecha_alquiler')";

            if (!$result = $this->mysqli->query($sql)) { // si da error la ejecución de la query

			   return 'It is not possible connect to DB'; // error en la consulta (no se ha podido conectar con la bd).
            } else { // si la ejecución de la query no da error
                if ($result->num_rows == 0) { // miramos si el resultado de la consulta es vacio (no existe el login)
//construimos la sentencia sql de inserción en la bd

                    $sql = "INSERT INTO `ALQUILA` (`login_socio`,`id_tarifa`,`fecha_alquiler`,`id_juego`) 
				VALUES ('$this->login_socio','$this->id_tarifa','$this->fecha_alquiler','$this->id_juego')";

                    if (!$this->mysqli->query($sql)) { // si da error en la ejecución del insert devolvemos mensaje
                        return 'Unknowed Error';
                    } else { //si no da error en la insercion devolvemos mensaje de exito

                        return 'Success insert'; //operacion de insertado correcta
                    }
                } else
                    return 'It is already in DB'; // ya existe
            }
        } else { // si el atributo clave de la bd es vacio solicitamos un valor en un mensaje
            return 'Introduce a value'; // introduzca un valor para el usuario
        }
    }
	
	function EDIT()
	{

	} // fin del metodo EDIT


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
        $sql = "SELECT * FROM `ALQUILA`";

        if (!($resultado = $this->mysqli->query($sql))) {//Si la busqueda no da resultados, se devuelve el mensaje de que no existe
            return 'It does not exist in DB';
        } else { // si existe
            $result = $resultado;//guarda el valor deresultado en result
            return $result; //devuelve result
        }
    }


    function DELETE()
    {
        $sql; //variable que alberga la sentencia sql
        $result; //almacena la consulta sql


        // se construye la sentencia sql de busqueda con los atributos de la clase
        $sql = "SELECT * FROM `ALQUILA` WHERE (`login_socio` = '$this->login_socio' 
		AND `id_tarifa` = '$this->id_tarifa' 
		AND `fecha_alquiler` = '$this->fecha_alquiler')";     
        $result = $this->mysqli->query($sql);

        if ($result->num_rows == 1) // si existe una tupla con ese valor de clave
        {

            // se construye la sentencia sql de borrado
            $sql = "DELETE FROM `ALQUILA` WHERE (`login_socio` = '$this->login_socio' 
		AND `id_tarifa` = '$this->id_tarifa' 
		AND `fecha_alquiler` = '$this->fecha_alquiler')";

            $this->mysqli->query($sql);
            
            return "Correctly delete";// se devuelve el mensaje de borrado correcto
        } else // si no existe el login a borrar se devuelve el mensaje de que no existe
            return "It does not exist";
    }


}
?>