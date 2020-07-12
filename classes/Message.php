<?php

class Message {
	private $_db, 
		$_data = array();

	public function __construct($user = null) {
		$this->_db = Database::getInstance();

	}


	// public function create($fields = array()) {

	// 	if(!$this->_db->insert('gallery', $fields)) {
	// 		throw new Exception('Ndodhi nje problem gjate krijimit te llogarise tuaj!');
	// 	}
		
	// }

	public function create($fields = array()) {

		if(!$this->_db->insert('messages', $fields)) {
			throw new Exception('Ndodhi nje problem gjate krijimit te llogarise tuaj!');
		}
		
	}


	public function fetchMessages() {		
			
			$data = $this->_db->get('messages', []);
			// var_dump($data);
			if ($data->count()) {
				$this->_data = $data->_results;
			}


		
		return null;
	}

	public function data() {
		return $this->_data;
	}




}