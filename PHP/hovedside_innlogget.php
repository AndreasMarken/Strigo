<?php require_once '../shortcuts_php/logincheck.php';
require_once '../shortcuts_php/kobling.php'; ?>
<!doctype html>
<html lang="nb">
  <head>
    <title>Strigo</title>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/hovedside_innlogget.css">

  </head>

  <body>

          <div class="body">

            <div class="header">
              <img src="../bilder/strigologo.jfif" width="100px">
              <h1>Strigo</h1>
              <div class="knapper">

              <ul>

                  <?php
                    if (isset($_SESSION["brukerID"])) {
                      echo "  <li><a href='../PHP/prfoil.php'>Min profil</a></li>";
                      echo "  <li><a href='../shortcuts_php/logout.inc.php'>Logg Ut</a></li>";
                    }
                    else {
                      echo "<li><a href='../php/hovedside.php'>Praktisk info</a></li>";
                      echo " <li><a href='../php/bildegalleri.php'>For skolene</a></li>";
                      echo "<li><a href='../php/linkside.php'>For elever</a></li>";
                      echo "<li><a href='../php/gjestebok.php'><img src='../bilder/2.png' height='20px'></a></li>";
                      echo "<li><a href='../PHP/login.php'>Logg inn</a></li>";
                    }
                   ?>

                </ul>
              </div>
            </div>


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
if (isset($_SESSION["brukerID"])) {
  echo "<div class='små_bokser'>";
    echo "<div class='øverste_rad'>";
      echo "<div class='liten_boks_medtekst'>";
        echo "<div class='bildene'>";
          echo "<a href=''><img src='../bilder/html.png' width='100px'></a>";
          echo "<a href=''><img src='../bilder/css.png' width='100px'></a>";
        echo "</div>";
          echo "<h4>HTML og CSS</h4>";
      echo "</div>";

      echo "<div class='liten_boks_medtekst'>";
        echo "<a href=''><img src='../bilder/js.png' width='150px'></a>";
        echo "<h4>Javascript</h4>";
      echo "</div>";

      echo "<div class='liten_boks_medtekst'>";
        echo "<a href=''><img src='../bilder/php-mysql.png' width='200px'></a>";
        echo "<h4>PHP og Mysql</h4>";
      echo "</div>";
    echo "</div>";

  echo "<div class='andre_rad'>";
    echo "<div class='liten_boks_medtekst'>";
      echo "<a href=''><img src='../bilder/spørsmålstegn.png' width='100px'></a>";
      echo "<h4>Quiz og oppgaver</h4>";
    echo "</div>";

    echo "<div class='liten_boks_medtekst'>";
      echo "<a href=''><img src='../bilder/forstørrelsesglass.png' width='100px'></a>";
      echo "<h4>Oppslagsverk</h4>";
    echo "</div>";

    echo "<div class='liten_boks_medtekst'>";
      echo "<a href=''><img src='../bilder/x.png' width='100px'></a>";
      echo "<h4>Feilsøker</h4>";
    echo "</div>";
  echo "</div>";
echo "</div>";

}
?>

      </div> <!-- Body-->

  </body>

</html>
