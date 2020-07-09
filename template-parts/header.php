<!DOCTYPE html>
<html>
<head>
	<title>Sistemi</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
<?php
$user = new User();

	if ($user->isLoggedIn()) {
		require_once 'template-parts/navbar.php';
	}
?>

<div class="container">
