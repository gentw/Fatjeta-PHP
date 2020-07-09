<?php 
	
	$gallery = new Gallery();

	$gallery->fetchGallery();

	print_r($gallery->data());

?>