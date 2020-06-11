<?php

namespace application\models;

use application\core\Model;

class Clients extends Model {
	
	public function getAll() { 
		$sql = "SELECT c_id, c_name, c_email, c_phone, c_address, c_company FROM customers";
		return $this->db->getRow($sql);	
	}
	
	public function getById($id) {
		$sql = "SELECT c_id, c_name, c_email, c_phone, c_address, c_company FROM customers WHERE c_id = '".$id."'"; 
		return $this->db->getRow($sql);		
	}	
	
	public function getByEmail($email) {
		$sql = "SELECT c_id, c_name, c_email, c_phone, c_address, c_company FROM customers WHERE c_email = '".$email."'"; 
		return $this->db->getRow($sql);		
	}
	
	public function createCustomer($name, $email, $phone, $address, $company = 'individual') {
	
		$params = [
			'name'        => $name,
			'email'       => $email,
			'phone'       => $phone,
			'address'     => $address,
			'company'     => $company,
		];   
		
		$sql = "INSERT INTO customers (c_name, c_email, c_phone, c_address, c_company) VALUES (:name, :email, :phone, :address, :company)";  
		
		$result =  $this->db->query($sql, $params);
		
		return isset($result->errorInfo()[2]) ? $result->errorInfo()[2] : 'ok';		
	}
	
	public function updateCustomer($id, $name, $email, $phone, $address, $company = 'individual') {  
	
		$params = [
			'name'        => $name,
			'email'       => $email,
			'phone'       => $phone,
			'address'     => $address,
			'company'     => $company,
		];  
		
		$sql = "UPDATE customers SET c_name=:name, c_email=:email, c_phone=:phone, c_address=:address, c_company=:company WHERE c_id = '".$id."'"; 
		
		$result =  $this->db->query($sql, $params);  
		
		return isset($result->errorInfo()[2]) ? $result->errorInfo()[2] : 'ok';		
	}	
	
	
	public function deleteCustomer($id) {
		
		$sql = "DELETE FROM `customers` WHERE `customers`.`c_id` = '".$id."'";
		$result =  $this->db->query($sql);
		
		return isset($result->errorInfo()[2]) ? $result->errorInfo()[2] : 'ok';
	}
	
}