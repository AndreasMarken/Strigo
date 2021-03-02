<?php require_once '../shortcuts_php/logincheck.php';
require_once '../shortcuts_php/kobling.php'; ?>
<!doctype html>
<html lang="nb">
  <head>
    <title>Strigo</title>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/hovedside_innlogget.css">

  </head>

  <?php require_once '../shortcuts_php/header.php'; ?>

<?php
  if (isset($_SESSION["brukerID"])) {
    echo "<div class='dropdownmenu'>";
      echo "<img src='../bilder/Skjermbilde.PNG'>";
    echo "</div>";
  }?>

<div class=oversiktsmeny>
  <?php
 if (isset($_SESSION["brukerID"])) {
   echo "";
   echo "<div class='minprofil'>";
    echo "<img src='../bilder/profile.png' width='60px'>";

    $id = $_SESSION["brukerID"];
    $sql = "SELECT * FROM student WHERE brukerID = $id";
    $resultat = $kobling->query($sql);

	if (!$resultat) {
		die("Noe gikk galt med spørringen: " . $kobling->error);

	}
  while ($rad = $resultat->fetch_assoc()) {
  echo " <h3>$rad[navn]</h3>";
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

}
?>
</div>
<?php
if (isset($_SESSION["brukerID"])) {
  echo "<div class='små_bokser'>";
    echo "<div class='øverste_rad'>";
      echo "<div class='liten_boks_medtekst'>";
        echo "<div class='bildene'>";
          echo "<a href=''><img src='../bilder/html.png' width='100px'></a>";
          echo "<a href=''><img src='../bilder/css.png' width='100px'></a>";
        echo "</div>";
          echo "<a href=''><h4>HTML og CSS</h4></a>";
      echo "</div>";

      echo "<div class='liten_boks_medtekst'>";
        echo "<a href=''><img src='../bilder/js.png' width='150px'></a>";
        echo "<a href=''><h4>Javascript</h4></a>";
      echo "</div>";

      echo "<div class='liten_boks_medtekst'>";
        echo "<a href=''><img src='../bilder/php-mysql.png' width='200px'></a>";
        echo "<a href=''><h4>PHP og Mysql</h4></a>";
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

}
?>

      </div> <!-- Body-->

  </body>

</html>
