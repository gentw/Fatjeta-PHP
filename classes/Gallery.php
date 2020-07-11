<?php

class Gallery {
	private $_db, 
		$_data = array();

	public function __construct($user = null) {
		$this->_db = Database::getInstance();

	}


	public function create($fields = array()) {

		if(!$this->_db->insert('gallery', $fields)) {
			throw new Exception('Ndodhi nje problem gjate krijimit te llogarise tuaj!');
		}
		
	}

	public function fetchGallery($rel = array()) {		
			
			$data = $this->_db->get('gallery', [], $rel);
			// var_dump($data);
			if ($data->count()) {
				$this->_data = $data->_results;
			}


		
		return null;
	}

	public function data() {
		return $this->_data;
	}

	public function find($user = null) {
		if($user) {
			
			$data = $this->_db->get('users', array($fields, '=', $user));

			if ($data->count()) {
				$this->_data = $data->first();
				return true;
			}
		}
		return false;
	}
}