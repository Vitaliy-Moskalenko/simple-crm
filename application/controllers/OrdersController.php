<?php

namespace application\controllers;

use application\core\Controller;
use application\models\Customers;

class OrdersController extends Controller { 

	public function init() {
		$this->view->layout = SKIN;
	}

	public function indexAction() { 
	
		$viewParams = [];
		$ordersModel = $this->loadModel('Orders');

		if(isset($_GET['err']))
			$viewParams['error'] = $_GET['err'];
		
		$viewParams['orders'] = $ordersModel->getAll();
		
		$this->view->render("Orders", $viewParams);

	}

	public function createAction() {   

		$viewParams = []; 
		$ordersModel    = $this->loadModel('Orders');	
		$customersModel = $this->loadModel('Clients');	
		$productsModel  = $this->loadModel('Products');

		$customers = $customersModel->getAll();	
		$viewParams['customers'] = $customers;
		
		$products = $productsModel->getAll();	
		$viewParams['products'] = $products;		

		if($_SERVER['REQUEST_METHOD'] == 'POST') { 
		
			$customerData = preg_split('/ - /u', $_POST['o-customer']);
			$customer = $customersModel->getByEmail($customerData[1]);  
			
			$productData = preg_split('/ - /u', $_POST['o-product']);    
			$product = $productsModel->getByNomenclature($productData[1]);	
	
			$totalPrice = $_POST['o-quantity'] * $product[0]['p_price'];	
			
			$result = $ordersModel->createOrder($customer[0]['c_id'],
												$product[0]['p_id'],
												$_POST['o-quantity'],
												$totalPrice,												
												$_POST['o-date'],     
												$_POST['o-status'],   
												$_POST['o-note']);    
							
			if($result != 'ok') {
				$errStr = 'Не удалось создать заказ. Возможно введены некорректные значения.<br/>';
				if(DEBUG) 
					$errStr .= $result;
					
				$viewParams['error'] = $errStr;
			}
			else 
				$viewParams['msg'] = 'Заказ создан успешно.';			
		}		
	
		$this->view->render("Orders", $viewParams);
	}
	
	public function updateAction() {
		
		$viewParams = []; 
		$ordersModel = $this->loadModel('Orders');
		$customersModel = $this->loadModel('Clients');	
		$productsModel  = $this->loadModel('Products');		
		
		$customers = $customersModel->getAll();	
		$viewParams['customers'] = $customers;
		
		$products = $productsModel->getAll();	
		$viewParams['products'] = $products;		
		
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			
			$customerData = preg_split('/ - /u', $_POST['o-customer']);
			$customer = $customersModel->getByEmail($customerData[1]);  
			
			$productData = preg_split('/ - /u', $_POST['o-product']);    
			$product = $productsModel->getByNomenclature($productData[1]);	
	
			$totalPrice = $_POST['o-quantity'] * $product[0]['p_price'];
			
			$result = $ordersModel->updateOrder(
												$customer[0]['c_id'],
												$product[0]['p_id'],
												$_POST['o-quantity'],
												$totalPrice,												
												$_POST['o-date'],     
												$_POST['o-status'],   
												$_POST['o-note']); 
							
			if($result != 'ok') {
				$errStr = 'Не удалось обновить данные клиента. Возможно введены некорректные значения.<br/>';
				if(DEBUG) 
					$errStr .= $result;
					
				$viewParams['error'] = $errStr;
			}
			else 
				$viewParams['msg'] = 'Данные клиента обновленен успешно.';			
		
			$item = $ordersModel->getById($_POST['o-id']); 
			
			$viewParams['item'] = $item;
		
		} else {
			
			if(!isset($_GET['item'])) 
				header('Location: '.ABS_URL.'/orders');
			
			$item = $ordersModel->getById($_GET['item']); 

			if(count($item) == 0)
				header('Location: '.ABS_URL.'/orders?err=Неверный параметр');			
			
			$viewParams['item'] = $item;			
			
		}
		
		$this->view->render("Orders", $viewParams);		
	}	
	
	public function deleteAction() {
		
		if(!isset($_GET['item'])) 
			header('Location: '.ABS_URL.'/orders');
		
		$ordersModel = $this->loadModel('Orders');
		$result = $ordersModel->deleteOrder($_GET['item']);
		
		if($result != 'ok') 
			header('Location: '.ABS_URL.'/orders?err='.$result);		
		else 
			header('Location: '.ABS_URL.'/orders');
	}
	
	

}