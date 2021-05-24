<?php
session_start();
require_once '../shortcuts_php/logincheck.php';
require_once '../shortcuts_php/kobling.php'; ?>
<!doctype html>
<?php
if (isset($_SESSION["brukerID"])) {
// Lager variabler for brukerID sitt navn, brukernavn og email//
$id = $_SESSION["brukerID"];
$sql1 = "SELECT * from student WHERE brukerID = $id";
$resultat = $kobling->query($sql1);

if (!$resultat) {
die("Noe gikk galt med spørringen: " . $kobling->error);

}
while ($rad1 = $resultat->fetch_assoc()) {
$navn = $rad1['navn'];
$brukernavn = $rad1['brukernavn'];
$epost = $rad1['email'];
}

//profilbilde
      $id = $_SESSION["brukerID"];

      $sql1 = "SELECT * FROM profilbilde WHERE userID = '$id';";
      $result = $kobling->query($sql1);

      if (!$result) {
        die("Noe gikk galt med spørringen: " . $kobling->error);
      }

      while ($rad2 = $result->fetch_assoc()) {
        $status = $rad2['status'];
  }
      

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
      }

      if(isset($_POST['lagre'])){
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
<html lang="nb">
  <head>
    <meta charset="utf-8">
    <title>Reekap</title>
    <link rel="stylesheet" href="../CSS/min_profil.css">
  </head>
  <body>

  <header class="header">
    <div class="navigation">
      <ul class="navigation__list">
        <li class="navigation__item navigation__item--reekap"><a href="../index.php"><img src="../img/reekap-logo.png" alt="Reekap"></a></li>
      </ul>
    </div>
  </header>

  <?php
  require_once '../shortcuts_php/togglemenu.php';
  ?>

  <section class="main">
    <div class="left-side">
    <?php if($status == 1){
      // echo "<img src='../uploads/profile".$id.".".$_SESSION["fileExt"]."'>";
      echo "<img src='../uploads/profile".$id.".jpg' class='profilepicture'>";
    } else{
      echo "<img src='../img/profile.png' class='profilepicture'>";
    } ?>
      <form class="bilde" action="../uploads/upload.php" method="post" enctype="multipart/form-data">
        <label class="btn btn-main" for="profilbilde">Choose a picture</label>
        <input class="file-input" type="file" name="profilbilde" id="profilbilde" value="Velg profilbilde">
        <button class="btn btn-main" type="submit" name="submit">Change profileimage</button>
      </form>
    </div>

    <div class="right-side">
      <div class="right-side__list">
        <form action="" method="POST">
          <h2 class="form-label">Name:</h2>
          <input class="form-input" type="text" name="navn" value="<?php echo $navn; ?>"></br>
          <h2 class="form-label">Username:</h2>
          <input class="form-input" type="text" name="brukernavn" value="<?php echo $brukernavn; ?>"></br>
          <h2 class="form-label">Email:</h2>
          <input class="form-input" type="email" name="epost" value="<?php echo $epost; ?>"></br>
          <input class="form-submit" type="submit" name="lagre" value="Save">
          <br>
          <form method="post">
            <input type="hidden" name="ID_bruker" value="<?php echo "$id"; ?>">
            <input class="form-submit--2" type="submit" name="slettID" value="Delete profile">
          </form>
        </form>
      </div>
    </div>
  </section>

  <a href="#"><img src="../img/image 3.png" class="abs-right--2"></a>
  <a href="#"><img src="../img/image 4.png" class="abs-right"></a>

  <svg class="midtop" width="622" height="103" viewBox="0 0 622 103" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M150.295 -408.531C199.652 -432.654 253.47 -381.74 305.762 -364.902C345.502 -352.106 380.806 -334.308 420.546 -321.511C486.175 -300.377 584.394 -326.912 615.231 -265.245C644.449 -206.818 561.28 -150.577 536.186 -90.2638C516.139 -42.0801 523.291 20.765 482.626 53.4736C442.209 85.9818 382.881 66.5024 331.601 74.2896C283.425 81.6053 235.895 115.129 190.329 97.86C144.719 80.5747 130.965 24.2187 100.012 -13.4775C66.5118 -54.2764 2.85935 -80.0986 0.888925 -132.852C-1.08709 -185.756 65.5849 -213.3 90.8101 -259.844C116.771 -307.746 101.344 -384.606 150.295 -408.531Z" fill="#455A64"/>
  </svg>

  <svg class="midright" width="149" height="200" viewBox="0 0 149 200" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M149.429 0.0332375C168.698 0.646784 185.035 11.7673 202.435 20.0697C222.497 29.6425 251.092 31.7183 259.205 52.413C267.404 73.3273 245.16 93.7128 239.862 115.543C235.232 134.625 241.7 156.592 230.082 172.423C218.235 188.566 197.908 197.679 178 199.838C159.453 201.848 144.219 184.536 125.581 183.753C97.5055 182.573 69.0261 206.26 43.6505 194.191C18.26 182.115 -0.00146452 152.139 8.80926e-08 124.025C0.00145899 96.02 25.1903 75.2959 43.6578 54.2421C57.7943 38.1259 75.1291 26.4017 94.2076 16.6238C111.665 7.67649 129.821 -0.591054 149.429 0.0332375Z" fill="#F5B78A"/>
  </svg>


  </body>
<?php } elseif ($_SESSION["TeacherID"]) {?>
  <html lang="nb">
    <head>
      <meta charset="utf-8">
      <title>Reekap</title>
      <link rel="stylesheet" href="../CSS/min_profil.css">

      <?php 
  // Lager variabler for brukerID sitt navn, brukernavn og email//
            $id = $_SESSION["TeacherID"];
            $sql1 = "SELECT * from teacher WHERE idTeacher = $id";
            $resultat = $kobling->query($sql1);

          if (!$resultat) {
            die("Noe gikk galt med spørringen: " . $kobling->error);

          }
          while ($rad1 = $resultat->fetch_assoc()) {
          $navn = $rad1['name'];
          $brukernavn = $rad1['username'];
          $epost = $rad1['email'];
        }

        $sql1 = "SELECT * FROM Teacher_profilepicture WHERE teacher_id = '$id';";
        $result = $kobling->query($sql1);

        if (!$result) {
          die("Noe gikk galt med spørringen: " . $kobling->error);
        }

        while ($rad2 = $result->fetch_assoc()) {
          $status = $rad2['status'];
    }

      if(isset($_POST['lagre'])){
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
    </head>
    <body>

  <header class="header">
    <div class="navigation">
      <ul class="navigation__list">
        <li class="navigation__item navigation__item--reekap"><a href="../index.php"><img src="../img/reekap-logo.png" alt="Reekap"></a></li>
      </ul>
    </div>
  </header>
  
  <?php
  require_once '../shortcuts_php/togglemenu.php';
  ?>

  <section class="main">
    <div class="left-side">
    <?php if($status == 1){
      // echo "<img src='../uploads/profile".$id.".".$_SESSION["fileExt"]."'>";
      echo "<img src='../uploads-teacher/profile".$id.".jpg' class='profilepicture'>";
    } else{
      echo "<img src='../img/profile.png' class='profilepicture'>";
    } ?>
      <form class="bilde" action="../uploads-teacher/upload.php" method="post" enctype="multipart/form-data">
        <label class="btn btn-main" for="profilbilde">Choose a picture</label>
        <input class="file-input" type="file" name="profilbilde" id="profilbilde" value="Velg profilbilde">
        <button class="btn btn-main" type="submit" name="submit">Change profileimage</button>
      </form>
    </div>

    <div class="right-side">
      <div class="right-side__list">
        <form action="" method="POST">
          <h2 class="form-label">Name:</h2>
          <input class="form-input" type="text" name="navn" value="<?php echo $navn; ?>"></br>
          <h2 class="form-label">Username:</h2>
          <input class="form-input" type="text" name="brukernavn" value="<?php echo $brukernavn; ?>"></br>
          <h2 class="form-label">Email:</h2>
          <input class="form-input" type="email" name="epost" value="<?php echo $epost; ?>"></br>
          <input class="form-submit" type="submit" name="lagre" value="Save">
          <br>
          <form method="post">
            <input type="hidden" name="ID_bruker" value="<?php echo "$id"; ?>">
            <input class="form-submit--2" type="submit" name="slettID" value="Delete profile">
          </form>
        </form>
      </div>
    </div>
  </section>

  <a href="#"><img src="../img/image 3.png" class="abs-right--2"></a>
  <a href="#"><img src="../img/image 4.png" class="abs-right"></a>

  <svg class="midtop" width="622" height="103" viewBox="0 0 622 103" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M150.295 -408.531C199.652 -432.654 253.47 -381.74 305.762 -364.902C345.502 -352.106 380.806 -334.308 420.546 -321.511C486.175 -300.377 584.394 -326.912 615.231 -265.245C644.449 -206.818 561.28 -150.577 536.186 -90.2638C516.139 -42.0801 523.291 20.765 482.626 53.4736C442.209 85.9818 382.881 66.5024 331.601 74.2896C283.425 81.6053 235.895 115.129 190.329 97.86C144.719 80.5747 130.965 24.2187 100.012 -13.4775C66.5118 -54.2764 2.85935 -80.0986 0.888925 -132.852C-1.08709 -185.756 65.5849 -213.3 90.8101 -259.844C116.771 -307.746 101.344 -384.606 150.295 -408.531Z" fill="#455A64"/>
  </svg>

  <svg class="midright" width="149" height="200" viewBox="0 0 149 200" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M149.429 0.0332375C168.698 0.646784 185.035 11.7673 202.435 20.0697C222.497 29.6425 251.092 31.7183 259.205 52.413C267.404 73.3273 245.16 93.7128 239.862 115.543C235.232 134.625 241.7 156.592 230.082 172.423C218.235 188.566 197.908 197.679 178 199.838C159.453 201.848 144.219 184.536 125.581 183.753C97.5055 182.573 69.0261 206.26 43.6505 194.191C18.26 182.115 -0.00146452 152.139 8.80926e-08 124.025C0.00145899 96.02 25.1903 75.2959 43.6578 54.2421C57.7943 38.1259 75.1291 26.4017 94.2076 16.6238C111.665 7.67649 129.821 -0.591054 149.429 0.0332375Z" fill="#F5B78A"/>
  </svg>

  </body>
  <?php }
else {
  header("location:index.php");
  exit();
}
?>

</html>
