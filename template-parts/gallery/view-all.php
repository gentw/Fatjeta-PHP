<?php 
	
	$gallery = new Gallery();

	//$user_id = $user->data()->id;
							// parenti, child, atributi qe na nevojitet me ju qas.
	$gallery->fetchGallery(array('users','gallery', 'username'));




	if(isset($_GET['action'])) {
		if($_GET['action'] == "delete") {
			if(isset($_GET['id'])) {
				$gallery->delete($_GET['id']);
				Redirect::to('/gallery.php');
			}
		} else {
			die("Gabim!");
		}
		
	}



?>


<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Author</th>
    </tr>
    </thead>
    <tbody>
    <?php
   	$galleryData = (array) $gallery->data();

   


    foreach($galleryData as $g) {	
    ?>

	<tr>
	</tr>
		<td><img width="200" src="/uploads/<?php echo $g->image ?>" alt="photo"></td>
		<td><?php echo $g->title; ?></td>
		<td>Uploaded by: <?php echo $g->username; ?></td>
		<td><a href="?action=edit&id=<?php echo $g->id; ?>">Ndrysho</a> | <a href="?action=delete&id=<?php echo $g->id; ?>">Fshije</a></td>
	<?php } ?>
	
    </tbody>
</table>