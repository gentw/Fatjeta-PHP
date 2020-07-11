<?php
class Database {
	private static $_instance = null;
	private $_pdo, $_query;
	public $_error=false, $_results, $_count = 0;

	private function __construct() {
		try {
			$this->_pdo = new PDO('mysql:host='.Config::get('mysql/host').';dbname='.Config::get('mysql/db'),Config::get('mysql/username'),Config::get('mysql/password'));
		} catch (PDOException $e) {
			die($e->getMessage());
		}	
	}

	public static function getInstance() {
		if (!isset(self::$_instance)) {
			self::$_instance = new Database();
		}
		return self::$_instance;
	}

	public function query($sql, $params = array()) {
	

		$this->_error = false;
		if ($this->_query = $this->_pdo->prepare($sql)) {
			$x = 1;
			if (count($params)) {
				foreach ($params as $param) {
					$this->_query->bindValue($x, $param);
					$x++;
				}
			}

			if ($this->_query->execute()) {
				$this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
				$this->_count	= $this->_query->rowCount();
			} else {
				$this->_error = true;
			}
		}

		return $this;
	}
/*SELECT *
    FROM users u 
    INNER JOIN gallery g ON g.user_id = u.id
    SELECT g.*, u.* FROM users u INNER JOIN gallery g ON g.user_id = u.id */
	public function action($action, $table, $where = array(), $rel = array()) {

		if(!empty($where)) {

			if (count($where) === 3) {	//Allow for no where
				$operators = array('=','>','<','>=','<=','<>');

				$field		= $where[0];
				$operator	= $where[1];
				$value		= $where[2];

				if (in_array($operator, $operators)) {
					$sql = "{$action} FROM {$table} WHERE ${field} {$operator} ?";
					if (!$this->query($sql, array($value))->error()) {
						return $this;
					}
				}
			}
		} else if (!empty($rel)) { // array(parent, child)
			if(count($rel) === 3)
				$parent = $rel[0]; // user
				$child = $rel[1]; // gallery
				$needed_attr_of_parent = $rel[2]; 

				$parent_alias = substr($parent, 0, 1);
				$child_alias = substr($child, 0, 1);

				// if parent is written in plural remove the s at the end.
				$parent_attribute = (substr($parent, -1) === 's') ? rtrim($parent, 's') : $parent;

			$sql = "SELECT {$child_alias}.*, {$parent_alias}.{$needed_attr_of_parent} FROM {$parent} {$parent_alias} INNER JOIN {$child} {$child_alias} ON {$child_alias}.user_id = {$parent_alias}.id";

			
			if (!$this->query($sql)->error()) {
				return $this;
			}
		} else {
			$sql = "{$action} FROM {$table}";
			if (!$this->query($sql)->error()) {
				return $this;
			}
		}
		return false;
	}

	public function get($table, $where = array(), $rel = array()) {
		return $this->action('SELECT *', $table, $where, $rel); //ToDo: Allow for specific SELECT (SELECT username)
	}

	public function delete($table, $where) {
		return $this->action('DELETE', $table, $where);
	}

	public function insert($table, $fields = array()) {

		if (count($fields)) {
			$keys 	= array_keys($fields);
			$values = null;
			$x 		= 1;

			foreach ($fields as $field) {
				$values .= '?';
				if ($x<count($fields)) {
					$values .= ', ';
				}
				$x++;
			}

			$sql = "INSERT INTO {$table} (`".implode('`,`', $keys)."`) VALUES({$values})";



			if (!$this->query($sql, $fields)->error()) {
				return true;
			}
		}
		return false;
	}

	public function update($table, $id, $fields = array()) {
		$set 	= '';
		$x		= 1;

		foreach ($fields as $name => $value) {
			$set .= "{$name} = ?";
			if ($x<count($fields)) {
				$set .= ', ';
			}
			$x++;
		}

		$sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";
		
		if (!$this->query($sql, $fields)->error()) {
			return true;
		}
		return false;
	}

	public function results() {
		return $this->_results;
	}

	public function first() {
		return $this->_results[0];
	}

	public function error() {
		return $this->_error;
	}

	public function count() {
		return $this->_count;
	}

}