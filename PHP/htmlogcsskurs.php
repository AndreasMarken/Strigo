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
  require_once '../shortcuts_php/togglemenu.php';

$sql = "SELECT * FROM chapter WHERE Main_area_class_class_id = 1;";

$resultat = $kobling->query($sql);

if (!$resultat) {
die("Noe gikk galt med spørringen: " . $kobling->error);

}
echo "<div class='kapittel_liste'>";
echo "<h1> Kurs i HTML og CSS</h1>";

while ($rad = $resultat->fetch_assoc()) {
  $chapter_id  = $rad[id];

     echo "<ul>";
     echo "<li><a href='courses.php?ID=$chapter_id'>Kapittel: $rad[chapter_name]</a></li>";
     echo "</ul>";

}
echo "</div>";

 }
 
else {
  header("location:index.php");
  exit();
}?>

  </body>

</html>
