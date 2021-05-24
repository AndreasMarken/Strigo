<?php
require_once '../shortcuts_php/logincheck.php';
require_once '../shortcuts_php/kobling.php';
 if (isset($_POST["join_classroom"])) {

  $id = $_SESSION["brukerID"];
  $schoolcode = $_POST["classCode"];

  $sql1 = "SELECT COUNT(school_code) AS schoolcode_exists FROM schoolcode WHERE school_code = '$schoolcode';";
  $result1 = $kobling->query($sql1); 

  while ($row1 = $result1->fetch_assoc()) {
           $count = $row1['schoolcode_exists'];
   }

    if ($count == 0) {
      header('location:../pages/hovedside_innlogget.php?code-no-exist#popup');
      exit();
    } elseif($count == 1) {
      $sql7 = "SELECT * FROM schoolcode WHERE school_code = '$schoolcode';";
      $result7 = $kobling->query($sql7); 
      while ($row7 = $result7->fetch_assoc()) {
        $schoolcodeId = $row7[idSchoolCode];
      }
      
     $sql2 = "SELECT * FROM classroom WHERE schoolCodeId = $schoolcodeId;";
     $result2 = $kobling->query($sql2);

      while ($row2 = $result2->fetch_assoc()) {
        $numberofstudents = $row2[studentCount];
        $classroomID = $row2[idClassroom];
      }

      $sql5 = "SELECT COUNT(participantId) AS in_class_or_not FROM participant WHERE classroom_id = $classroomID AND student_id = $id;";
      $result5 = $kobling->query($sql5);

      while ($row5 = $result5->fetch_assoc()) {
        $count2 = $row5[in_class_or_not];
      }

      if ($numberofstudents < 30 && $count2 == 0 ) {
        $sql3 = "INSERT INTO participant (student_id, classroom_id) VALUES ($id, $classroomID);";
        $result3 = $kobling->query($sql3);

        $sql4 = "UPDATE classroom SET studentCount = $numberofstudents + 1 WHERE idClassroom = $classroomID;";
        $result3 = $kobling->query($sql3);
        header('location:../pages/hovedside_innlogget.php?classroom-joined');
        exit();
      } else {
         header('location:../pages/hovedside_innlogget.php?klasserommet-fullt-or-already-joined#popup');
         exit();
      }
    }
 }
 else {
   header('location:../pages/hovedside_innlogget.php');
   exit();
 }
