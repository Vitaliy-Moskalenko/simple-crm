<?php

namespace application\controllers;

use application\core\Controller;
use application\models\Customers;

class ClientsController extends Controller { 

	public function init() {
		$this->view->layout = SKIN;
	}

	public function indexAction() {  
	
		$viewParams = [];
		$customersModel = $this->loadModel('Clients');

		if(isset($_GET['err']))
			$viewParams['error'] = $_GET['err'];
		
		$viewParams['customers'] = $customersModel->getAll();    // exit(var_dump($viewParams['customers']));
	
		$this->view->render("Clients", $viewParams);

	}

	public function createAction() {   

		$viewParams = []; 
		$customersModel = $this->loadModel('Clients');	

		if($_SERVER['REQUEST_METHOD'] == 'POST') { 
			
			$result = $customersModel->createCustomer(
										$_POST['c-name'],     // Name
										$_POST['c-email'],    // Email					
										$_POST['c-phone'],    // Phone
										$_POST['c-address'],  // Address
										$_POST['c-company']); // Organisation
							
			if($result != 'ok') {
				$errStr = 'Не удалось сохранить клиента. Возможно введены некорректные значения.<br/>';
				if(DEBUG) 
					$errStr .= $result;
					
				$viewParams['error'] = $errStr;
			}
			else 
				$viewParams['msg'] = 'Клиент сохранен успешно.';			
		}
	
		$this->view->render("Clients", $viewParams);
	}
	
	public function updateAction() {
		
		$viewParams = []; 
		$customersModel = $this->loadModel('Customers');		
		
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			
			$result = $customersModel->updateCustomer(
										$_POST['c-id'],       // Id
										$_POST['c-name'],     // Name
										$_POST['c-email'],    // Email					
										$_POST['c-phone'],    // Phone
										$_POST['c-address'],  // Address
										$_POST['c-company']); // Organisation
							
			if($result != 'ok') {
				$errStr = 'Не удалось обновить данные клиента. Возможно введены некорректные значения.<br/>';
				if(DEBUG) 
					$errStr .= $result;
					
				$viewParams['error'] = $errStr;
			}
			else 
				$viewParams['msg'] = 'Данные клиента обновленен успешно.';			
		
			$item = $customersModel->getById($_POST['c-id']); 
			
			$viewParams['item'] = $item;
		
		} else {
			
			if(!isset($_GET['item'])) 
				header('Location: '.ABS_URL.'/clients');
			
			$item = $customersModel->getById($_GET['item']); 

			if(count($item) == 0)
				header('Location: '.ABS_URL.'/clients?err=Неверный параметр');			
			
			$viewParams['item'] = $item;			
			
		}
		
		$this->view->render("Clients", $viewParams);		
	}	
	
	public function deleteAction() {
		
		if(!isset($_GET['item'])) 
			header('Location: '.ABS_URL.'/clients');
		
		$customersModel = $this->loadModel('Clients');
		$result = $customersModel->deleteCustomer($_GET['item']);
		
		if($result != 'ok') 
			header('Location: '.ABS_URL.'/clients?err='.$result);		
		else 
			header('Location: '.ABS_URL.'/clients');
	}
	
	

}