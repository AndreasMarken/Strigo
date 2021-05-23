<!-- Dokument som håndterer alt med filopplastingen til
profilbilde på min_profil.php-->

<?php
session_start();
require_once '../shortcuts_php/kobling.php';
$id = $_SESSION['TeacherID'];

if (isset($_POST['submit'])) {
  $file = $_FILES['profilbilde']; /*Setter opp array $file*/

  $fileName = $file['name'];
  $fileTmpName = $file['tmp_name'];
  $fileSize = $file['size'];
  $fileError = $file['error'];
  $fileType = $file['type'];

  $fileExt = explode('.' , $fileName); /*Lager et array med filnavn og extention ved å splitte stringen $fileName ved punktum*/
  $fileActualExt = strtolower(end($fileExt));

  // $_SESSION["fileExt"] = $fileActualExt;

  $allowed = array('jpg', 'png');

/*Sjekker om filen er godkjent*/
  if (in_array($fileActualExt, $allowed)) {
    if($fileError === 0){
      if($fileSize < 1000000){
        $fileNameNew = "profile".$id.".".$fileActualExt;
        $fileDestination = '../uploads-teacher/'.$fileNameNew;
        move_uploaded_file($fileTmpName, $fileDestination);
        $sql = "UPDATE teacher_profilepicture SET status=1 WHERE teacher_id = '$id';";
        $result = mysqli_query($kobling, $sql);
        header("Location: ../pages/min_profil.php?uploadsuccess");

      } else{
        echo "Denne filen er for stor";
      }
    } else{
      echo "Det oppsto et problem";
    }
  } else{
    echo "Denne filtypen støttes ikke";
  }
}
 ?>
