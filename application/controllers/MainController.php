<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller {

	public function init() {
		$this->view->layout = SKIN;		
	}

	public function homeAction() { 
		
		$viewParams = [];		
		$this->view->render("Start Page", $viewParams);

	}


	public function contactsAction() {

		echo '<b style="color:green">MainCountroller.contacts: Ok!<b><br/>';
		$this->view->render("Contacts Page");

	}

}