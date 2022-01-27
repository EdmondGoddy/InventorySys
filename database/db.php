<?php

/**
 * 
 */
class Database
{
	private $con;

	public function connect(){
		include_once("constants.php");
		$this->con = new mysqli(HOST, USER, PASS, DB);

		if ($this->con) {
			# code...
			return $this->con;
		}
		return "DATABASE_CONNECTION_FAIL";
		
	}
}

//$db = new Database();
//$db->connect();


?>