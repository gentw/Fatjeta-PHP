<!DOCTYPE html>
<html>
  <head>
    <title>Gallery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../css/galery.css">
    <link rel="stylesheet" href="../css/home.css">
  </head>
  <body>
    <div id="wrapper">
      <div class="header">

          <div class="logo-container">
              <img id="logo" src="../HomePage/img/logo-1.png" alt="Logo" />
          </div>

          <ul id="menu">
              <li>
                  <a href="../HomePage/index.html">Home</a>
              </li>
              <li>
                  <a href="../about.html">About us</a>
              </li>
              <li>
                  <a href="#">Gallery</a>
              </li>
              <li>
                  <a href="../KontaktForma/Kontakt Forma.html">Contact us</a>
              </li>
          </ul>
      </div>
    
    <div class="slidershow middle">
  
		<?php 
			include '../../core/init_front.php';			
			$gallery = new Gallery();
			
			$gallery->fetchGallery();
			
			$galleryData = (array) $gallery->data();
			
		?>
		
		
  
        <div class="slides">
          <?php $galleryCount = count($galleryData);
			for($i=1; $i <= $galleryCount; $i++) {
		  ?>
		  <input type="radio" name="r" id="r<?php echo $i; ?>"<?php echo ($i == 1) ? ' checked' : ''; ?>>
			<?php } ?>
		  <?php
			$i=0;
			foreach($galleryData as $g):
			$i++;
		  ?>
          <div class="slide<?php echo ($i == 1) ? ' s1' : ''; ?>" style="background-image: url(../../uploads/<?php echo $g->image; ?>);">
            <!-- <img src="img/slide1.jpg" alt="slide1"> -->
          </div>
		  <?php endforeach; ?>
        
        </div>
    

      <div class="navigation">
		<?php $galleryCount = count($galleryData);
			for($i=1; $i <= $galleryCount; $i++) {
		  ?>
		  <label for="r<?php echo $i; ?>" class="bar"></label>
			<?php } ?>
		
        
      </div>
    </div>

  </div>


  </body>
</html>
