<?php

/**
 * Funcion: Modelo de loterias que nos permite acceder a la tabla en la bd
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
 */

class LOTERIA_Model
{
	var $lotemail;
	var $lotnombre;
	var $lotapellidos;
	var $lotparticipacion;
	var $lotresguardo;
	var $lotingresado;
	var $lotpremiopersonal;
	var $lotpagado;
    var $mysqli; // declaración del atributo manejador de la bd

    function __construct($lotemail,$lotnombre,$lotapellidos,
	$lotparticipacion,$lotresguardo,$lotingresado,$lotpremiopersonal,
	$lotpagado)
    {
        //asignación de valores de parámetro a los atributos de la clase
        $this->lotemail = $lotemail;
		$this->lotnombre = $lotnombre;
		$this->lotapellidos = $lotapellidos;
		$this->lotparticipacion = $lotparticipacion;
		$this->lotresguardo = $lotresguardo;
		$this->lotingresado = $lotingresado;
		$this->lotpremiopersonal = $lotpremiopersonal;
		$this->lotpagado = $lotpagado;
        include '../Models/DB/BdAdmin.php';

        // conectamos con la bd y guardamos el manejador en un atributo de la clase
        $this->mysqli = ConnectDB();

    }

    function ADD()
    {

        $sql; //variable que alberga la sentencia sql
        $result; //almacena la consulta sql

        if (($this->lotemail <> '')) { // si el atributo clave de la entidad no esta vacio

            // construimos el sql para buscar esa clave en la tabla
            $sql = "SELECT * FROM `LOTERIAIU` WHERE ('lot.email' = '$this->lotemail')";

            if (!$result = $this->mysqli->query($sql)) { // si da error la ejecución de la query

			   return 'It is not possible connect to DB'; // error en la consulta (no se ha podido conectar con la bd).
            } else { // si la ejecución de la query no da error
                if ($result->num_rows == 0) { // miramos si el resultado de la consulta es vacio (no existe el login)
                    //construimos la sentencia sql de inserción en la bd
                    $sql = "INSERT INTO `LOTERIAIU` (`lot.email`,`lot.nombre`,`lot.apellidos`,`lot.participacion`,`lot.resguardo`) 
				VALUES ('$this->lotemail','$this->lotnombre','$this->lotapellidos','$this->lotparticipacion','$this->lotresguardo')";

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

		$sql; //variable que alberga la sentencia sql
		$result; //almacena la consulta sql
		$resultado; //almacena la consulta sql

		// se construye la sentencia de busqueda de la tupla en la bd
	    $sql = "SELECT * FROM `LOTERIAIU` WHERE (`lot.email` = '$this->lotemail')";
		
	    $result = $this->mysqli->query($sql); // se ejecuta la query
		
	    if ($result->num_rows == 1) // si el numero de filas es igual a uno es que lo encuentra
	    {	
	        // se construye la sentencia de modificacion en base a los atributos de la clase
			/*$sql = "UPDATE `LOTERIAIU` SET 
						'lot.nombre' = '$this->lotnombre',
						'lot.apellidos' = '$this->lotapellidos',
						'lot.participacion' = '$this->lotparticipacion',
						'lot.resguardo' = '$this->lotresguardo',
						'lot.ingresado' = '$this->lotingresado',
						'lot.premiopersonal' = '$this->lotpremiopersonal',
						'lot.pagado' = '$this->lotpagado'
						WHERE (`lot.email` = '$this->lotemail')";*/
						
			$sql = "UPDATE `LOTERIAIU` SET 
			`lot.nombre`='$this->lotnombre',
			`lot.apellidos`='$this->lotapellidos',
			`lot.participacion`='$this->lotparticipacion',
			`lot.resguardo`='$this->lotresguardo',
			`lot.ingresado`='$this->lotingresado',
			`lot.premiopersonal`='$this->lotpremiopersonal',
			`lot.pagado`='$this->lotpagado'
			WHERE (`lot.email` = '$this->lotemail')";
			
	        if (!($resultado = $this->mysqli->query($sql))){ // si hay un problema con la query se envia un mensaje de error en la modificacion
					return 'Unknowed Error';
			}
			else{ // si no hay problemas con la modificación se indica que se ha modificado
				
				return 'Success Modify';
			}
	    }
	    else // si no se encuentra la tupla se manda el mensaje de que no existe la tupla
	    	return 'It does not exist in DB';
	} // fin del metodo EDIT


    function __destruct()
    {
    }
	
	    function SEARCH()
    {

        $sql; //variable que alberga la sentencia sql
        $resultado; //almacena la consulta sql
        $result; //variable que albergara el valor de resultado

        // construimos el sql para buscar esa clave en la tabla
        $sql = "SELECT * FROM `LOTERIAIU` WHERE (`lot.email` = '$this->lotemail' OR `lot.nombre` LIKE '$this->lotnombre' 
		OR `lot.apellidos` LIKE '$this->lotapellidos' OR `lot.participacion` LIKE '$this->lotparticipacion')";

        if (!($resultado = $this->mysqli->query($sql))) {//Si la busqueda no da resultados, se devuelve el mensaje de que no existe
            return 'It does not exist in DB';
        } else { // si existe
            $result = $resultado;//guarda el valor deresultado en result
            return $result; //devuelve result
        }
    }
/*  OR `lot.ingresado` LIKE '$this->lotingresado' OR `lot.premiopersonal` LIKE '$this->lotpremiopersonal' 
		OR `lot.pagado` LIKE '$this->lotpagado' */
		
		/*(`lot.ingresado` LIKE '$this->lotingresado' AND `lot.ingresado` NOT NULL)*/
		
    function AllData()
    {

        $sql; //variable que alberga la sentencia sql
        $resultado; //almacena la consulta sql
        $result; //variable que albergara el valor de resultado

        // construimos el sql para buscar esa clave en la tabla
        $sql = "SELECT * FROM `LOTERIAIU` ";

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
        $sql = "SELECT * FROM `LOTERIAIU` WHERE (`lot.email` = '$this->lotemail')";     
        $result = $this->mysqli->query($sql);

        if ($result->num_rows == 1) // si existe una tupla con ese valor de clave
        {
            // se construye la sentencia sql de borrado
            $sql = "DELETE FROM `LOTERIAIU` WHERE (`lot.email` = '$this->lotemail')";

            $this->mysqli->query($sql);
            
            return "Correctly delete";// se devuelve el mensaje de borrado correcto
        } else // si no existe el login a borrar se devuelve el mensaje de que no existe
            return "It does not exist";
    }


}
?>