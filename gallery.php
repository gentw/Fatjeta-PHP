
<?php
	
	require_once 'core/init.php';

	$user = new User();

	if ($user->isLoggedIn()) {

		if(isset($_GET['action'])) {
	    $action = $_GET['action'];
	} else {
	    $action = "";
	}
			

		require_once 'template-parts/header.php';
		

		?>


		<div class="container">
	        <h1 style="margin-top: 10px;">Gallery</h1>
	        <ul><li><a href="gallery.php">View all photos</a></li><li><a href="?action=add">Upload new photo</a></li></ul>
	        <?php
	            switch($action){
	                case "add":
	                	require_once 'template-parts/gallery/add.php';
	                    break;
	                case "edit":
	                	require_once 'template-parts/gallery/edit.php';
	                    break;
	                default:
	                    require_once 'template-parts/gallery/view-all.php';
	                    break;
	            }
	        ?>
	    </div>


		<?php
		require_once 'template-parts/footer.php';
		

	} else {
		Redirect::to('/');
	}

?>

