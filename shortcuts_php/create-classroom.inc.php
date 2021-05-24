<?php require_once '../shortcuts_php/logincheck.php'; ?>
<?php
require_once 'kobling.php';

if (isset($_POST["create_classroom"])) {

  $subject = $_POST["subject"];
  $classcode = $_POST["classCode"];
  $classname = $_POST["className"];
  $teacherId = $_SESSION["TeacherID"];

  $sql1 = "SELECT COUNT(idSchoolCode) AS schoolcodeexist FROM schoolcode WHERE school_code = '$classcode';";
  $resultat1 = $kobling->query($sql1);
  while ($rad1 = $resultat1->fetch_assoc()) {
    $count = $rad1[schoolcodeexist];
  }
  if ($count == 0) {
    header("location: ../pages/teacherloggedin.php?error=classcode-no-exist");
    exit();
  } else {

  $sql5 = "SELECT * FROM schoolcode WHERE school_code = '$classcode';";
  $resultat4 = $kobling->query($sql5);

  if ($resultat4) {

    while ($rad = $resultat4->fetch_assoc()) {
      $inUse = $rad[inUse];
      $schoolcodeID = $rad[idSchoolCode];
    }

    if ($inUse == 1){
      header("location: ../pages/teacherloggedin.php?error=classcode-already-used");
      exit();
    }

    $sql6 = "SELECT * FROM subject WHERE subjectName = '$subject';";
    $resultat5 = $kobling->query($sql6);

    while ($row = $resultat5->fetch_assoc()) {
      $subjectID = $row[idSubject];
    }

    $sql7 = "INSERT INTO classroom (teacherId, schoolCodeId, subjectId, className) VALUES ($teacherId, $schoolcodeID, $subjectID, '$classname');";
    $resultat6 = $kobling->query($sql7);

    if (!$resultat6) {
      die("Noe gikk galt med spørringen: " . $kobling->error);
    }

    $sql8 = "UPDATE schoolcode SET inUse = 1 WHERE school_code = '$classcode';";
    $resultat7 = $kobling->query($sql8);

    header("location: ../pages/teacherloggedin.php?classroom-created");
    exit();

  } else {
    header("location: ../pages/teacherloggedin.php?error=classcode-no-exist");
    exit();
  }

}
}
