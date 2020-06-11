<?php

namespace application\core;

use PDO;

class Db {

	private $db;

	function __construct() { 

		$this->db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USR, DB_PWD);

	}

	public function query($sql, $params = []) {  

		$stmt = $this->db->prepare($sql);
		if(!empty($params)) 
			foreach($params as $k => $v)
				$stmt->bindValue(':'.$k, $v);
				
		// return $stmt->execute() ? $stmt : $stmt->errorInfo()[2]; 
		$stmt->execute();     
		return $stmt;
		
	}

	public function getRow($sql, $params = []) {

		$result = $this->query($sql, $params);
		return $result->fetchAll(PDO::FETCH_ASSOC);

	}

	public function getColumn($sql, $params = []) {

		$result = $this->query($sql, $params);
		return $result->fetchColumn();

	}


}