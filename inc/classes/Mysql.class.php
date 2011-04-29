<?php
#Config constantes
if(!defined("CARD_DESTACADO"))  define( "CARD_DESTACADO"  , 1 );
if(!defined("FETCH_OBJECT"))  	define( "FETCH_OBJECT"    , 1 );
if(!defined("FETCH_ARRAY"))     define( "FETCH_ARRAY"     , 2 );
if(!defined("FETCH_BOTH"))  		define( "FETCH_BOTH"      , 3 );
if(!defined("FETCH_FIELD"))   	define( "FETCH_FIELD"     , 4 );
if(!defined("FETCH_ROW"))       define( "FETCH_ROW"       , 5 );
if(!defined("FETCH_NUM"))     	define( "FETCH_NUM"       , 6 );

/**
 * 
 * Driver para manejo de consultas a la base de datos con el motor
 * mysql nativo de php
 *
 * @author     Matias Crivolotti
 * @version    1.0
 */
final class Mysql{
	/**
	 * Atributo con la conexion a la base de datos
	 * @var resource MySql link resource
	 */
	protected $connection = null;
	
	/**
	 * Construye el objeto y establece la conexion a la base de datos
	 *
	 * @param string	$host				Url del servicio o path del socket mysql
	 * @param string	$user				Usuario de acceso
	 * @param string	$passwd				Clave de acceso
	 * @param int		$port optional		Puerto de conexion al servicio. Default 3306
	 * @param string	$dbname optional	Nombre de la base de datos
	 * @param array		$options optional	Array de opciones de configuración inicial.
	 *
	 * @return boolean TRUE si se conectó correctamente
	 */
	public function __construct($host=null, $user=null, $passwd=null, $dbname=null, $port=null, $persistent=false){
		if ($persistent) {
			$this->connection = mysql_pconnect($host.($port ? ":".$port : ""), $user, $passwd);
		} else {
			$this->connection = mysql_connect($host, $user,$passwd);
		}
		if($this->connection && mysql_select_db($dbname, $this->connection)){
			return true;
		}
		return false;
	}

	/**
	 * Ejecuta un query
	 *
	 * @param string $query Mysql Query
	 * @return MySqli_Result|false Objeto o false en caso de error
	 */
	public function query($query=null){
		return mysql_query($query, $this->connection);
	}
	
	/**
	 * Retorna segun el formato especificado, el resultado de un query de forma iterable
	 *
	 * @param string $query Mysql Query
	 * @param int $fetch optional Constante de la clase DB que indica la forma de retornar los valores. Default DB::FETCH_OBJECT
	 * @param int $offset optional
	 *
	 * @return mixed Segun el tipo de retorno en $fetch varía el resultado.
	 *
	 * @throws DBExeption para errores de querys
	 */
	public function fetch($resource=null, $fetch=false, $offset=0){
		if($resource && !is_resource($resource) && is_string($resource)){
      $resource = $this->query($resource);
		}

		#Si es un query ejecutable siempre retornan true
		if($resource === FALSE && $this->errno()){
			throw new Exception(__METHOD__. "[".$this->errno()."] ".$this->error());
		}

		if(!empty($fetch)) switch($fetch){
			case FETCH_OBJECT	:	return mysql_fetch_object($resource);             break;
			case FETCH_ARRAY	:	return mysql_fetch_array($resource, MYSQL_ASSOC); break;
			case FETCH_BOTH		:	return mysql_fetch_array($resource, MYSQL_BOTH);  break;
			case FETCH_NUM		:	return mysql_fetch_array($resource, MYSQL_NUM);   break;
			case FETCH_FIELD	:	return mysql_fetch_field($resource, $offset);     break;
			case FETCH_ROW		:	return mysql_fetch_row($resource);                break;
		}
		return $resource;
	}

	/**
	 * Retorna el id de la ultima inserción siempre que no sea una tabla con
	 * un PK de más de un campo.
	 *
	 * @return int id de ultima inserción
	 */
	public function insert_id(){
		return mysql_insert_id($this->connection);
	}

	/**
	 * Retorna la cantidad de filas afectadas por el último query
	 *
	 * @return int Numero de filas afectadas
	 */
	public function affected_rows(){
		return mysql_affected_rows($this->connection);
	}

  /**
	 * Retorna la cantidad de filas en el resultado
	 *
	 * @return int Numero de filas
	 */
	public function num_rows($resource){
		return mysql_num_rows($resource);
	}

	/**
	 * Inicia una transaccion
	 *
	 * @return boolean FALSE en caso de error
	 */
	public function begin(){
		return $this->query("BEGIN");
	}

	/**
	 * Commitea el resultado de los querys ejecutados
	 *
	 * @return boolean FALSE en caso de error
	 */
	public function commit(){
		return $this->query("COMMIT");
	}

	/**
	 * Vuelve las modificaciones realizadas por una transaccion a sus valores
	 * originales.
	 *
	 * @return boolean FALSE en caso de error
	 */
	public function rollback(){
		return $this->query("ROLLBACK");
	}

	/**
	 * Obtiene el ultimo código de error de la ejecución de un query
	 *
	 * @return int Código de error de la consulta
	 */
	public function errno(){
		return mysql_errno($this->connection);
	}

	/**
	 * Obtiene la información relacionada al error de ejecucion de un query
	 *
	 * @return string Error de la consulta
	 */
	public function error(){
		return mysql_error($this->connection);
	}

	/**
	 * Cierra la conexión a la base de datos
	 *
	 * @return boolean FALSE en caso de error
	 */
	public function close(){
		return mysql_close($this->connection);
	}

	/**
	 * Escapea un string utilizando la conexion actual
	 *
	 * @return string Texto escapeado o FALSE en caso de error
	 */
	public function escape($string=""){
    return mysql_real_escape_string($string, $this->connection);
	}
    
	/**
	 * Devuelve el numero de registros encontrados
	 *
	 * @return string numero de registros
	 */
    public function getFoundRows(){
		return $this->fetch("SELECT FOUND_ROWS() AS foundRows", self::FETCH_ARRAY);
	}
}
?>
