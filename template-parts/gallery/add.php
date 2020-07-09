<?php

if(Token::check(Input::get('token'))) {
	$validate = new Validate();

	$validation = $validate->check($_POST, array(
		'title' => array(
			'fieldName' => 'Emri fotos',
			'required' => true
		),

		'image' => array(
			'fieldName' => 'Foto',
			'required' => true,

		),
		
		'description' => array(
			'fieldName' => 'Pershkrimi',
			'required' => true,

		)
	));


	if($validation->passed()) {
		$galeria = new Gallery();

		try {
			$galeria->create(array(
				'title' 		=> Input::get('title'),
				'image' 		=> Input::get('image'),
				'description' 	=> Input::get('description'),
				'user_id'		=> 3
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
        <input type="text" name="title" class="form-control" placeholder="Emri fotos">
    </div>

    <div class="form-group">
        <label>Foto</label>
        <div><input type="file" name="image"></div>
    </div>

    <div class="form-group">
        <label>Pershkrimi</label>
        <textarea name="description" class="form-control"></textarea>
    </div>

    <div class="form-group">
    	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>"/>
        <input type="submit" name="submit" class="btn btn-primary" value="Upload">
    </div>

</form>
</div>
</div>