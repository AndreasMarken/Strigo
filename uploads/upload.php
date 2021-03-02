<!-- Dokument som håndterer alt med filopplastingen til
profilbilde på min_profil.php-->

<?php
session_start();
require_once '../shortcuts_php/kobling.php';
$id = $_SESSION['brukerID'];

if (isset($_POST['submit'])) {
  $file = $_FILES['profilbilde']; /*Setter opp array $file*/

  $fileName = $file['name'];
  $fileTmpName = $file['tmp_name'];
  $fileSize = $file['size'];
  $fileError = $file['error'];
  $fileType = $file['type'];

  $fileExt = explode('.' , $fileName); /*Lager et array med filnavn og extention ved å splitte stringen $fileName ved punktum*/
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'png', 'jpeg');

/*Sjekker om filen er godkjent*/
  if (in_array($fileActualExt, $allowed)) {
    if($fileError === 0){
      if($fileSize < 1000000){
        $fileNameNew = "profile".$id.".".$fileActualExt;
        $fileDestination = 'uploads/'.$fileNameNew;
        move_uploaded_file($fileTmpName, $fileDestination);
        $sql = "UPDATE profileimg SET status=1 WHERE userid = '$id';";
        $result = mysqli_query($kobling, $sql);
        header("Location: ../PHP/min_profil.php?uploadsuccess");
        echo "Your file has been uploaded";

      } else{
        echo "This file is to big";
      }
    } else{
      echo "There was an error";
    }
  } else{
    echo "You cannot upload this file-format";
  }
}
 ?>
