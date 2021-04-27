<?php  require_once '../shortcuts_php/logincheck.php';
require_once '../shortcuts_php/kobling.php'; ?>
<!doctype html>
<html lang="nb">
  <head>
    <title>Strigo</title>

    <meta charset="UTF-8">
    <link rel = "icon" href ="../img/strigo_logo.png" type = "image/x-icon">
    <link rel="stylesheet" href="../CSS/hovedside_innlogget.css">

  </head>

  <?php  if (isset($_SESSION["TeacherID"])) { ?>

    <?php require_once '../shortcuts_php/header.php';   ?>

    <a href="php_code_for_test.php">Php kode</a> <br>

    <?php

    $teacherID = $_SESSION['TeacherID'];

    $sql_1 = "SELECT * FROM classroom WHERE teacherId = $teacherID";
    $resultat_1 = $kobling->query($sql_1);

    if (!$resultat_1) {
    die("Noe gikk galt med spørringen: " . $kobling->error);
    }

    while ($rad = $resultat_1->fetch_assoc()) {
      $classroomId = $rad[idClassroom];
      $classname = $rad[className];

      $subjectId = $rad['subjectId'];

      $sql_2 = "SELECT * FROM subject where idSubject = $subjectId;";
      $resultat_2 = $kobling->query($sql_2);

      if (!$resultat_2) {
      die("Noe gikk galt med spørringen: " . $kobling->error);
      }

      while ($rad_2 = $resultat_2->fetch_assoc()) {
        $subjectName = $rad_2[subjectName];
      }

      echo "<a href=\"classroom.php?ID=$classroomId\">$classname $subjectName</a>";

      echo "<br>";
    }



     ?>

<?php } else {
  header("location:index.php");
  exit();
} ?>

  </body>

</html>
