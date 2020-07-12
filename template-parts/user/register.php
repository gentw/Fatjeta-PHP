<?php 
		if(Token::check(Input::get('token'))) {
			$validate = new Validate();




			$validation = $validate->check($_POST, array(
				'username'	=> array(
					'fieldName'	=> 'Perdoruesi',
					'required' 	=> true,
					'min'		=> 2,
					'max'		=> 20,
					'unique'	=> 'users'
				),
				'password'	=> array(
					'fieldName'	=> 'Fjalekalimi',
					'required' 	=> true,
					'min'		=> 6
				),
				
				'first_name'	=> array(
					'fieldName'	=> 'Emri',
					'required' 	=> true,
					'min'		=> 2,
					'max'		=> 50
				),

				'last_name'	=> array(
					'fieldName'	=> 'Mbiemri',
					'required' 	=> true,
					'min'		=> 2,
					'max'		=> 50
				),

				'role'	=> array(
					'fieldName'	=> 'Roli',
					'required' 	=> true,
				),


			));



			if($validation->passed()) {

				$user = new User();
				$salt = Hash::salt(32);




				try{

					if(Input::get('role') == 'admin') {
						$role = 1;
					} else {
						$role = 2;
					}

					$user->create(array(
						'username'	=> Input::get('username'),
						'password'	=> Hash::make(Input::get('password')),
						'first_name' => Input::get('first_name'),
						'last_name'	=> Input::get('last_name'),
						'role'		=> $role,
						'salt'		=> '#Un3j4mF4tj3t4#1232#50ftw4r3d3v3l0p3r#'

					));

					Redirect::to('?page=kyqu');
				} catch(Exeption $e) {
					die($e->getMessage());
				}

			} else {

				foreach ($validation->errors() as $error) {
					echo $error, '<br>';
				}
			}


		}



?>

<div class="login">
    <h2 class="text-center">Admin Panel - Register</h2>
   
    <form action="" method="post">
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Emri perdoruesit">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Fjalekalimi">
        </div>
        <div class="form-group">
            <input type="text" name="first_name" class="form-control" placeholder="Emri">
        </div>
        <div class="form-group">
            <input type="text" name="last_name" class="form-control" placeholder="Mbiemri">
        </div>
        <div class="form-group">
            <select name="role" class="form-control">
                <option>Specifiko rolin</option>
                <option value="standard_user">User i thjeshte</option>
                <option value="admin">Admin</option>
            </select>
        </div>
         <input type="hidden" name="token" value="<?php echo Token::generate(); ?>"/>

        <div class="form-group">
            <input type="submit" name="register" class="form-control" value="Regjistrohu">
        </div>


    </form>
    <a href="?page=kyqu">Kyqu ne llogarine ekzistuese.</a>
</div>

