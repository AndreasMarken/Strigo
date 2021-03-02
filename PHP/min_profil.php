<?php require_once '../shortcuts_php/logincheck.php';
require_once '../shortcuts_php/kobling.php'; ?>
<!doctype html>

<html lang="nb">
  <head>
    <meta charset="utf-8">
    <title>Strigo</title>
    <link rel="stylesheet" href="../CSS/min_profil.css">
  </head>
  <body>


        <?php require_once '../shortcuts_php/header.php';

          if (isset($_SESSION["brukerID"])) {
            echo "<div class='dropdownmenu'>";
              echo "<img src='../bilder/Skjermbilde.PNG'>";
            echo "</div>";
          }

          ?>

          <div class="mainContainer">
            <div class="upperContainer">
              <img src="../bilder/profile_image.png" alt="Profilbilde">
              <button type="button" name="byttProfilbilde">BYTT PROFILBILDE</button>
            </div>

            <div class="lowerContainer">
                <form action="min_profil.php" method="post">
                  <label for="navn">NAVN:</label>
                  <input type="text" name="nanvn" placeholder="Ola Nordmann"></br>
                  <label for="brukernavn">BRUKERNAVN:</label>
                  <input type="text" name="brukernavn" value="olanor"></br>
                  <label for="passord">PASSORD:</label>
                  <input type="text" name="passord" value="....."></br>
                  <label for="epost">EPOST:</label>
                  <input type="text" name="epost" value="ola.nordmann@post.no"></br>

                  <input type="submit" name="lagre" value="LAGRE">
                </form>
            </div>
          </div>

  </body>
</html>

<?php if(isset($_POST['lagre'])){
  $navn = $_POST['navn'];
  $brukernavn = $_POST['brukernavn'];
  $epost = $_POST['epost'];
  $brukerId = $_SESSION['brukerID'];

  $query = "  UPDATE 'Student'
              SET navn = '$navn', brukernavn = '$brukernavn', email = '$epost'
              WHERE brukerID = '$brukerId'  ";
  $query_run = mysqli_query($kobling, $query);
}
  ?>
