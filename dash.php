<?php
	
	require_once 'core/init.php';

	$user = new User();
	$message = new Message();


	//$user_id = $user->data()->id;
							// parenti, child, atributi qe na nevojitet me ju qas.
	$message->fetchMessages();


	if ($user->isLoggedIn()) {		

		require_once 'template-parts/header.php';

		?>

		<div class="container">
			<?php 
			if($user->isAdmin($user->data()->role)) {

				$messageData = (array) $message->data();   


    				
			?>
			<br>
			<h2>Mesazhet e pranuara nga kontakt forma:</h2>
			<table class="table">
			  <thead>
			    <tr>
			      <th scope="rol">Nr</th>
			      <th scope="col">Emri</th>
			      <th scope="col">Email</th>
			      <th scope="col">Mesazhi</th>
			    </tr>
			  </thead>
			  <tbody>
			<?php 
				$i=1;
			  	foreach($messageData as $m) {
			?>
			    <tr>
			      <th scope="row"><?php echo $i++; ?></th>
			      <td><?php echo $m->name ?></td>
			      <td><?php echo $m->email ?></td>
			      <td><?php echo $m->message ?></td>
			    </tr>
			<?php } ?>
			    
			  </tbody>
			</table>
			<?php 
				
			} else {
				echo "<br><h3>Hey, per te menaxhuar permbajtjen navigoni ne menyne e siperme.</h3>";
			} ?>

		</div>

		<?php
		require_once 'template-parts/footer.php';
		
		
	} else {
		Redirect::to('/');
	}

