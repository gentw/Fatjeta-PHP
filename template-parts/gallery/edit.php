<?php

if(isset($_GET['id'])) {
	$gallery = new Gallery();
	$gallery->find($_GET['id']);
} else {
	die("Kjo foto nuk ekziston!");
}



if(Token::check(Input::get('token'))) {
	$validate = new Validate();

	

	$validation = $validate->check($_POST, array(
		'title' => array(
			'fieldName' => 'Emri fotos',
			'required' => true
		),
		
		'description' => array(
			'fieldName' => 'Pershkrimi',
			'required' => true,

		)
	));


	if($validation->passed()) {
		$galeria = new Gallery();
		$user_id = $user->data()->id;


		try {
			$image = (Input::file('image')) ? Input::file('image') : $gallery->data()->image;

			$galeria->edit($_GET['id'], array(
				'title' 		=> Input::get('title'),
				'image' 		=> $image,
				'description' 	=> Input::get('description'),
				'user_id'		=> $user_id
			));

			Redirect::to('/gallery.php');
		} catch(Exception $e) {
			die($e->getMessage());
		}


	} else {
		foreach ($validation->errors() as $error) {
			echo $error, '<br>';
		}
	}
}


?>


<div class="container">
<div style="width: 500px">
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label>Emri fotos</label>
        <input type="text" name="title" class="form-control" value="<?php echo $gallery->data()->title; ?>">
    </div>

    <div class="form-group">
        <label>Foto</label><br>
        <img width="200" src="/uploads/<?php echo $gallery->data()->image; ?>">
        <div><input type="file" name="image"></div>
    </div>

    <div class="form-group">
        <label>Pershkrimi</label>
        <textarea name="description" class="form-control"><?php echo $gallery->data()->description; ?></textarea>
    </div>

    <div class="form-group">
    	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>"/>
        <input type="submit" name="submit" class="btn btn-primary" value="Upload">
    </div>

</form>
</div>
</div>