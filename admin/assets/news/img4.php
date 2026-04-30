<?php 
    if(isset($_FILES["4"]["type"])&&($_FILES["4"]["name"]!='')):
    	$width = 770; $height = 530;
		$allowed_ext = array("image/png", "image/jpg", "image/jpeg");
		if(in_array($_FILES["4"]["type"], $allowed_ext))
		  {
		   $new_image = '';
		   $new_name = 'thumbs'.md5(rand()) . '.jpg';
		   echo $new_name;
		   $path = '../../../assets/img/news/' . $new_name;

		    list($width_orig, $height_orig, $source_image_type) = getimagesize($_FILES["4"]["tmp_name"]);

			$ratio_orig = $width_orig/$height_orig;

			if ($width/$height > $ratio_orig) {
			   $width = $height*$ratio_orig;
			} else {
			   $height = $width/$ratio_orig;
			}

			$image_p = imagecreatetruecolor($width, $height);

		  switch ($source_image_type) {
		        case IMAGETYPE_GIF:
		            $source_gd_image = imagecreatefromgif($_FILES["4"]["tmp_name"]);
		            break;
		        case IMAGETYPE_JPEG:
		            $source_gd_image = imagecreatefromjpeg($_FILES["4"]["tmp_name"]);
		            break;
		        case IMAGETYPE_PNG:
		            $source_gd_image = imagecreatefrompng($_FILES["4"]["tmp_name"]);
		            break;
		    }

			imagecopyresampled($image_p, $source_gd_image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

			header ("Content-type: image/jpeg");
			imagejpeg($image_p, $path);
			imagedestroy($image_p);
	  } 
	endif;
	
	
    ?>