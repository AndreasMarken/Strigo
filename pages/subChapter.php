<?php 
require_once '../shortcuts_php/logincheck.php';
require_once '../shortcuts_php/kobling.php';
$id = $_GET["ID"];
$sql_1 = "SELECT * FROM lection WHERE subChapter_id = $id;";
$resultat_1 = $kobling->query($sql_1);

?>

<!doctype html>
<html lang="nb">
  <head>
    <title>Reekap</title>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/subchapter.css">
    <link rel = "icon" href ="../img/re.png" type ="image/x-icon">

  </head>

<body>
  <?php
  if (isset($_SESSION["brukerID"])) { 
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

        <div class="lection">
            <?php 
            while ($rad_1 = $resultat_1->fetch_assoc()){
                $lection_ID = $rad_1["lection_id"];
                $lectionName = $rad_1["name"];
                $videoURL = $rad_1["video_url"];
            
                echo "<a href='lection.php?ID=$lection_ID' class='lection__item'>$lectionName</a>";
    }
    ?>

        </div>

   


    </section> <!-- END main -->


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
