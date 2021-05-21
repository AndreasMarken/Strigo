<?php
require_once '../shortcuts_php/logincheck.php';
require_once '../shortcuts_php/kobling.php';

$id = $_GET["ID"];

$sql_1 = "SELECT * FROM classroom WHERE idClassroom = $id;";
$resultat_1 = $kobling->query($sql_1);

if (!$resultat_1) {
  die("Noe gikk galt med spørringen: " . $kobling->error);
}

while ($rad_1 = $resultat_1->fetch_assoc()) {
  $classroomName = $rad_1[className];
  $classroomSubjectId = $rad_1[subjectId];
}

$sql_2 = "SELECT * FROM chapter WHERE subjectId = $classroomSubjectId;";
$resultat_2 = $kobling->query($sql_2);

if (!$resultat_2) {
  die("Noe gikk galt med spørringen: " . $kobling->error);
}

while ($rad_2 = $resultat_2->fetch_assoc()) {
  $chapterName = $rad_2[Name];
}
 ?>
 <!doctype html>
 <html lang="nb">
   <head>
     <title>Strigo</title>

     <meta charset="UTF-8">
     <link rel="stylesheet" href="../CSS/hovedside_innlogget.css">

   </head>
   <?php  if (isset($_SESSION["TeacherID"])) { ?>

 <?php require_once '../shortcuts_php/header.php';

   require_once '../shortcuts_php/togglemenu.php';
   ?>

<div class=oversiktsmeny>

 <?php

  echo "";
  echo "<div class='minprofil'>";
  echo "<a href='min_profil.php'>";

   /*Profilbilde*/

     $iD = $_SESSION["TeacherID"];

     $sql1 = "SELECT * FROM teacher_profilepicture WHERE teacher_id = '$iD';";
     $result = $kobling->query($sql1);

     if (!$result) {
       die("Noe gikk galt med spørringen: " . $kobling->error);
     }

     while ($rad = $result->fetch_assoc()) {
       $status = $rad['status'];
 }

   if($status == 1){
     // echo "<img src='../uploads/profile".$id.".".$_SESSION["fileExt"]."' width='60px'>";
     echo "<img src='../uploads/profile".$id.".jpg' width='60px'>";
   } else{
     echo "<img src='../img/profile.png' width='60px'>";
   }

   "</a>";
/*Profilbilde slutt*/

   $sql = "SELECT * FROM teacher WHERE idTeacher = $iD";
   $resultat = $kobling->query($sql);

 if (!$resultat) {
   die("Noe gikk galt med spørringen: " . $kobling->error);

 }
 while ($rad = $resultat->fetch_assoc()) {
 echo " <a href='min_profil.php'><h3>$rad[name]</h3></a>";
}
  echo "</div>";

  echo "<div class='fullførtkapitler'>";
  echo "<img src='../img/bøker.png' width='40px'>";

  echo "<h2>$classroomName</h2>";

  echo "</div>";

  echo "</div>";

require_once '../shortcuts_php/footer.php';

}

else {
header("location:index.php");
exit();
}?>

   </body>

 </html>
