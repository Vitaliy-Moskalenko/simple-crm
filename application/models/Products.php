<?php

namespace application\models;

use application\core\Model;

class Products extends Model {
	
	public function getAll() {
		$sql = "SELECT p_id, p_name, p_nomenclature, p_price, p_quantity, p_description, p_store FROM products";
		return $this->db->getRow($sql);	
	}
	
	public function getById($id) {
		$sql = "SELECT p_id, p_name, p_nomenclature, p_price, p_quantity, p_description, p_store FROM products WHERE p_id = '".$id."'"; 
		return $this->db->getRow($sql);		
	}	
	
	public function getByNomenclature($item) {
		$sql = "SELECT p_id, p_name, p_nomenclature, p_price, p_quantity, p_description, p_store FROM products WHERE p_nomenclature = '".$item."'"; 
		return $this->db->getRow($sql);		
	}
	
	public function createProduct($name, $nomen, $price, $qty, $description = '') {
	
		$params = [
			'name'        => $name,
			'nomen'       => $nomen,
			'price'       => $price,
			'quantity'    => $qty,
			'description' => $description,
			'store'       => 1
		];
		
		$sql = "INSERT INTO products (p_name, p_nomenclature, p_price, p_quantity, p_description, p_store)
			VALUES(:name, :nomen, :price, :quantity, :description, :store)"; 
		
		$result =  $this->db->query($sql, $params);
		
		return isset($result->errorInfo()[2]) ? $result->errorInfo()[2] : 'ok';		
	}
	
	public function updateProduct($id, $name, $nomen, $price, $qty, $description = '') {  
	
		$params = [
			'name'        => $name,
			'nomen'       => $nomen,
			'price'       => $price,
			'quantity'    => $qty,
			'description' => $description,
			'store'       => 1
		];   
		
		$sql = "UPDATE products SET p_name=:name, p_nomenclature=:nomen, p_price=:price, p_quantity=:quantity, p_description=:description, p_store=:store WHERE p_id = '".$id."'"; 
		
		$result =  $this->db->query($sql, $params);  
		
		return isset($result->errorInfo()[2]) ? $result->errorInfo()[2] : 'ok';		
	}	
	
	
	public function deleteProduct($id) {
		
		$sql = "DELETE FROM `products` WHERE `products`.`p_id` = '".$id."'";
		$result =  $this->db->query($sql);
		
		return isset($result->errorInfo()[2]) ? $result->errorInfo()[2] : 'ok';
	}
	
}