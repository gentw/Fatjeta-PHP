
<?php
	class Input {
		public static function exists($type = 'post') {
			switch ($type) {
				case 'post':
					return (!empty($_POST)) ? true : false;
					break;
				case 'get':
					return (!empty($_GET)) ? true : false;
					break;
				default:
					return false;
					break;
			}
		}

		public static function get($item) {
			if (isset($_POST[$item])) {
				return $_POST[$item];
			} else if (isset($_GET[$item])) {
				return $_GET[$item];
			}
			return '';
		}

		public static function file($item) {
			if(isset($_FILES[$item]['name'])) {
				$uploadDestination = "uploads/";
            	move_uploaded_file($_FILES[$item]['tmp_name'], $uploadDestination . $_FILES[$item]['name']);
				return $_FILES[$item]['name'];
			}

			return null;
		}
	}
?>