<?php require_once '../shortcuts_php/logincheck.php';
require_once '../shortcuts_php/kobling.php'; ?>
<!doctype html>
<html lang="nb">
  <head>
    <title>Strigo</title>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/hovedside_innlogget.css">

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
    echo "<img src='../bilder/profile.png' width='60px'>";

    $id = $_SESSION["brukerID"];
    $sql = "SELECT * FROM elev_login WHERE brukerID = $id";
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
   echo "<h3>Fullførte<br> kapitler: 2</h3>";
   echo "</div>";

   echo "<div class='fullførtoppgaver'>";
   echo "<img src='../bilder/task.png' width='50px'>";
   echo "<h3>Fullførte<br> oppgaver: 3</h3>";
   echo "</div>";

   echo "</div>";
}
?>

<div class="små_bokser">
  <div class="øverste_rad">
    <div class="liten_boks">
        <a href="#"><img src="../bilder/html.png" width="100px"></a>
        <a href="#"><img src="../bilder/css.png" width="100px"></a>
    </div>
    <div class="liten_boks">
        <a href="#"><img src="../bilder/js.png" width="150px">
    </div>
    <div class="liten_boks">
        <a href="#"><img src="../bilder/php-mysql.png" width="200px"></a>
    </div>
  </div>
  <div class="andre_rad">
    <div class="liten_boks_medtekst">
        <a href="#"><img src="../bilder/spørsmålstegn.png" width="100px"></a>
      <h4>Quiz og oppgaver</h4>
    </div>
    <div class="liten_boks_medtekst">
        <a href="#"><img src="../bilder/forstørrelsesglass.png" width="100px"></a>
      <h4>Oppslagsverk</h4>
    </div>
    <div class="liten_boks_medtekst">
        <a href="#"><img src="../bilder/x.png" width="100px"></a>
      <h4>Feilsøker</h4>
    </div>
  </div>
</div>


      </div> <!-- Body-->

  </body>

</html>
