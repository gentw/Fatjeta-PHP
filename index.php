<?php

	require_once 'core/init.php';

	if(isset($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = 'kyqu';
	}

	$user = new User();
	if ($user->isLoggedIn()) {
		Redirect::to('/dash.php');
	} 

	require_once 'template-parts/header.php';

	if($page === 'kyqu') {
		require_once 'template-parts/user/login.php';
	} else if ($page === 'regjistrohu') {
		require_once 'template-parts/user/register.php';
	} else {
		require_once 'template-parts/404.php';
	}

	require_once 'template-parts/footer.php';

