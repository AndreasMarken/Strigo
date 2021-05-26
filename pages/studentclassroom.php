<?php 
require_once '../shortcuts_php/logincheck.php';
require_once '../shortcuts_php/kobling.php';

$id = $_GET["ID"];

$sql_1 = "SELECT * FROM classroom WHERE idClassroom = $id;";
$resultat_1 = $kobling->query($sql_1);

while ($rad_1 = $resultat_1->fetch_assoc()) {
  $classroomName = $rad_1["className"];
  $classroomSubjectId = $rad_1["subjectId"];
}

?>

<!doctype html>
<html lang="nb">
  <head>
    <title>Strigo</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/studentclassroom.css">
    <title>Reekap</title>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/studentclassroom.css">
    <link rel = "icon" href ="../img/re.png" type ="image/x-icon">

  </head>

<body>
  <?php
  if (isset($_SESSION["brukerID"])) { 
    require_once '../shortcuts_php/togglemenu.php';

    $sql_2= "SELECT *
    FROM classroom
    JOIN subject ON subject.idsubject = classroom.subjectId
    JOIN chapter ON subject.idSubject = chapter.subjectId
    WHERE classroom.idClassroom = $id";

    $resultat_2 = $kobling->query($sql_2);
    if (!$resultat_2) {
      die("Line 41: " . $kobling->error);
    }
      
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
        <li class="navigation-left__item"><?php echo "<a  href='studentclassroom.php?ID=$id' class='navigation-left__link active'>";?>Lessons</a></li>
        <li class="navigation-left__item"><?php echo "<a  href='#.php?ID=$id' class='navigation-left__link'>";?>Practice</a></li>
        <li class="navigation-left__item"><?php echo "<a  href='#.php?ID=$id' class='navigation-left__link'>";?>Video-library</a></li>
        <li class="navigation-left__item"><?php echo "<a  href='#.php?ID=$id' class='navigation-left__link'>";?>Your notes</a></li>
        <li class="navigation-left__item"><a href="#" class="navigation-left__link">Assignments</a></li>
      </ul>
    </div>
  </nav>


  <section class="right-side">
    <h1 class="heading--primary">
      <?php 
        echo "$classroomName";
      ?>
    </h1>


    <script>

      // for(int i=1;i<=10;i++){  
        
      function myFunction1() {
        var x = document.getElementById("1");
        if (x.style.display === "none") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
        }
      }

      function myFunction2() {
        var x = document.getElementById("2");
        if (x.style.display === "none") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
        }
      }

      function myFunction3() {
        var x = document.getElementById("3");
        if (x.style.display === "none") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
        }
      }

      function myFunction4() {
        var x = document.getElementById("4");
        if (x.style.display === "none") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
        }
      }

      function myFunction5() {
        var x = document.getElementById("5");
        if (x.style.display === "none") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
        }
      }


    // }

    </script>

    <ul class="ulChapter">
    <?php 
    while($row = $resultat_2->fetch_assoc()){
        echo"<li class=\"liChapter\" onclick=\"myFunction$row[chapterId]();\"><a class=\"aChapter\">$row[Name]</a></li>";

        $sql_3="SELECT *
        FROM subchapter
        JOIN chapter ON chapter.chapterId = subchapter.chapter_id
        WHERE chapterId = $row[chapterId]";

        $resultat_3 = $kobling->query($sql_3);
        if (!$resultat_3) {
          die("Line 41: " . $kobling->error);
        }
        echo"<div id=\"$row[chapterId]\" style=\"display:none\" class=\"divSubChapter\"><div class=\"center2\"><ul class=\"ulSubChapter\">";
          while($innerrow = $resultat_3->fetch_assoc()){
            $subChapterID=$innerrow["id"];
            echo"<div class=\"center\">$innerrow[subChapter_name]<br><li class=\"liSubChapter\"><a class=\"aSubChapter\" href=\"subChapter.php?ID=$subChapterID\">Learn</a></li></div>";
          }
        echo"</ul></div></div>";
    }
    ?>
    </ul>


  </section> <!-- END right-side -->
</section> <!-- END main -->

    <!-- <div class="oversiktsmeny"> -->
<?php
//     echo "<div class='fullførtkapitler'>";
//     echo "<img src='../img/bøker.png' width='40px'>";

//     $sql = "SELECT COUNT(classroom_id) AS antall_klasserom FROM participant WHERE student_id = $id";
//     $resultat = $kobling->query($sql);
//     while ($rad = $resultat->fetch_assoc()) {
//         echo "<h3>Antall<br>Klasserom: "."$rad[antall_klasserom]";
//     }

//     echo "</div>";

//     echo "<div class='fullførtoppgaver'>";
//     echo "<img src='../img/task.png' width='50px'>";
//     $id = $_SESSION["brukerID"];
//     $sql = "SELECT COUNT(student_id) AS student_tasks FROM student_or_class_homework WHERE student_id = $id";
//     $resultat = $kobling->query($sql);

//     if (!$resultat) {
//     die("Noe gikk galt med spørringen: " . $kobling->error);
//     }

//     while ($rad = $resultat->fetch_assoc()) {
//          echo "<h3>Antall<br> Lekser: "."$rad[student_tasks]</h3> ";
//     }

//     echo "</div>";

    

// echo"</div>";


// $classroomId = $_GET["ID"];
// $sql_1 = "SELECT * FROM classroom WHERE idClassroom = $classroomId;";
// $resultat_1 = $kobling->query($sql_1);

// if (!$resultat_1) {
// die("Noe gikk galt med spørringen: " . $kobling->error);
// }

// while ($rad = $resultat_1->fetch_assoc()) {
//   $subjectId = $rad["subjectId"];
// }

// if ($subjectId == 1) {
//   echo "<div class='små_bokser'>";
//     echo "<div class='øverste_rad'>";
//       echo "<div class='liten_boks_medtekst'>";
//         echo "<div class='bildene'>";
//           echo "<a href='htmlogcsskurs.php'><img src='../img/html.png' width='100px'></a>";
//           echo "<a href='htmlogcsskurs.php'><img src='../img/css.png' width='100px'></a>";
//         echo "</div>";
//           echo "<a href='htmlogcsskurs.php'><h4>HTML og CSS</h4></a>";
//       echo "</div>";

//       echo "<div class='liten_boks_medtekst'>";
//         echo "<a href='javakurs.php'><img src='../img/js.png' width='150px'></a>";
//         echo "<a href='javakurs.php'><h4>Javascript</h4></a>";
//       echo "</div>";

//       echo "<div class='liten_boks_medtekst'>";
//         echo "<a href='phpogmysqlkurs.php'><img src='../img/php-mysql.png' width='200px'></a>";
//         echo "<a href='phpogmysqlkurs.php'><h4>PHP og Mysql</h4></a>";
//       echo "</div>";
//     echo "</div>";

//   echo "<div class='andre_rad'>";
//     echo "<div class='liten_boks_medtekst'>";
//       echo "<a href=''><img src='../img/spørsmålstegn.png' width='100px'></a>";
//       echo "<a href=''><h4>Quiz og oppgaver</h4></a>";
//     echo "</div>";

//     echo "<div class='liten_boks_medtekst'>";
//       echo "<a href=''><img src='../img/forstørrelsesglass.png' width='100px'></a>";
//       echo "<a href=''><h4>Oppslagsverk</h4></a>";
//     echo "</div>";

//     echo "<div class='liten_boks_medtekst'>";
//       echo "<a href=''><img src='../img/x.png' width='100px'></a>";
//       echo "<a href=''><h4>Feilsøker</h4></a>";
//     echo "</div>";
//   echo "</div>";
// echo "</div>";
// } else {
//   echo "Faget ditt finnes ikke for nettsiden enda";
// }
?>
<svg class="svg1" width="658" height="836" viewBox="0 0 658 836" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M287.003 663.462C224.12 628.087 280.624 523.202 267.104 452.329C258.763 408.608 233.016 372.504 223.215 329.087C209.541 268.505 158.487 195.761 198.461 148.23C239.277 99.6969 323.937 155.983 384.53 137.275C439.975 120.158 473.699 27.9612 528.768 46.2527C586.353 65.3799 553.355 171.901 601.186 209.238C661.62 256.413 771.993 210.206 817.675 271.776C859.021 327.502 828.938 412.579 798.217 474.797C768.78 534.417 716.658 586.595 652.906 605.484C594.213 622.874 536.952 560.54 476.491 570.12C405.511 581.367 349.639 698.697 287.003 663.462Z" fill="#F5B78A"/>
</svg>

<svg class="svg2" width="367" height="98" viewBox="0 0 367 98" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M189.177 5.82129C218.696 -2.86236 254.955 -3.50847 279.085 15.5945C303.17 34.6615 294.762 73.6069 309.118 100.774C324.815 130.479 363.068 147.68 366.545 181.102C370.139 215.648 352.014 250.959 327.279 275.326C303.246 299 267.821 304.265 234.76 310.924C204.203 317.079 169.341 329.333 143.157 312.413C116.734 295.339 128.114 250.081 105.987 227.714C81.0919 202.547 30.9084 211.507 13.0794 180.919C-4.64714 150.506 -5.76182 103.098 18.4764 77.578C44.4344 50.2466 93.1018 74.6882 127.842 60.0846C153.522 49.2895 162.453 13.6823 189.177 5.82129Z" fill="#455A64"/>
</svg>
<?php
}
else {
 header("location: login.php");
 exit();
}?>



</body>

</html>
