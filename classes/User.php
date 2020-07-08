<?php
class User {
	private $_db,
		$_data,
		$_sessionName,
		$_cookieName,
		$_isLoggedIn;

	public function __construct($user = null) {
		$this->_db	=	DB::getInstance();
	}

	public function create($fields = array()) {
		if(!$this->_db->insert('users', $fields)) {
			throw new Exception('Ndodhi nje problem gjate krijimit te llogarise tuaj!')
		}
	}


}