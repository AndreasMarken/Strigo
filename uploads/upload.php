<?php

if (isset($_POST['submit'])) {
  $file = $_FILES['file'];

  $fileName = $file['name'];
  $fileTmpName = $file['tmp_name'];
  $fileSize = $file['size'];
  $fileError = $file['error'];
  $fileType = $file['type'];

  $fileExt = explode('.' , $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'png', 'jpeg');

  if (in_array($fileActualExt, $allowed)) {
    if($fileError === 0){
      if($fileSize < 1000000){
        $fileNameNew = uniqid('' , true).".".$fileActualExt;
        $fileDestination = 'uploads/' . $fileNameNew;
        move_uploaded_file($fileTmpName, $fileDestination);
        header("location: min_profil.php?uploadsuccess");
      }else{
        echo "filen din er for stor"
      }

    }else {
      echo "Det var en feil med opplastingen"
    }
  }else{
    echo "Denne filtypen støttes ikke"
  }
}
 ?>
