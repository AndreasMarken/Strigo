<?php require_once '../shortcuts_php/logincheck.php'; ?>
<?php
require_once 'kobling.php';
require_once 'functions.php';


if (isset($_POST["submit"])) {

  $teacherID = $_SESSION["TeacherID"];

  $sql2 = "SELECT * FROM teacher WHERE idTeacher = $teacherID;";
  $resultat = $kobling->query($sql2);

    $code = generateKey($kobling);

    $sql3 = "INSERT INTO schoolcode (school_code, teacher_id, inUse) VALUES ('$code', $teacherID, '0');";
    $resultat2 = $kobling->query($sql3);
    if (!$resultat2) {
    die("Noe gikk galt med spørringen: " . $kobling->error);
    }
    header("location: ../pages/teacherloggedin.php?code-generated");
    exit();

}
