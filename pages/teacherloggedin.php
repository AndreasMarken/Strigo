<?php  require_once '../shortcuts_php/logincheck.php';
require_once '../shortcuts_php/kobling.php'; ?>
<!doctype html>
<html lang="nb">
  <head>
    <title>Reekap</title>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/teacherloggedin.css">
    <link rel = "icon" href ="../img/re.png" type ="image/x-icon">

  </head>

  <?php  if (isset($_SESSION["TeacherID"])) { 
    require_once '../shortcuts_php/togglemenu.php';
    ?>

<?php
   $sql4 = "SELECT * FROM subject;";
   $resultat3 = $kobling->query($sql4);

   if (!$resultat3) {
   die("Noe gikk galt med spørringen: " . $kobling->error);
   } ?>

  <header class="header">

    <div class="navigation">
      <ul class="navigation__list">
        <li class="navigation__item navigation__item--reekap"><a href="../index.php"><img src="../img/reekap-logo.png" alt="Reekap"></a></li>
      </ul>
    </div>
  
  </header>

  <section class="main">
    <div class="main__content">
      <div class="title">
        <h1 class="heading-primary">
          Your classrooms:
        </h1>
      </div>
      <div class="classrooms">
      <?php
        $userId = $_SESSION["TeacherID"];
        $sql_1 = "SELECT * FROM classroom WHERE teacherId = $userId;";
        $result_1 = $kobling->query($sql_1);
   
        while ($row1 = $result_1->fetch_assoc()) {
          $classroomName = $row1['className'];
          $subjectId = $row1['subjectId'];
          $classroomId = $row1['idClassroom'];
   
          $sql_2 = "SELECT * FROM subject WHERE idSubject = $subjectId;";
          $result_2 = $kobling->query($sql_2);
   
                 while ($row2 = $result_2->fetch_assoc()) {
                    $subject = $row2['subjectName'];
                    echo "<a href='classroom.php?ID=$classroomId' class='classItem'>";
                    if ($subjectId == 1) {
                      echo "<img src='../img/Device  inject 1.png' class='class-img'>";
                    } else {
                      echo "<img src='../img/Device.png' class='class-img'>";
                    }
                    echo "<h3 class='heading-tertiary'>".$subject."</h3>";
                    echo "</a>";
                  }
                }
        
        ?>
      </div>
      <a href="#popup" class="add-classroom">
        <h4 class="heading-four">Add classroom</h4>
      </a>
    </div>
  </section>

  <div class="popup" id="popup">
    <div class="popup__content">
      <div class="add_classroom">
        <form action="../shortcuts_php/create-classroom.inc.php" method="post" class="form">
          <h2 class="heading-secondary">Type in your classroom-code:</h2>
          <input type="text" name="classCode" class="form__input">
          <h2 class="heading-secondary">Classroom name:</h2>
          <input type="text" name="className" class="form__input">
          <h2 class="heading-secondary">Choose a subject:</h2>
          <select name="subject" class="dropdown">
            <?php  while ($rad = $resultat3->fetch_assoc()) { ?>
              <option name="<?php echo $rad["subjectName"]; ?>"><?php echo $rad["subjectName"]; ?></option>
            <?php } ?>
          </select>
          <Button type="submit" name="create_classroom" class="btn-secondary">Create</button>
          </form>
        <a href="teacherloggedin.php" class="popup__close">&times;</a>
      </div>
    </div>
  </div>
  <?php
   if (isset($_GET["error"])) {
     if ($_GET["error"] == "classcode-already-taken") {
       echo "<p>Koden din er allerede i bruk</p>";
     }
   }
   ?>

  <svg class="topright" width="539" height="515" viewBox="0 0 539 515" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M344.031 -11.9822C407.972 -24.126 463.615 -90.4357 525.859 -71.4212C586.398 -52.9277 616.558 17.7763 637.262 77.5949C656.875 134.26 642.54 194.015 638.437 253.838C633.972 318.941 660.226 399.711 612.145 443.831C562.931 488.99 481.875 444.914 416.309 457.666C359.474 468.719 311.992 525.648 255.445 513.204C198.715 500.72 173.403 435.996 132.124 395.127C86.6879 350.141 -6.62911 324.416 0.601788 260.887C8.64514 190.22 120.046 185.68 162.462 128.589C191.665 89.2829 163.042 20.1088 201.761 -9.86771C240.039 -39.5026 296.472 -2.94969 344.031 -11.9822Z" fill="#F5B78A"/>
  </svg>

  <svg class="midleft" height="400" viewBox="0 0 167 578" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M-1.86002 17.762C36.2531 4.75037 83.8022 -15.0327 113.857 18.4977C144.757 52.9719 126.632 120.76 136.773 172.428C144.66 212.612 165.311 246.396 166.725 287.862C168.338 335.145 163.064 382.924 145.356 424.095C125.266 470.805 96.7822 511.231 60.3406 535.207C19.7052 561.943 -31.6418 596.285 -71.0203 566.459C-112.344 535.158 -92.005 442.012 -124.071 395.527C-157.535 347.017 -240.127 366.933 -252.475 303.413C-264.262 242.781 -204.902 197.882 -171.013 154.051C-146.58 122.451 -113.764 109.766 -84.5595 86.2362C-56.2096 63.3942 -34.0236 28.7425 -1.86002 17.762Z" fill="#455A64"/>
  </svg>

  <a href="#"><img src="../img/image 3.png" alt="Instagram logo" class="abs-right--2"></a>
  <a href="#"><img src="../img/image 4.png" alt="Facebook logo" class="abs-right"></a>




   
   


   
   <br> <br> <br><br>

   <form action="../shortcuts_php/generate.inc.php" method="post">
          <Button type="submit" name="submit">Generate</button>
   </form>

    <h2 class="heading-tertiary">Dine koder:</h2>
   <?php
   $sql5 = "SELECT * FROM schoolcode WHERE teacher_id = $userId AND inUse = 0";
   $resultat5 = $kobling->query($sql5);
      while ($rad = $resultat5->fetch_assoc()) {
        $school_code = $rad["school_code"];
        echo $school_code;
        echo "<br>";
      }
    ?>

<?php 

} else {
  header("location:index.php");
  exit();
} ?>

  </body>

</html>
