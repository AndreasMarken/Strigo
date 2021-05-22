<?php require_once '../shortcuts_php/logincheck.php';
require_once '../shortcuts_php/kobling.php'; ?>
<!doctype html>
<html lang="nb">
  <head>
    <title>Strigo</title>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/course.css">

  </head>

  <?php require_once '../shortcuts_php/header.php'; ?>
<?php  
if (isset($_SESSION["brukerID"])) { 
  require_once '../shortcuts_php/togglemenu.php';
?>
<div class="mainContainer">
  <h1>Kapittel 3 Sammensetting</h1>
<div class="navigasjonsbar">

  <button type="button">Forrige video</button>

    <div class="videoslide">

      <iframe src="../img/video_nettverk.mp4" width="140px" height="90px"></iframe>
      <iframe src="../img/video_nettverk.mp4" width="140px" height="90px"></iframe>
      <iframe src="../img/video_nettverk.mp4" width="140px" height="90px"></iframe>

    </div>

  <button type="button">Neste video</button>

</div>

<div class="video">

<?php

  $sql = "SELECT * FROM lection;";

  $resultat = $kobling->query($sql);

  if (!$resultat) {
  die("Noe gikk galt med spørringen : " . $kobling->error);

  }

  while ($rad = $resultat->fetch_assoc()) {
    $content_id = $rad[content_id];
    if (isset($_GET["ID"])) {
      if ($_GET["ID"] == "$content_id"){

        $sql2 = "SELECT * FROM lection WHERE lection_id = $content_id;";

        $resultat2 = $kobling->query($sql2);

        if (!$resultat2) {
          die("Noe gikk galt med spørringen1: " . $kobling->error);
        }


    while ($rad2 = $resultat2->fetch_assoc()) {
      $url = $rad2[video_url];
      echo "<iframe src='$url' width='440px' height='280px'></iframe>";

      } //while-løkken for video
    }//if-statemnt som leter etter hvilken id som står i url-en
  }//if-statement som leter etter ID i url
}//while-løkken som henter id-fra databasen for å sjekke opp mot url-id.
?>

<h1>Leksjon 1: HTML - the basics</h1>

</div>

<div class="aftervideo">
  <div class="buttons">

    <button onclick="location.href='index.php';" type="button">Quiz</button>
    <button onclick="location.href='index.php';" type="button">Oppgave</button>
    <button onclick="location.href='index.php';" type="button"><>...< /></button>

  </div>
  <div class="big_box">
    <br>
    <div class="white_box">
      <h2>Sett opp TAG-ene under<br> i riktig rekkefølge:</h2>

      <div class="task">

        <button type="button" name="button"><"head"> </button>
        <button type="button" name="button"><"/html"> </button>
        <button type="button" name="button"><"body"> </button>
        <button type="button" name="button"><"/head"> </button>
        <button type="button" name="button"><"/body"> </button>
        <button type="button" name="button"><"html"> </button>

      </div>

      <div class="buttons2">

        <button onclick="location.href='index.php';" type="button">Sjekk svar</button>
        <button onclick="location.href='index.php';" type="button">Neste</button>

      </div>

    </div>

  </div>

</div>

</div>

<?php require_once '../shortcuts_php/footer.php';?>

<?php }
else {
  header("location:index.php");
  exit();
}?>

  </body>

</html>
