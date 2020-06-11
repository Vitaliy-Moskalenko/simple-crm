<?php

namespace application\models;

use application\core\Model;

class Main extends Model {

	public function getNews() {

		return $this->db->getRow('SELECT n_title, n_text FROM w_news');


	}



}