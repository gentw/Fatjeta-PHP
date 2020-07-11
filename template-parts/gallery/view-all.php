<?php 
	
	$gallery = new Gallery();

	//$user_id = $user->data()->id;
							// parenti, child, atributi qe na nevojitet me ju qas.
	$gallery->fetchGallery(array('users','gallery', 'username'));





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
		<td><a href="?action=edit&id=<?php echo $g->id; ?>">Ndrysho | Fshije</td>
	<?php } ?>
	
    </tbody>
</table>