<?php 
  session_start();
  $navn = $_SESSION["navn"];
  $email = $_SESSION["email"];
  $brukernavn = $_SESSION["uid"];
?>

<!doctype html>
<html lang="nb">
  <head>
    <title>Strigo</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/register.css">
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
            <input type="radio" name="StudentTeacher" value="student" id="student" checked="checked">
            <label class="label_student" for="student">Student</label>
            <input type="radio" name="StudentTeacher" value="teacher" id="teacher">
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

<a href="#"><img src="../img/image 4.png" class="abs-right"></a>
<a href="#"><img src="../img/image 3.png" class="abs-right--2"></a>

  </body>

</html>
