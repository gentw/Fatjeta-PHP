<?php

class Gallery {

	public function __construct($user = null) {
		$this->_db = Database::getInstance();

	}


	public function create($fields = array()) {

		if(!$this->_db->insert('gallery', $fields)) {
			throw new Exception('Ndodhi nje problem gjate krijimit te llogarise tuaj!');
		}
		
	}

	public function uploadImage() {
		
	}
}