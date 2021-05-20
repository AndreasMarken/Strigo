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

    <div class="oversiktsmeny">
<?php
    echo "<div class='minprofil'>";
    echo "<a href='min_profil.php'>";

     /*Profilbilde*/

       $id = $_SESSION["TeacherID"];

       $sql1 = "SELECT * FROM teacher_profilepicture WHERE teacher_id = '$id';";
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

     $sql = "SELECT * FROM teacher WHERE idTeacher = $id";
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

    $sql = "SELECT COUNT(idClassroom) AS antall_klasserom FROM classroom WHERE teacherId = $id";
    $resultat = $kobling->query($sql);
    while ($rad = $resultat->fetch_assoc()) {
        echo "<h3>Antall<br>Klasserom: "."$rad[antall_klasserom]";
    }
    echo "</div>";

    echo "<div class='fullførtoppgaver'>";
    echo "<img src='../img/task.png' width='50px'>";

    // $sql = "SELECT COUNT(idClassroom) AS antall_lekser FROM classroom WHERE teacherId = $id";
    // $resultat = $kobling->query($sql);
    //
    // if (!$resultat) {
    // die("Noe gikk galt med spørringen: " . $kobling->error);
    // }
    //
    // while ($rad = $resultat->fetch_assoc()) {
    //      echo "<h3>Antall<br> Lekser: "."$rad[antall_lekser]</h3> ";
    // }

    echo "</div>";

    ?>

  </div>

    </div>

    <a href="php_code_for_test.php">Php kode</a> <br>

    <div class="classList">

    <?php

    $teacherID = $_SESSION['TeacherID'];

    $sql_1 = "SELECT * FROM classroom WHERE teacherId = $teacherID";
    $resultat_1 = $kobling->query($sql_1);

    if (!$resultat_1) {
    die("Noe gikk galt med spørringen: " . $kobling->error);
    }

    while ($rad = $resultat_1->fetch_assoc()) {
      $classroomId = $rad["idClassroom"];
      $classname = $rad["className"];

      $subjectId = $rad['subjectId'];

      $sql_2 = "SELECT * FROM subject where idSubject = $subjectId;";
      $resultat_2 = $kobling->query($sql_2);

      if (!$resultat_2) {
      die("Noe gikk galt med spørringen: " . $kobling->error);
      }

      while ($rad_2 = $resultat_2->fetch_assoc()) {
        $subjectName = $rad_2["subjectName"];
      }

      echo "<a href=\"classroom.php?ID=$classroomId\" class='classItem'>";
        echo "<h3 class='heading-tertiary'>".$subjectName." ".$classname."</h3>";
      echo "</a>";

      echo "<br>";
    }
     ?>

   </div>

   <?php
   $sql4 = "SELECT * FROM subject;";
   $resultat3 = $kobling->query($sql4);

   if (!$resultat3) {
   die("Noe gikk galt med spørringen: " . $kobling->error);
   } ?>
   <form action="../shortcuts_php/create-classroom.inc.php" method="post">
     <input type="text" name="classCode" placeholder="ClassCode">
     <select name="subject">
   <?php  while ($rad = $resultat3->fetch_assoc()) { ?>
   <option name="<?php echo $rad["subjectName"]; ?>"><?php echo $rad["subjectName"]; ?></option>
   <?php } ?>
   </select>

   <input type="text" name="className" placeholder="Klassenavn">

   <Button type="submit" name="create_classroom">Opprett et klasserom</button>
   </form>


   <?php
   if (isset($_GET["error"])) {
     if ($_GET["error"] == "classcode-already-taken") {
       echo "<p>Koden din er allerede i bruk</p>";
     }
   }
   ?>
   <br> <br> <br><br>

   <form action="../shortcuts_php/generate.inc.php" method="post">
          <Button type="submit" name="submit">Generate</button>
   </form>

    <h2 class="heading-tertiary">Dine koder:</h2>
   <?php
   $sql5 = "SELECT * FROM schoolcode WHERE teacher_id = $teacherID AND inUse = 0";
   $resultat5 = $kobling->query($sql5);
      while ($rad = $resultat5->fetch_assoc()) {
        $school_code = $rad["school_code"];
        echo $school_code;
        echo "<br>";
      }
    ?>

<?php require_once '../shortcuts_php/footer.php';

} else {
  header("location:index.php");
  exit();
} ?>

  </body>

</html>
