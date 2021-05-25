<?php
require_once '../shortcuts_php/logincheck.php';
require_once '../shortcuts_php/kobling.php';

$id = $_GET["ID"];

        $sql_1 = "SELECT * FROM classroom WHERE idClassroom = $id;";
        $resultat_1 = $kobling->query($sql_1);

          while ($rad_1 = $resultat_1->fetch_assoc()) {
            $classroomName = $rad_1[className];
            $classroomSubjectId = $rad_1[subjectId];
          }
 ?>
 <!doctype html>
 <html lang="nb">
   <head>
     <title>Strigo</title>

     <meta charset="UTF-8">
     <link rel="stylesheet" href="../CSS/teacher_classroom.css">

   </head>
   <body>
   <?php  if (isset($_SESSION["TeacherID"])) { ?>

 <?php 
   require_once '../shortcuts_php/togglemenu.php';
  ?>
 
 <header class="header">

    <div class="navigation">
      <ul class="navigation__list">
        <li class="navigation__item navigation__item--reekap"><a href="../index.php"><img src="../img/reekap-logo.png" alt="Reekap"></a></li>
      </ul>
    </div>

</header>

<section class="main">

  <nav class="navigation-left">
    <div class="navigation-left__container">
      <ul class="navigation-left__list">
        <li class="navigation-left__item"><?php echo "<a  href='classroom.php?ID=$id' class='navigation-left__link active'>";?>Students</a></li>
        <li class="navigation-left__item"><?php echo "<a  href='teacherassignments.php?ID=$id' class='navigation-left__link'>";?>Assignments</a></li>
        <li class="navigation-left__item"><?php echo "<a  href='teachercalendar.php?ID=$id' class='navigation-left__link'>";?>Calendar</a></li>
        <li class="navigation-left__item"><?php echo "<a  href='teachersettings.php?ID=$id' class='navigation-left__link'>";?>Settings</a></li>
        <li class="navigation-left__item"><a href="" class="navigation-left__link">View as student</a></li>
      </ul>
    </div>
  </nav>

  <section class="right-side">
    <h1 class="heading--primary">
      <?php 
        echo $classroomName;
      ?>
    </h1>
    <div class="list-of-students">
      <?php 
        $sql_2 = "SELECT * FROM participant WHERE classroom_id = $id;";
        $resultat_2 = $kobling->query($sql_2);

          while ($rad_2 = $resultat_2->fetch_assoc()) {
            $studentID = $rad_2["student_id"];

            $sql_3 = "SELECT * FROM student WHERE brukerID = $studentID;";
            $resultat_3 = $kobling->query($sql_3);
          
              while($rad_3 = $resultat_3->fetch_assoc()) {
                $Username = $rad_3["brukernavn"];

                $sql1 = "SELECT * FROM profilbilde WHERE userID = '$studentID';";
                $result = $kobling->query($sql1);

                  while ($rad = $result->fetch_assoc()) {
                    $status = $rad['status'];
                  }

                  echo "<a href='#' class='studentItem'>";

                  if($status == 1){
                    //echo "<img src='../uploads/profile".$studentID.".".$_SESSION["fileExt"]."' width='60px'>";
                    echo "<img src='../uploads/profile".$studentID.".jpg' width='60px' class='profilepicture'>";
                  } else{
                    echo "<img src='../img/profile.png' width='60px' class='profilepicture'>";
                  }

                

          
          echo "<h3 class='heading-tertiary'>".$Username."</h3>";
          echo "</a>";
        }
      }
      ?>
    </div>
    <a href="#popup" class="navigation-left__link active pos-right">Invite Students</a>
  </section>

</section>

<div class="popup" id="popup">
    <div class="popup__content">
      <div class="add_classroom">
        <form action="" method="post" class="form">
          <h2 class="heading-secondary">Type in your classroom-code:</h2>
          <input type="text" name="" class="form__input">
          <Button type="submit" name="join_classroom" class="btn-secondary">Join Classroom</button>
        </form>
        <?php 
        echo "<a href='classroom.php?ID="."$id' class='popup__close'>&times;</a>";
        ?>
        <!-- <a href="classroom.php? class="popup__close">&times;</a> -->
      </div>
    </div>
  </div>


  <svg class="btmleft" width="538" height="364" viewBox="0 0 538 364" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M296.172 682.381C255.105 718.622 213.601 756.446 160.181 768.538C106.938 780.59 54.5169 759.458 0.89648 749.218C-63.2511 736.967 -135.562 744.88 -185.299 702.557C-237.942 657.76 -265.775 587.123 -270.623 518.17C-275.434 449.722 -246.292 384.582 -211.821 325.252C-178.428 267.777 -141.476 198.718 -76.6027 184.226C-11.2243 169.622 40.7593 248.791 107.553 253.909C172.073 258.853 243.755 170.819 293.199 212.561C344.406 255.791 270.302 346.084 291.885 409.527C311.842 468.189 406.982 487.92 407.955 549.877C408.882 608.85 340.394 643.354 296.172 682.381Z" fill="#F5B78A"/>
  </svg>

  <svg class="topright" width="484" height="157" viewBox="0 0 484 157" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M331.254 64.7085C269.078 58.0768 193.809 105.456 147.471 63.4718C101.51 21.8286 143.799 -57.5621 129.658 -117.949C115.62 -177.898 46.9212 -228.378 65.3732 -287.119C83.7169 -345.515 158.35 -363.345 214.44 -387.85C259.62 -407.588 307.88 -409.086 356.888 -414.476C406.878 -419.974 455.688 -431.416 504.611 -419.764C563.538 -405.731 644.893 -398.587 664.406 -341.24C685.165 -280.232 602.946 -230.024 590.7 -166.756C581.033 -116.81 619.936 -65.1585 601.771 -17.6396C581.966 34.1697 541.837 83.7228 488.775 99.8753C436.243 115.867 385.856 70.5323 331.254 64.7085Z" fill="#F5B78A"/>
  </svg>

<a href="#"><img src="../img/image 3.png" alt="Instagram logo" class="abs-right--2"></a>
<a href="#"><img src="../img/image 4.png" alt="Facebook logo" class="abs-right"></a>

<?php
} else {
header("location:index.php");
exit();
}?>

   </body>

 </html>
