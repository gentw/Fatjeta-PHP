<?php
class User {
	private $_db,
		$_data,
		$_sessionName,
		$_cookieName,
		$_isLoggedIn;

	public function __construct($user = null) {
		$this->_db	=	Database::getInstance();

		$this->_sessionName = Config::get('session/sessionName');
		$this->_cookieName 	= Config::get('remember/cookieName');


		if(!$user) {
			if(Session::exists($this->_sessionName)) {
				$user = Session::get($this->_sessionName);

				if ($this->find($user)) {
					$this->_isLoggedIn = true;
				} else {
					self::logout();
				}
			}
		} else {
			$this->find($user);
		}
	}

	public function create($fields = array()) {

		if(!$this->_db->insert('users', $fields)) {
			throw new Exception('Ndodhi nje problem gjate krijimit te llogarise tuaj!');
		}
		
	}

	public function find($user = null) {
		if($user) {
			$fields = (is_numeric($user)) ? 'id' : 'username';
			$data = $this->_db->get('users', array($fields, '=', $user));

			if ($data->count()) {
				$this->_data = $data->first();
				return true;
			}
		}
		return false;
	}

	public function data() {
		return $this->_data;
	}

	public function exists() {
		return (!empty($this->_data)) ? true : false;
	}

	public function isLoggedIn() {
		return $this->_isLoggedIn;
	}

	public function logout() {
		Session::delete($this->_sessionName);
		//Cookie::delete($this->_cookieName);
	}

	public function isAdmin($role) {
		if($role == 1){
			return true;
		} 

		return false;		
	}


	public function logIn($username = null, $password = null) {
		if (!$username && !$password && $this->exists()) {
			Session::put($this->_sessionName, $this->data()->id);
		} else {
			$user = $this->find($username);
			if($user) {
				if($this->data()->password === Hash::make($password)) {
					Session::put($this->_sessionName, $this->data()->id);

					return true;
				}
			}			
		}

		return false;
	}	


}