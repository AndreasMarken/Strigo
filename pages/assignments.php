<?php 
 require_once '../shortcuts_php/togglemenu.php';
 require_once '../shortcuts_php/logincheck.php';
 require_once '../shortcuts_php/kobling.php';
if (isset($_SESSION["brukerID"])) {
  $id = $_GET["ID"];
  
  $sql_1 = "SELECT * FROM classroom WHERE idClassroom = $id;";
  $resultat_1 = $kobling->query($sql_1);

    while ($rad_1 = $resultat_1->fetch_assoc()) {
      $classroomName = $rad_1["className"];
      $classroomSubjectId = $rad_1["subjectId"];
    }

    $sql_2 = "SELECT COUNT(assignmentId) AS antall_assignments FROM assignment WHERE classroomID = $id AND stauts = 1;";
        $resultat_2 = $kobling->query($sql_2);

          while ($rad_2 = $resultat_2->fetch_assoc()) {
              $antall_lekser = $rad_2['antall_assignments'];
          } 

?>

<!doctype html>
<html lang="nb">
<head>
    <title>Reekap</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/assignments.css">
    <link rel = "icon" href ="../img/re.png" type ="image/x-icon">
  </head>
    <body>
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
        <li class="navigation-left__item"><?php echo "<a  href='studentclassroom.php?ID=$id' class='navigation-left__link'>";?>Lessons</a></li>
        <li class="navigation-left__item"><?php echo "<a  href='practice.php?ID=$id' class='navigation-left__link'>";?>Practice</a></li>
        <li class="navigation-left__item"><?php echo "<a  href='video-library.php?ID=$id' class='navigation-left__link'>";?>Video-library</a></li>
        <li class="navigation-left__item"><?php echo "<a  href='notes.php?ID=$id' class='navigation-left__link'>";?>Your notes</a></li>
        <li class="navigation-left__item"><?php echo "<a  href='assignments.php?ID=$id' class='navigation-left__link active'>";?>Assignments</a></li>
      </ul>
    </div>
  </nav>

  <div class="right-side">
      <div class="assignmentsbuttons">
          <a href="" class="btn">Active assignments: <?php echo $antall_lekser; ?></a>
      </div>
      <div class="assignment-list">
      <?php
        $sql_3 = "SELECT * FROM assignment WHERE classroomID = $id;";
        $resultat_3 = $kobling->query($sql_3);

        while ($rad_3 = $resultat_3->fetch_assoc()) {
          $assignmentName = $rad_3["assignmentName"];
          $status = $rad_3["stauts"];

          ?>
            <a href="#" class="homeworklink">
              <h2 class="headingsecondary"><?php echo $assignmentName; ?></h2>
              <div class="status">
              <h2 class="headingsecondary headingsecondary-2">
                Status: 

                <?php 
                if ($status == 0) {
                  echo "<h2 class='headingsecondary inactive-2'>Inactive</h2>";
                } elseif ($status == 1) {
                  echo "<h2 class='headingsecondary active-2'>Active</h2>";
                }
                ?>
              </h2>
              </div>
            </a>
          <?php } ?>    
      </div>
  </div>
  

</section>

  <svg class="svg1" width="658" height="836" viewBox="0 0 658 836" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M287.004 663.462C224.12 628.087 280.624 523.202 267.104 452.329C258.764 408.608 233.016 372.504 223.216 329.087C209.541 268.505 158.487 195.761 198.461 148.23C239.278 99.6969 323.938 155.983 384.531 137.275C439.976 120.158 473.699 27.9612 528.768 46.2527C586.354 65.3799 553.355 171.901 601.186 209.238C661.62 256.413 771.993 210.206 817.675 271.776C859.021 327.502 828.938 412.579 798.218 474.797C768.78 534.417 716.658 586.595 652.906 605.484C594.214 622.874 536.952 560.54 476.492 570.12C405.512 581.367 349.639 698.697 287.004 663.462Z" fill="#F5B78A"/>
</svg>

<svg class="svg2" width="367" height="98" viewBox="0 0 367 98" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M189.177 5.82129C218.696 -2.86236 254.955 -3.50847 279.085 15.5945C303.17 34.6615 294.762 73.6069 309.118 100.774C324.815 130.479 363.068 147.68 366.545 181.102C370.139 215.648 352.014 250.959 327.279 275.326C303.246 299 267.821 304.265 234.76 310.924C204.203 317.079 169.341 329.333 143.157 312.413C116.734 295.339 128.114 250.081 105.987 227.714C81.0919 202.547 30.9084 211.507 13.0794 180.919C-4.64714 150.506 -5.76182 103.098 18.4764 77.578C44.4344 50.2466 93.1018 74.6882 127.842 60.0846C153.522 49.2895 162.453 13.6823 189.177 5.82129Z" fill="#455A64"/>
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