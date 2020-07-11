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

	public function edit($id, $fields = array()) {

		if(!$this->_db->update('gallery', $id, $fields)) {
			throw new Exception('Ndodhi nje problem gjate ndryshimit te llogarise tuaj!');
		}
		
	}

	public function delete($id) {

		if(!$this->_db->delete('gallery', array('id', '=', $id))) {
			throw new Exception('Ndodhi nje problem gjate fshirjes te llogarise tuaj!');
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

	public function find($id = null) {
		if($id) {
			$field = 'id';
			$data = $this->_db->get('gallery', array($field, '=', $id));

			if ($data->count()) {
				$this->_data = $data->first();
				//print_r($this->_data);
				return true;
			} else {
				die("Nuk u gjet!");
			}
		}
		return false;
	}



}