<?php require_once '../shortcuts_php/logincheck.php';
require_once '../shortcuts_php/kobling.php'; 

$id = $_GET["ID"];

$sql_1 = "SELECT * FROM lection WHERE lection_id = $id;";
$resultat_1 = $kobling->query($sql_1);

while ($rad_1 = $resultat_1->fetch_assoc()) {
  $video = $rad_1["video_url"];
}

$sql_2 = "SELECT * FROM lectionKeyPoint WHERE lectionId = $id;";
$resultat_2 = $kobling->query($sql_2);

while ($rad_2 = $resultat_2->fetch_assoc()) {
  $content = $rad_2["content"];
}
?>
<!doctype html>
<html lang="nb">
  <head>
    <title>Reekap</title>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/lection.css">
    <link rel = "icon" href ="../img/re.png" type ="image/x-icon">

</head>
<?php  if (isset($_SESSION["brukerID"])) { 
  require_once '../shortcuts_php/togglemenu.php';
  ?>

<body>

  <header class="header">

    <div class="navigation">
      <ul class="navigation__list">
        <li class="navigation__item navigation__item--reekap"><a href="../index.php"><img src="../img/reekap-logo.png" alt="Reekap"></a></li>
      </ul>
    </div>
  
  </header>

  <section class="main">
      <div class="videobox">
        <?php
        echo $video;
        ?>
      </div>
      <div class="notebox">
            <h1 class="heading-primary">
                Key points
            </h1>
            <p class="paragraph-main">
              <?php
                echo $content;
              ?>
            </p>
      </div>
  </section>

  <nav class="navigation-2">
    <ul class="navigation__list-2">
        <li class="navigation__item-2 active left"><a class="link active" <?php echo "href='lection.php?ID=$id'"; ?> >Video</a></li>
        <li class="navigation__item-2"><a class="link" <?php echo "href='lectionnotes.php?ID=$id'"; ?>>Notes</a></li>
        <li class="navigation__item-2"><a class="link" <?php echo "href='lectiontest.php?ID=$id'"; ?>>Test</a></li>
        <li class="navigation__item-2 right"><a class="link" <?php echo "href='lectiontask.php?ID=$id'"; ?>>Task</a></li>
    </ul>
  </nav>

  <svg class="topright" viewBox="0 0 235 192" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M306.886 -377.717C356.17 -367.292 400.234 -345.947 442.831 -319.058C485.757 -291.961 529.837 -264.894 555.239 -220.943C582.047 -174.562 584.072 -120.424 588.492 -67.0355C594.111 0.826538 627.813 80.4879 584.548 133.071C541.487 185.406 456.791 164.872 389.712 174.555C332.721 182.783 276.345 200.846 220.823 185.579C164.789 170.172 107.962 140.107 79.7198 89.3166C52.6503 40.6347 88.9586 -20.1284 76.2801 -74.3681C61.684 -136.811 -9.48351 -183.937 1.06113 -247.19C11.5749 -310.258 69.3606 -360.518 128.167 -385.617C184.146 -409.509 247.34 -390.312 306.886 -377.717Z" fill="#263238"/>
  </svg>
  <svg class="midleft" viewBox="0 0 85 637" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M-197.143 1.0965C-126.683 15.1133 -143.526 136.02 -88.4207 182.112C-44.4848 218.861 42.0704 179.837 73.6705 227.61C103.892 273.299 47.0638 331.563 46.6688 386.341C46.1808 454.006 112.103 529.892 71.1027 583.722C31.017 636.352 -56.3058 598.821 -121.874 607.627C-175.497 614.829 -228.993 650.918 -279.207 630.771C-329.013 610.787 -347.731 551.763 -375.524 505.854C-398.836 467.346 -414.058 427.227 -428.285 384.52C-445.711 332.21 -486.904 279.359 -468.261 227.471C-449.692 175.791 -379.892 167.71 -337.739 132.514C-287.479 90.548 -261.361 -11.6788 -197.143 1.0965Z" fill="#F5B78A"/>
  </svg>


  <a href="#"><img src="../img/image 3.png" alt="Instagram logo" class="abs-right--2"></a>
  <a href="#"><img src="../img/image 4.png" alt="Facebook logo" class="abs-right"></a>


</body>



<?php } else {
 header("location: login.php");
 exit();
}?>

</html>
