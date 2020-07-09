<?php
	
	require_once 'core/init.php';

	$user = new User();

	if ($user->isLoggedIn()) {

		if($user->isAdmin($user->data()->role)) {
			

		require_once 'template-parts/header.php';
		

		?>

		<div class="container">

			<h2>Hello <?php print_r($user->data()->first_name);?></h2>

		</div>

		<?php
		require_once 'template-parts/footer.php';
		}
		else {
			echo "Na falni, por ju jeni i regjistruar si perdorues i thjeshte, nuk mund te merrni qasje ne panel.";
		}
	} else {
		Redirect::to('/');
	}

