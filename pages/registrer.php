<?php 
  session_start();
  $StudentTeacher = $_SESSION["StudentTeacher"];
  $navn = $_SESSION["navn"];
  $email = $_SESSION["email"];
  $brukernavn = $_SESSION["uid"];
?>

<!doctype html>
<html lang="nb">
  <head>
    <title>Reekap</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/register.css">
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

  <section class="signin">
    <div class="signin__box">
    <div class="main-content">
  <h1 class="heading-primary u-margin-bottom--medium">Sign up</h1>

  <div class="signup-form">
    <form action="../shortcuts_php/signup.inc.php" method="post">

      <div class="inline u-margin-bottom--small">
          <h3 class="heading-tertiary">I am a:</h3>&nbsp;
            <input type="radio" name="StudentTeacher" value="student" id="student" 
            <?php
            if(empty($StudentTeacher)){echo"checked=\"checked\"";}elseif($StudentTeacher == 'student'){echo"checked=\"checked\"";}
            ?>>
            <label class="label_student" for="student">Student</label>
            <input type="radio" name="StudentTeacher" value="teacher" id="teacher"
            <?php
            if($StudentTeacher == 'teacher'){echo"checked=\"checked\"";}
            ?>>
            <label class="label_teacher" for="teacher">Teacher</label>
       </div> <!-- END inline u-margin-bottom--small -->

      <div class="inline u-margin-bottom--small">
        <h3 class="heading-tertiary">Full name:</h3>&nbsp;
        <div class="center_input">
          <input class="signup-form__input" type="text" name="navn" value="<?php echo"$navn";?>">
        </div> <!-- END center_input -->
      </div> <!-- END inline u-margin-bottom--small -->

      <div class="inline u-margin-bottom--small">
        <h3 class="heading-tertiary">Email:</h3>&nbsp;
        <div class="center_input">
          <input class="signup-form__input" type="text" name="email" value="<?php echo"$email";?>">
        </div> <!-- END center_input -->
      </div> <!-- END inline u-margin-bottom--small -->

      <div class="inline u-margin-bottom--small">
        <h3 class="heading-tertiary">Username:</h3>&nbsp;
        <div class="center_input">
          <input class="signup-form__input" type="text" name="uid" value="<?php echo"$brukernavn";?>">
        </div> <!-- END center_input -->
      </div> <!-- END inline u-margin-bottom--small -->

      <div class="inline u-margin-bottom--small">
        <h3 class="heading-tertiary">Password:</h3>&nbsp;
        <div class="center_input">
          <input class="signup-form__input" type="password" name="pwd">
        </div> <!-- END center_input -->
      </div> <!-- END inline u-margin-bottom--small -->

      <div class="inline">
        <h3 class="heading-tertiary">Repeat password:</h3>&nbsp;
        <div class="center_input">
          <input class="signup-form__input" type="password" name="pwdrepeat">
        </div> <!-- END center_input -->
      </div> <!-- END inline -->
     
      <div class="submit_knapp">
      <button class="btn submit-btn" type="submit" name="submit">Sign up</button>
      </div> <!-- END submit_knapp -->

    </form>
  </div> <!-- END signup-form -->

<div class="errormessage">

<?php
if (isset($_GET["error"])) {
  if ($_GET["error"] == "emptyinput") {
    echo "<p>Fyll inn alle felt</p>";
  }
  else if ($_GET["error"] == "invaliduid") {
    echo "<p>Velg et ordentelig brukernavn</p>";
  }
  else if ($_GET["error"] == "invalidemail") {
    echo "<p>Emailen er allerede i bruk</p>";
  }
  else if ($_GET["error"] == "passwordsdontmatch") {
    echo "<p>Passordene matcher ikke, prøv på nytt</p>";
  }
  else if ($_GET["error"] == "usernametaken") {
    echo "<p>Brukernavnet er allerede i bruk, prøv på et nytt ett.</p>";
  }
  else if ($_GET["error"] == "stmtfailed") {
    echo "<p>Noe gikk galt, prøv på nytt.</p>";
  }
}
 ?>

</div>

    </div> <!-- END main-content -->
    <div> <!-- END signin__box -->
  </section> <!-- END signin -->

<a href="login.php" class="alreadyAcc">Already have an account?</a>

<svg class="svg1" width="255" height="610" viewBox="0 0 255 610" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M-205.754 211.068C-190.768 159.469 -206.711 85.4922 -159.702 59.4591C-117.75 36.2268 -67.7934 85.076 -28.9538 113.158C2.11594 135.622 9.14643 179.595 39.2662 203.317C75.1538 231.582 131.73 226.716 160.393 262.287C192.029 301.548 225.265 360.403 201.86 405.095C176.5 453.523 100.691 440.284 53.0964 467.174C21.3971 485.084 0.509736 515.153 -29.4802 535.8C-72.1326 565.164 -113.374 635.619 -160.501 614.226C-212.109 590.799 -172.855 497.901 -209.043 454.288C-239.615 417.443 -333.593 446.682 -339.005 399.101C-344.912 347.158 -257.664 335.309 -227.427 292.64C-210.876 269.285 -213.737 238.554 -205.754 211.068Z" fill="#455A64"/>
</svg>

<svg class="svg2" width="291" height="725" viewBox="0 0 291 725" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M551.352 213.201C575.295 247.469 537.889 296.363 544.468 337.984C550.507 376.186 588.069 404.06 587.663 442.908C587.215 485.772 574.473 532.998 542.126 562.089C509.824 591.141 460.403 582.124 419.029 594.571C374.75 607.893 328.13 662.012 289.686 638.037C246.237 610.94 281.784 533.049 252.807 490.909C230.11 457.901 154.746 473.713 149.178 433.704C143.392 392.126 227.442 380.295 231.562 338.248C237.566 276.977 135.088 215.316 175.247 167.681C212.641 123.325 279.346 210.639 336.456 213.827C371.369 215.775 400.607 182.316 435.631 182.214C476.545 182.095 528.25 180.137 551.352 213.201Z" fill="#F5B78A"/>
</svg>

<svg class="svg3" width="291" height="231" viewBox="0 0 291 231" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M467.791 -2.24993C482.089 49.5442 534.457 104.173 508.082 150.991C484.544 192.772 416.391 177.375 368.594 173.831C330.359 170.997 301.313 137.241 263.227 132.837C217.848 127.59 172.227 161.401 129.168 146.144C81.6415 129.305 22.4788 96.6195 18.9708 46.2921C15.1696 -8.24135 86.6608 -36.7225 113.085 -84.5777C130.685 -116.45 132.702 -153.007 147.41 -186.313C168.329 -233.683 166.499 -315.301 217.845 -321.798C274.073 -328.913 289.364 -229.228 343.048 -211.07C388.401 -195.73 453.088 -269.908 482.647 -232.232C514.915 -191.101 446.84 -135.26 443.469 -83.072C441.624 -54.5058 460.175 -29.8402 467.791 -2.24993Z" fill="#455A64"/>
</svg>

<a href="#"><img src="../img/image 4.png" class="abs-right"></a>
<a href="#"><img src="../img/image 3.png" class="abs-right--2"></a>

  </body>

</html>
