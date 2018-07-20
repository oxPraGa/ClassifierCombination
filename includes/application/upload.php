<?php
session_start();
// file existe 

if(array_key_exists ( "fileToUpload" , $_FILES )){
if(!array_key_exists ( "tmp_name" , $_FILES["fileToUpload"] )){
	  die('selectionner une image');
  }else
	  if(empty ($_FILES["fileToUpload"]["tmp_name"]))
		  die('selectionner une image');
}
else{
	  die('selectionner une image');
  }
$target_dir = "../../uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
  
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check == false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }
	//cree un repoertoire s il nexiste pas 
	if (!is_dir($target_dir)){
	
		if (!mkdir($target_dir, 0700)) {
			die('Echec lors de la création des répertoires...');
			}
	}


// Check if file already exists
if (file_exists($target_file)) {
    //echo "Sorry, file already exists.";
    //$uploadOk = 0;
	unlink($target_file);
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "bmp" && $imageFileType != "png"  && $imageFileType != "jpg" && $imageFileType != "jpeg") {
    echo "Sorry, only BMP PNG JPG ou JPEG files are allowed.";
    $uploadOk = 0;
}
// verifier le repertoire 


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Le fichier ". basename( $_FILES["fileToUpload"]["name"]). " est uploadé.";
		$_SESSION['url'] = $target_file;
		
		//header('Location: endupload.php');
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
