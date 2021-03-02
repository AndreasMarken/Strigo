<?php
session_start();
require_once '../shortcuts_php/logincheck.php';
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
// Lager variabler for brukerID sitt navn, brukernavn og email//
          $id = $_SESSION["brukerID"];
          $sql1 = "SELECT * from student WHERE brukerID = $id";
          $resultat = $kobling->query($sql1);

        if (!$resultat) {
          die("Noe gikk galt med spørringen: " . $kobling->error);

        }
        while ($rad = $resultat->fetch_assoc()) {
        $navn = $rad['navn'];
        $brukernavn = $rad['brukernavn'];
        $epost = $rad['email'];
      }
        ?>
        <!-- Profilbilde opplasting(må jobbes mer med) -->
          <!--<form class="bilde" action="../uploads/upload.php" method="post" enctype="multipart/form-data">
          <input type="file" name="profilbilde" value="Velg profilbilde">
          <button type="submit" name="submit">UPLOAD</button>
        </form>
      -->
        <?php/*
          $sqlImg = "SELECT * FROM profilbilde WHERE userID = '$id';";
          $resultImg = $kobling->query($sqlImg);
          $statusImg = $resultImg['status'];
          if($statusImg == 0){
            echo "<img src='../uploads/profile".$id.".png'>"
          } else{
            echo "<img src='../bilder/profile.png'>"
          }*/
        ?>



        <!--Hovedinnhold siden-->
          <div class="mainContainer">
            <div class="upperContainer">
              <img src="../bilder/profile_image.png" alt="Profilbilde">
              <button type="button" name="byttProfilbilde">BYTT PROFILBILDE</button>
            </div>

            <div class="lowerContainer">
              <form action="" method="POST">
                <label for="navn">NAVN:</label>
                <input type="text" name="navn" value="<?php echo $navn; ?>"></br>

                <label for="brukernavn">BRUKERNAVN:</label>
                <input type="text" name="brukernavn" value="<?php echo $brukernavn; ?>"></br>

                <label for="epost">EPOST:</label>
                <input type="email" name="epost" value="<?php echo $epost; ?>"></br>

                <input type="submit" name="lagre" value="LAGRE">
              </form>
            </div>
          </div>

  </body>
</html>

<?php if(isset($_POST['lagre'])){
$new_navn = $_POST['navn'];
$id = $_SESSION["brukerID"];
$new_brukernavn = $_POST['brukernavn'];
$new_epost = $_POST['epost'];

$sql2 = ("UPDATE student
          SET navn = '$new_navn', brukernavn = '$new_brukernavn', email = '$new_epost'
          WHERE brukerID = '$id';");

$result = $kobling->query($sql2);

 header("location:min_profil.php");

}
?>
