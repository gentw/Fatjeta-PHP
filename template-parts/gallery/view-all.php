<?php 
	
	$gallery = new Gallery();

	$gallery->fetchGallery();



?>


<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Operations</th>
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
		<td><?php echo $g->description; ?></td>
	<?php } ?>
	
    </tbody>
</table>