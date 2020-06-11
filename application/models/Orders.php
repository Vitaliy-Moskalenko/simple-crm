<?php

namespace application\models;

use application\core\Model;

class Orders extends Model {
	
	public function getAll() { 
		$sql = "SELECT o_id, o_customerid, o_productid, o_quantity, o_total_price, o_date, o_status, o_note FROM orders";
		return $this->db->getRow($sql);	
	}
	
	public function getById($id) {
		$sql = "SELECT o_id, o_customerid, o_productid, o_quantity, o_total_price, o_date, o_status, o_note FROM orders WHERE o_id = '".$id."'"; 
		return $this->db->getRow($sql);		
	}	
	
	public function getByCustomer($item) {
		$sql = "SELECT o_id, o_customerid, o_productid, o_quantity, o_total_price, o_date, o_status, o_note FROM orders WHERE o_customerid = '".$item."'"; 
		return $this->db->getRow($sql);		
	}
	
	public function getByProduct($item) {
		$sql = "SELECT o_id, o_customerid, o_productid, o_quantity, o_total_price, o_date, o_status, o_note FROM orders WHERE o_productid = '".$item."'"; 
		return $this->db->getRow($sql);		
	}	
	
	public function createOrder($customer, $product, $qty, $total, $date, $status = '', $note = '') {

		$params = [
			'customer' => $customer,
			'product'  => $product,
			'quantity' => $qty,
			'total'    => $total,
			'date'     => $date,
			'status'   => $status,
			'note'     => $note
		];   
		
		$sql = "INSERT INTO orders (o_customerid, o_productid, o_quantity, o_total_price, o_date, o_status, o_note) VALUES
					(:customer, :product, :quantity, :total, :date, :status, :note)";  
		
		$result =  $this->db->query($sql, $params);
		
		return isset($result->errorInfo()[2]) ? $result->errorInfo()[2] : 'ok';		
	}
	
	public function updateOrder($id, $customer, $product, $qty, $total, $date, $status = '', $note = '') {  
	
		$params = [
			'customer' => $customer,
			'product'  => $product,
			'quantity' => $qty,
			'total'    => $total,
			'date'     => $date,
			'status'   => $status,
			'note'     => $note
		];  
		
		$sql = "UPDATE orders SET o_customerid=:customer, o_productid=:product, o_quantity=:quantity,  o_total_price=:total, o_date=:date, o_status=:status, o_note=:note
					WHERE o_id = '".$id."'"; 
		
		$result =  $this->db->query($sql, $params);  
		
		return isset($result->errorInfo()[2]) ? $result->errorInfo()[2] : 'ok';		
	}	
	
	
	public function deleteOrder($id) {
		
		$sql = "DELETE FROM `orders` WHERE `orders`.`o_id` = '".$id."'";
		$result =  $this->db->query($sql);
		
		return isset($result->errorInfo()[2]) ? $result->errorInfo()[2] : 'ok';
	}
	
}