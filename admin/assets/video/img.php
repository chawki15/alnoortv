<?php 
    if(isset($_FILES["1"]["type"])&&($_FILES["1"]["name"]!='')):
    	$width = 770; $height = 530;
		$name = $_FILES["1"]["name"];
	    $size = $_FILES["1"]["size"];
		$ext = explode(".", $name);
		$allowed_ext = array("png", "jpg", "jpeg", "JPG","PNG","JPEG");
		$jpg = array("jpg", "jpeg", "JPG", "JPEG");
		$png = array("png", "PNG");
		if(in_array($ext[1], $allowed_ext))
		  {
		   $new_image = '';
		   $new_name = 'thumbs'.md5(rand()) . '.jpg';
		   echo $new_name;
		   $path = '../../../assets/img/videos/' . $new_name;

		    list($width_orig, $height_orig) = getimagesize($_FILES["1"]["tmp_name"]);

			$ratio_orig = $width_orig/$height_orig;

			if ($width/$height > $ratio_orig) {
			   $width = $height*$ratio_orig;
			} else {
			   $height = $width/$ratio_orig;
			}

			$image_p = imagecreatetruecolor($width, $height);

		   if(in_array($ext[1], $png))
			{
			   $new_image = imagecreatefrompng($_FILES["1"]["tmp_name"]);
			}
		   if(in_array($ext[1], $jpg))  
			{  
			   $new_image = imagecreatefromjpeg($_FILES["1"]["tmp_name"]);  
			}

			imagecopyresampled($image_p, $new_image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

			header ("Content-type: image/jpeg");
			imagejpeg($image_p, $path);
			imagedestroy($image_p);
	  } 
	endif;
	
	
    ?>