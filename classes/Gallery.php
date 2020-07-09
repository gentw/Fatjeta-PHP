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

	public function fetchGallery() {		
			
			$data = $this->_db->get('gallery', []);

			if ($data->count()) {
				$this->_data = $data->_results;
			}


		
		return null;
	}

	public function data() {
		return $this->_data;
	}

	public function uploadImage() {

	}
}