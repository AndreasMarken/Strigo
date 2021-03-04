<?php require_once '../shortcuts_php/logincheck.php';
require_once '../shortcuts_php/kobling.php'; ?>
<!doctype html>
<html lang="nb">
  <head>
    <title>Strigo</title>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/htmlogcsskurs.css">

  </head>

  <?php require_once '../shortcuts_php/header.php'; ?>
<?php  if (isset($_SESSION["brukerID"])) { ?>
<?php
  if (isset($_SESSION["brukerID"])) {
  require_once '../shortcuts_php/togglemenu.php';
  }?>

  <?php
  $sql = "SELECT * FROM chapter WHERE Main_area_class_class_id = 3;";

  $resultat = $kobling->query($sql);

  if (!$resultat) {
  die("Noe gikk galt med spørringen: " . $kobling->error);

  }

  while ($rad = $resultat->fetch_assoc()) {
    $chapter_id  = $rad[id];
       echo "<div class='kapittel_liste'>";
       echo "<ul>";
       echo "<div class='chapter_with_content'>";
       echo "<li><a href='courses.php?ID=$chapter_id'>Kapittel: $rad[chapter_name]</a></li>";
       echo "</ul>";
       if (isset($_GET["ID"])) {
         if ($_GET["ID"] == "$chapter_id") {
           $sql2 = "SELECT * FROM chapter_content WHERE Chapter_id = $chapter_id";

           $resultat2 = $kobling->query($sql2);

           if (!$resultat2) {
           die("Noe gikk galt med spørringen: " . $kobling->error);
           }

           while ($rad = $resultat2->fetch_assoc()) {
             $content_id = $rad[content_id];
            echo "<div class='content_list'>";
             echo "<ul>";
              echo "<li><a href='course.php?ID=$content_id'>Leksjon: $rad[name]</a></li>";
             echo "</ul>";
            echo "</div>";
         }
         echo "</div>";
       }
       echo "</div>";
  }
}


  ?>

<?php }
else {
  header("location:index.php");
  exit();
}?>

<?php require_once '../shortcuts_php/footer.php';?>

  </body>

</html>
