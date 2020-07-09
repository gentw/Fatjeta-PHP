<?php

if (Token::check(Input::get('token'))) {
    $validate = new Validate();
    $validation = $validate->check($_POST, array(
        'username'  => array(
            'fieldName' => 'Username',
            'required'  => true
        ),
        'password'  => array(
            'fieldName' => 'Password',
            'required'  => true
        )
    ));

    if ($validation->passed()) {
        $user       = new User();
        $login      = $user->login(Input::get('username'),Input::get('password'));

        if ($login) {
            Redirect::to('dash.php');
        } else {
            echo "Kredencialet gabim!";
        }
    } else {
        foreach ($validation->errors() as $error) {
            echo $error, '<br>';
        }
    }
}

?>

<div class="login">
    <h2 class="text-center">Paneli Adminit :-)</h2>
  
    <form action="" method="post">
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Emri perdoruesit">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Fjalekalimi">
        </div>
        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>"/>
        <div class="form-group">
            <input type="submit" name="login" class="form-control" value="Kyqu n'sistem">
        </div>
    </form>

    <a href="?page=regjistrohu">Nese nuk keni llogari te regjistruar kliko ketu.</a>
</div>