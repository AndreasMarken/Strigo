<?php require_once '../shortcuts_php/logincheck.php';
require_once '../shortcuts_php/kobling.php'; ?>
<!doctype html>
<html lang="nb">
  <head>
    <title>Strigo</title>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/index.css">

  </head>

<?php require_once '../shortcuts_php/knapper.php' ; ?>

<?php
  if (isset($_SESSION["brukerID"])) {
    echo "<div class='dropdownmenu'>";
      echo "<img src='../bilder/Skjermbilde.PNG'>";
    echo "</div>";
  }


 if (isset($_SESSION["brukerID"])) {
   echo "<div class='oversiktsmeny'>";
   echo "<div class='minprofil'>";
    echo "<img src='../bilder/#'>";



    $id = $_SESSION["brukerID"];
    $sql = "SELECT * FROM elev_login WHERE brukerID = $id";
    $resultat = $kobling->query($sql);

	if (!$resultat) {
		die("Noe gikk galt med spørringen: " . $kobling->error);

	}
  while ($rad = $resultat->fetch_assoc()) {
  echo " $rad[navn]";

   echo "</div>";
   echo "<div class='fullførtkapitler'>";

   echo "</div>";
   echo "<div class='fullførtoppgaver'>";

   echo "</div>";
   echo "</div>";
 }
}

?>
      </div> <!-- Body-->

  </body>

</html>
