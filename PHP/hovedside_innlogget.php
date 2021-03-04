<?php require_once '../shortcuts_php/logincheck.php';
require_once '../shortcuts_php/kobling.php'; ?>
<!doctype html>
<html lang="nb">
  <head>
    <title>Strigo</title>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/hovedside_innlogget.css">

  </head>

    <?php  if (isset($_SESSION["brukerID"])) { ?>

  <?php require_once '../shortcuts_php/header.php';

    require_once '../shortcuts_php/togglemenu.php';
    ?>

<div class=oversiktsmeny>

  <?php

   echo "";
   echo "<div class='minprofil'>";
   echo "<a href='../PHP/min_profil.php'>";

    /*Profilbilde*/

      $id = $_SESSION["brukerID"];

      $sql1 = "SELECT * FROM profilbilde WHERE userID = '$id';";
      $result = $kobling->query($sql1);

      if (!$result) {
        die("Noe gikk galt med spørringen: " . $kobling->error);
      }

      while ($rad = $result->fetch_assoc()) {
        $status = $rad['status'];
  }

    if($status == 1){
      echo "<img src='../uploads/profile".$id.".jpg' width='60px'>";
    } else{
      echo "<img src='../bilder/profile.png' width='60px'>";
    }

    "</a>";
/*Profilbilde slutt*/




    $sql = "SELECT * FROM student WHERE brukerID = $id";
    $resultat = $kobling->query($sql);

	if (!$resultat) {
		die("Noe gikk galt med spørringen: " . $kobling->error);

	}
  while ($rad = $resultat->fetch_assoc()) {
  echo " <a href='../PHP/min_profil.php'><h3>$rad[navn]</h3></a>";
}
   echo "</div>";








   echo "<div class='fullførtkapitler'>";
   echo "<img src='../bilder/bøker.png' width='40px'>";


   $id = $_SESSION["brukerID"];
   $sql = "SELECT COUNT(chapter_id) AS chapters_completed FROM Student_chapter_complete WHERE student_id = $id";
   $resultat = $kobling->query($sql);

   if (!$resultat) {
   die("Noe gikk galt med spørringen: " . $kobling->error);

   }

   while ($rad = $resultat->fetch_assoc()) {
        echo "<h3>Fullførte<br> kapitler: "."$rad[chapters_completed]</h3> ";
   }

   echo "</div>";

   echo "<div class='fullførtoppgaver'>";
   echo "<img src='../bilder/task.png' width='50px'>";
   $id = $_SESSION["brukerID"];
   $sql = "SELECT COUNT(task_id) AS tasks_completed FROM student_task_complete WHERE student_id = $id";
   $resultat = $kobling->query($sql);

   if (!$resultat) {
   die("Noe gikk galt med spørringen: " . $kobling->error);
   }

   while ($rad = $resultat->fetch_assoc()) {
        echo "<h3>Fullførte<br> oppgaver: "."$rad[tasks_completed]</h3> ";
   }

   echo "</div>";

?>
</div>
<?php
  echo "<div class='små_bokser'>";
    echo "<div class='øverste_rad'>";
      echo "<div class='liten_boks_medtekst'>";
        echo "<div class='bildene'>";
          echo "<a href='htmlogcsskurs.php'><img src='../bilder/html.png' width='100px'></a>";
          echo "<a href='htmlogcsskurs.php'><img src='../bilder/css.png' width='100px'></a>";
        echo "</div>";
          echo "<a href='htmlogcsskurs.php'><h4>HTML og CSS</h4></a>";
      echo "</div>";

      echo "<div class='liten_boks_medtekst'>";
        echo "<a href='javakurs.php'><img src='../bilder/js.png' width='150px'></a>";
        echo "<a href='javakurs.php'><h4>Javascript</h4></a>";
      echo "</div>";

      echo "<div class='liten_boks_medtekst'>";
        echo "<a href='phpogmysqlkurs.php'><img src='../bilder/php-mysql.png' width='200px'></a>";
        echo "<a href='phpogmysqlkurs.php'><h4>PHP og Mysql</h4></a>";
      echo "</div>";
    echo "</div>";

  echo "<div class='andre_rad'>";
    echo "<div class='liten_boks_medtekst'>";
      echo "<a href=''><img src='../bilder/spørsmålstegn.png' width='100px'></a>";
      echo "<a href=''><h4>Quiz og oppgaver</h4></a>";
    echo "</div>";

    echo "<div class='liten_boks_medtekst'>";
      echo "<a href=''><img src='../bilder/forstørrelsesglass.png' width='100px'></a>";
      echo "<a href=''><h4>Oppslagsverk</h4></a>";
    echo "</div>";

    echo "<div class='liten_boks_medtekst'>";
      echo "<a href=''><img src='../bilder/x.png' width='100px'></a>";
      echo "<a href=''><h4>Feilsøker</h4></a>";
    echo "</div>";
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
