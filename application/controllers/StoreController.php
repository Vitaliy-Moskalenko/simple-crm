<?php

namespace application\controllers;

use application\core\Controller;
use application\models\Products;

class StoreController extends Controller {

	public function init() {
		$this->view->layout = SKIN;
	}

	public function indexAction() {  
	
		$viewParams = [];
		$productsModel = $this->loadModel('Products');

		if(isset($_GET['err']))
			$viewParams['error'] = $_GET['err'];
		
		$viewParams['products'] = $productsModel->getAll();  
	
		$this->view->render("Store", $viewParams);

	}

	public function createAction() { 

		$viewParams = []; 
		$productsModel = $this->loadModel('Products');	

		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			
			$price = (double)round($_POST['p-price'], 2);  
			$qty   = (int)$_POST['p-quantity'];   
			
			$result = $productsModel->createProduct(
										$_POST['p-name'],    // Name
										$_POST['p-nomen'],   // Nomenclature					
										$price,              // Price
										$qty,	             // Quantity
										$_POST['p-description']);
							
			if($result != 'ok') {
				$errStr = 'Не удалось сохранить товар. Возможно введены некорректные значения.<br/>';
				if(DEBUG) 
					$errStr .= $result;
					
				$viewParams['error'] = $errStr;
			}
			else 
				$viewParams['msg'] = 'Товар сохранен успешно.';			
		}
	
		$this->view->render("Store", $viewParams);
	}
	
	public function updateAction() {
		
		$viewParams = []; 
		$productsModel = $this->loadModel('Products');		
		
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			
			$price = (double)round($_POST['p-price'], 2);
			$qty   = (int)$_POST['p-quantity'];   
			
			$result = $productsModel->updateProduct(
										$_POST['p-id'],      // Id
										$_POST['p-name'],    // Name
										$_POST['p-nomen'],   // Nomenclature					
										$price,              // Price
										$qty,	             // Quantity
										$_POST['p-description']);
							
			if($result != 'ok') {
				$errStr = 'Не удалось обновить товар. Возможно введены некорректные значения.<br/>';
				if(DEBUG) 
					$errStr .= $result;
					
				$viewParams['error'] = $errStr;
			}
			else 
				$viewParams['msg'] = 'Товар обновленен успешно.';			
		
			$item = $productsModel->getById($_POST['p-id']); 
			
			$viewParams['item'] = $item;
		
		} else {
			
			if(!isset($_GET['item'])) 
				header('Location: '.ABS_URL.'/store');
			
			$item = $productsModel->getById($_GET['item']); 

			if(count($item) == 0)
				header('Location: '.ABS_URL.'/store?err=Неверный параметр');			
			
			$viewParams['item'] = $item;			
			
		}
		
		$this->view->render("Store", $viewParams);		
	}	
	
	public function deleteAction() {
		
		if(!isset($_GET['item'])) 
			header('Location: '.ABS_URL.'/store');
		
		$productsModel = $this->loadModel('Products');
		$result = $productsModel->deleteProduct($_GET['item']);
		
		if($result != 'ok') 
			header('Location: '.ABS_URL.'/store?err='.$result);		
		else 
			header('Location: '.ABS_URL.'/store');
	}
	
	

}