<!Doctype html>
<html>
<head>
	<title> Dizajni Kontakt Formes</title>

	<link rel="stylesheet" type="text/css" href="../css/styleKontaktForma.css">
	<link rel="stylesheet" type="text/css" href="../css/home.css">

	<script src = "kontaktFormaScript.js"></script>


</head>

<body>

	<div class="header">

		<div class="logo-container">
			<img id="logo" src="../HomePage/img/logo-1.png" alt="Logo" />
		</div>

		<ul id="menu">
			<li>
				<a href="../HomePage/index.php">Home</a>
			</li>
			<li>
				<a href="../about.php">About us</a>
			</li>
			<li>
				<a href="../Galeria/gallery.php">Gallery</a>
			</li>
			<li>
				<a href="#">Contact us</a>
			</li>
		</ul>
	</div>


	<div class = "Titulli-Kontaktit">
		<h1> Ju mirepresim </h1>
		<h2> Jemi gati te ju sherbejme ne gjdo kohe !</h2>
	</div>


	<?php
		include '../../core/init_front.php';			
		$message = new Message();
		
		$message->create(array(
			'name'	=> Input::get('name'),
			'email'	=> Input::get('email'),
			'message' => Input::get('message')
		));
		
		
	?>

	<div class = "Kontakt Forma">
		<form id = "Kontakt Forma" action="" method = "post" onsubmit="return validimiKontaktFormes();">
			
			<input id="name" name = "name" type  = "text" class = "form-control" placeholder = "Shtyp Emrin..."><br>

			<input id="email" name = "email" type  = "email" class = "form-control" placeholder = "Shtyp Email-in..."><br>

			<textarea id = "message" name = "message" class = "form-control" placeholder = "Shtyp Mesazhin..." row = "6"></textarea><br>
			<input type="hidden" name="token" value="<?php echo Token::generate(); ?>"/>
			<input type = "submit" class = "form-control submit" value = "Dergoni Mesazhin">


			<div id="result" style="color: red;"></div>




</body>


</html>