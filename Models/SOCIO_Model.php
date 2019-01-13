<?php

/**
 * Funcion: Modelo de socios que nos permite acceder a la tabla en la bd
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
 */

class SOCIO_Model
{
	var $login_socio;
	var $pass_socio;
	var $dni_socio;
	var $nombre_socio;
	var $apellidos_socio;
	var $email_socio;
	var $telefono_socio;
	var $socio_bloqueado;
    var $mysqli; // declaración del atributo manejador de la bd

    function __construct($login_socio,$pass_socio,
	$dni_socio,$nombre_socio,$apellidos_socio,
	$email_socio,$telefono_socio,$socio_bloqueado)
    {
        //asignación de valores de parámetro a los atributos de la clase
        $this->login_socio = $login_socio;
		$this->pass_socio = $pass_socio;
		$this->dni_socio = $dni_socio;
		$this->nombre_socio = $nombre_socio;
		$this->apellidos_socio = $apellidos_socio;
		$this->email_socio = $email_socio;
		$this->telefono_socio = $telefono_socio;
		$this->socio_bloqueado = $socio_bloqueado;
        include '../Models/DB/BdAdmin.php';

        // conectamos con la bd y guardamos el manejador en un atributo de la clase
        $this->mysqli = ConnectDB();

    }

    function ADD()
    {

        $sql; //variable que alberga la sentencia sql
        $result; //almacena la consulta sql

        if (($this->login_socio <> '')) { // si el atributo clave de la entidad no esta vacio

            // construimos el sql para buscar esa clave en la tabla
            $sql = "SELECT * FROM `SOCIO` WHERE ('login_socio' = '$this->login_socio')";

            if (!$result = $this->mysqli->query($sql)) { // si da error la ejecución de la query

			   return 'It is not possible connect to DB'; // error en la consulta (no se ha podido conectar con la bd).
            } else { // si la ejecución de la query no da error
                if ($result->num_rows == 0) { // miramos si el resultado de la consulta es vacio (no existe el login)
//construimos la sentencia sql de inserción en la bd
                    $sql = "INSERT INTO `SOCIO` (`login_socio`,`pass_socio`,`dni_socio`,`nombre_socio`,`apellidos_socio`,
					`email_socio`,`telefono_socio`,`socio_bloqueado`) 
				VALUES ('$this->login_socio','$this->pass_socio','$this->dni_socio','$this->nombre_socio','$this->apellidos_socio',
				'$this->email_socio','$this->telefono_socio','$this->socio_bloqueado')";

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
	    $sql = "SELECT * FROM `SOCIO` WHERE (`login_socio` = '$this->login_socio')";
		
	    $result = $this->mysqli->query($sql); // se ejecuta la query
		
	    if ($result->num_rows == 1) // si el numero de filas es igual a uno es que lo encuentra
	    {	
	        // se construye la sentencia de modificacion en base a los atributos de la clase
						
			$sql = "UPDATE `SOCIO` SET 
			`pass_socio`='$this->pass_socio',
			`dni_socio`='$this->dni_socio',
			`nombre_socio`='$this->nombre_socio',
			`apellidos_socio`='$this->apellidos_socio',
			`email_socio`='$this->email_socio',
			`telefono_socio`='$this->telefono_socio',
			`socio_bloqueado`='$this->socio_bloqueado'
			WHERE (`login_socio` = '$this->login_socio')";
			
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
        $sql = "SELECT * FROM `SOCIO` WHERE (`login_socio` = '$this->login_socio' OR `dni_socio` LIKE '$this->dni_socio' 
		OR `nombre_socio` LIKE '$this->nombre_socio' OR `apellidos_socio` LIKE '$this->apellidos_socio' 
		OR `email_socio` LIKE '$this->email_socio' OR `telefono_socio` LIKE '$this->telefono_socio' 
		OR `socio_bloqueado` LIKE '$this->socio_bloqueado' )";

        if (!($resultado = $this->mysqli->query($sql))) {//Si la busqueda no da resultados, se devuelve el mensaje de que no existe
            return 'It does not exist in DB';
        } else { // si existe
            $result = $resultado;//guarda el valor deresultado en result
            return $result; //devuelve result
        }
    }

    function AllData()
    {

        $sql; //variable que alberga la sentencia sql
        $resultado; //almacena la consulta sql
        $result; //variable que albergara el valor de resultado

        // construimos el sql para buscar esa clave en la tabla
        $sql = "SELECT * FROM `SOCIO`";

        if (!($resultado = $this->mysqli->query($sql))) {//Si la busqueda no da resultados, se devuelve el mensaje de que no existe
            return 'It does not exist in DB';
        } else { // si existe
            $result = $resultado;//guarda el valor deresultado en result
            return $result; //devuelve result
        }
    }
	
			    function MASACTIVOS()
    {

        $sql; //variable que alberga la sentencia sql
        $resultado; //almacena la consulta sql
        $result; //variable que albergara el valor de resultado

        // construimos el sql para buscar esa clave en la tabla
				$sql = "SELECT *
				FROM `SOCIO`
				ORDER BY 'login_socio'";

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
        $sql = "SELECT * FROM `SOCIO` WHERE (`login_socio` = '$this->login_socio')";     
        $result = $this->mysqli->query($sql);

        if ($result->num_rows == 1) // si existe una tupla con ese valor de clave
        {
            // se construye la sentencia sql de borrado
            $sql = "DELETE FROM `SOCIO` WHERE (`login_socio` = '$this->login_socio')";

            $this->mysqli->query($sql);
            
            return "Correctly delete";// se devuelve el mensaje de borrado correcto
        } else // si no existe el login a borrar se devuelve el mensaje de que no existe
            return "It does not exist";
    }


}
?>