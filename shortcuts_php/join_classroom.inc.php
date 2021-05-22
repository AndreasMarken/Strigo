<?php
require_once '../shortcuts_php/logincheck.php';
require_once '../shortcuts_php/kobling.php';
if (isset($_POST["join_classroom"])) {

  $id = $_SESSION["brukerID"];
  $schoolcode = $_POST["classCode"];

  $sql1 = "SELECT * FROM schoolcode WHERE school_code = '$schoolcode'";
  $result1 = $kobling->query($sql1);

  if (!$result1) {
    header("location: ../pages/hovedside_innlogget.php?code-no-exist");
    exit();
  } else {
    while ($row1 = $result1->fetch_assoc()) {
      $schoolcodeId = $row1[idSchoolCode];
    }
    $sql2 = "SELECT * FROM classroom WHERE schoolCodeId = $schoolcodeId";
    $result2 = $kobling->query($sql2);

    // if (!$result2) {
    //   header("location:../pages/hovedside_innlogget.php?klasserommet-");
    //   exit();
    // }

    while ($row2 = $result2->fetch_assoc()) {
      $numberofstudents = $row2[studentCount];
      $classroomID = $row2[idClassroom];
    }

    $sql5 = "SELECT * FROM participant WHERE classroom_id = $classroomID AND student_id = $id";
    $result5 = $kobling->query($sql5);


    if ($numberofstudents < 30 && !$result5) {
      $sql3 = "INSERT INTO participant (student_id, classroom_id) VALUES ($id, $classroomID)";
      $result3 = $kobling->query($sql3);

      $sql4 = "UPDATE classroom SET studentCount = studentCount + 1 WHERE idClassroom = $classroomID";
      $result3 = $kobling->query($sql3);
      header("location: ../pages/hovedside_innlogget.php?classroom-joined");
      exit();
    } else {
      header("location: ../pages/hovedside_innlogget.php?klasserommet-fullt-or-already-joined");
      exit();
    }
  }
}
else {
  header("location: ../pages/hovedside_innlogget.php");
  exit();
}
