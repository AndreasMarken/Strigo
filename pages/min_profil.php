<?php
session_start();
require_once '../shortcuts_php/logincheck.php';
require_once '../shortcuts_php/kobling.php'; ?>
<!doctype html>
<?php
if (isset($_SESSION["brukerID"])) {
 ?>
<html lang="nb">
  <head>
    <meta charset="utf-8">
    <title>Strigo</title>
    <link rel="stylesheet" href="../CSS/min_profil.css">
  </head>
  <body>

        <?php require_once '../shortcuts_php/header.php';

            require_once '../shortcuts_php/togglemenu.php';

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

        <!--Hovedinnhold siden-->
          <div class="mainContainer">
            <div class="upperContainer">
              <a href="hovedside_innlogget.php">TIL HOVEDMENY</a>
              <!-- Profilbilde -->
              <?php
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
                // echo "<img src='../uploads/profile".$id.".".$_SESSION["fileExt"]."'>";
                echo "<img src='../uploads/profile".$id.".jpg'>";
              } else{
                echo "<img src='../img/profile.png'>";
              }

              ?>

                <form class="bilde" action="../uploads/upload.php" method="post" enctype="multipart/form-data">
                <input type="file" name="profilbilde" value="Velg profilbilde">
                <button type="submit" name="submit">OPPDATER BILDE</button>
              </form>
            </div>

            <!-- navn, brukernavn, epost -->
            <div class="lowerContainer">
              <form action="" method="POST">
                <label for="navn">NAVN:</label>
                <input type="text" name="navn" value="<?php echo $navn; ?>"></br>

                <label for="brukernavn">BRUKERNAVN:</label>
                <input type="text" name="brukernavn" value="<?php echo $brukernavn; ?>"></br>

                <label for="epost">EPOST:</label>
                <input type="email" name="epost" value="<?php echo $epost; ?>"></br>

                <input type="submit" name="lagre" value="LAGRE">
                <br>
                <?php
                if(isset($_POST["slettID"])){

                    $id_slett = $_POST["ID_bruker"];

                    $sql_delete_photo = "DELETE FROM profilbilde WHERE userID=$id_slett";

                      if ($kobling->query($sql_delete_photo) === TRUE) {

                        $sql_delete_student = "DELETE FROM student WHERE brukerID=$id_slett";

                          if ($kobling->query($sql_delete_student) === TRUE) {
                            require_once '../shortcuts_php/logout.inc.php';
                            header('Location: index.php');
                          } else {
                            echo "Error deleting photo: " . $kobling->error;
                          }
                        } else {
                          echo "Error deleting student: " . $kobling->error;
                        }
                    }?>

                   <form method="post">
                     <input type="hidden" name="ID_bruker" value="<?php echo "$id"; ?>">
                     <input type="submit" name="slettID" value="Slett Profil">
                  </form>
              </form>

            </div> <!-- End lowerContainer -->
          </div>

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

          <?php require_once '../shortcuts_php/footer.php';?>

  </body>
<?php } elseif ($_SESSION["TeacherID"]) {?>
  <html lang="nb">
    <head>
      <meta charset="utf-8">
      <title>Strigo</title>
      <link rel="stylesheet" href="../CSS/min_profil.css">
    </head>
    <body>

          <?php require_once '../shortcuts_php/header.php';

              require_once '../shortcuts_php/togglemenu.php';

  // Lager variabler for brukerID sitt navn, brukernavn og email//
            $id = $_SESSION["TeacherID"];
            $sql1 = "SELECT * from teacher WHERE idTeacher = $id";
            $resultat = $kobling->query($sql1);

          if (!$resultat) {
            die("Noe gikk galt med spørringen: " . $kobling->error);

          }
          while ($rad = $resultat->fetch_assoc()) {
          $navn = $rad['name'];
          $brukernavn = $rad['username'];
          $epost = $rad['email'];
        }
          ?>

          <!--Hovedinnhold siden-->
            <div class="mainContainer">
              <div class="upperContainer">
                <a href="teacherloggedin.php">TIL HOVEDMENY</a>
                <!-- Profilbilde -->
                <?php
                  $id = $_SESSION["brukerID"];

                  $sql1 = "SELECT * FROM Teacher_profilepicture WHERE teacher_id = '$id';";
                  $result = $kobling->query($sql1);

                  if (!$result) {
                    die("Noe gikk galt med spørringen: " . $kobling->error);
                  }

                  while ($rad = $result->fetch_assoc()) {
                    $status = $rad['status'];
              }
                  if($status == 1){
                  echo "<img src='../uploads/profile".$id.".jpg'>";
                } else{
                  echo "<img src='../img/profile.png'>";
                }

                ?>

                  <form class="bilde" action="../uploads/upload.php" method="post" enctype="multipart/form-data">
                  <input type="file" name="profilbilde" value="Velg profilbilde">
                  <button type="submit" name="submit">OPPDATER BILDE</button>
                </form>
              </div>

              <!-- navn, brukernavn, epost -->
              <div class="lowerContainer">
                <form action="" method="POST">
                  <label for="navn">navn:</label>
                  <input type="text" name="navn" value="<?php echo $navn; ?>"></br>

                  <label for="brukernavn">BRUKERNAVN:</label>
                  <input type="text" name="brukernavn" value="<?php echo $brukernavn; ?>"></br>

                  <label for="epost">EPOST:</label>
                  <input type="email" name="epost" value="<?php echo $epost; ?>"></br>

                  <input type="submit" name="lagre" value="LAGRE">
                </form>
              </div>
            </div>

            <?php if(isset($_POST['lagre'])){
            $new_navn = $_POST['navn'];
            $id = $_SESSION["TeacherID"];
            $new_brukernavn = $_POST['brukernavn'];
            $new_epost = $_POST['epost'];

            $sql2 = ("UPDATE teacher
                      SET name = '$new_navn', username = '$new_brukernavn', email = '$new_epost'
                      WHERE idTeacher = '$id';");

            $result = $kobling->query($sql2);

             header("location:min_profil.php");

            }
            ?>

            <?php require_once '../shortcuts_php/footer.php';?>

    </body>
  <?php }
else {
  header("location:index.php");
  exit();
}
?>

</html>
