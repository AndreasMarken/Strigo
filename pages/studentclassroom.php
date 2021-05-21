<?php require_once '../shortcuts_php/logincheck.php';
require_once '../shortcuts_php/kobling.php'; ?>
<!doctype html>
<html lang="nb">
  <head>
    <title>Strigo</title>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/studentclassroom.css">

  </head>

    <?php  if (isset($_SESSION["brukerID"])) { ?>

  <?php require_once '../shortcuts_php/header.php';

    require_once '../shortcuts_php/togglemenu.php';
    ?>

    <div class="oversiktsmeny">
<?php
    echo "<div class='minprofil'>";
    echo "<a href='min_profil.php'>";

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
       // echo "<img src='../uploads/profile".$id.".".$_SESSION["fileExt"]."' width='60px'>";
       echo "<img src='../uploads/profile".$id.".jpg' width='60px'>";
     } else{
       echo "<img src='../img/profile.png' width='60px'>";
     }

     "</a>";
 /*Profilbilde slutt*/

     $sql = "SELECT * FROM student WHERE brukerID = $id";
     $resultat = $kobling->query($sql);

   if (!$resultat) {
     die("Noe gikk galt med spørringen: " . $kobling->error);

   }
   while ($rad = $resultat->fetch_assoc()) {
   echo " <a href='min_profil.php'><h3>$rad[navn]</h3></a>";
 }
    echo "</div>";

    echo "<div class='fullførtkapitler'>";
    echo "<img src='../img/bøker.png' width='40px'>";

    $sql = "SELECT COUNT(classroom_id) AS antall_klasserom FROM participant WHERE student_id = $id";
    $resultat = $kobling->query($sql);
    while ($rad = $resultat->fetch_assoc()) {
        echo "<h3>Antall<br>Klasserom: "."$rad[antall_klasserom]";
    }

    echo "</div>";

    echo "<div class='fullførtoppgaver'>";
    echo "<img src='../img/task.png' width='50px'>";
    $id = $_SESSION["brukerID"];
    $sql = "SELECT COUNT(student_id) AS student_tasks FROM student_or_class_homework WHERE student_id = $id";
    $resultat = $kobling->query($sql);

    if (!$resultat) {
    die("Noe gikk galt med spørringen: " . $kobling->error);
    }

    while ($rad = $resultat->fetch_assoc()) {
         echo "<h3>Antall<br> Lekser: "."$rad[student_tasks]</h3> ";
    }

    echo "</div>";

    ?>

</div>

<?php
$classroomId = $_GET[ID];
$sql_1 = "SELECT * FROM classroom WHERE idClassroom = $classroomId;";
$resultat_1 = $kobling->query($sql_1);

if (!$resultat_1) {
die("Noe gikk galt med spørringen: " . $kobling->error);
}

while ($rad = $resultat_1->fetch_assoc()) {
  $subjectId = $rad[subjectId];
}

if ($subjectId == 1) {
  echo "<div class='små_bokser'>";
    echo "<div class='øverste_rad'>";
      echo "<div class='liten_boks_medtekst'>";
        echo "<div class='bildene'>";
          echo "<a href='htmlogcsskurs.php'><img src='../img/html.png' width='100px'></a>";
          echo "<a href='htmlogcsskurs.php'><img src='../img/css.png' width='100px'></a>";
        echo "</div>";
          echo "<a href='htmlogcsskurs.php'><h4>HTML og CSS</h4></a>";
      echo "</div>";

      echo "<div class='liten_boks_medtekst'>";
        echo "<a href='javakurs.php'><img src='../img/js.png' width='150px'></a>";
        echo "<a href='javakurs.php'><h4>Javascript</h4></a>";
      echo "</div>";

      echo "<div class='liten_boks_medtekst'>";
        echo "<a href='phpogmysqlkurs.php'><img src='../img/php-mysql.png' width='200px'></a>";
        echo "<a href='phpogmysqlkurs.php'><h4>PHP og Mysql</h4></a>";
      echo "</div>";
    echo "</div>";

  echo "<div class='andre_rad'>";
    echo "<div class='liten_boks_medtekst'>";
      echo "<a href=''><img src='../img/spørsmålstegn.png' width='100px'></a>";
      echo "<a href=''><h4>Quiz og oppgaver</h4></a>";
    echo "</div>";

    echo "<div class='liten_boks_medtekst'>";
      echo "<a href=''><img src='../img/forstørrelsesglass.png' width='100px'></a>";
      echo "<a href=''><h4>Oppslagsverk</h4></a>";
    echo "</div>";

    echo "<div class='liten_boks_medtekst'>";
      echo "<a href=''><img src='../img/x.png' width='100px'></a>";
      echo "<a href=''><h4>Feilsøker</h4></a>";
    echo "</div>";
  echo "</div>";
echo "</div>";
} else {
  echo "Faget ditt finnes ikke for nettsiden enda";
}



 require_once '../shortcuts_php/footer.php';

}

else {
 header("location: login.php");
 exit();
}?>

  </body>

</html>
