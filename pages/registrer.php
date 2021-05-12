<!doctype html>
<html lang="nb">
  <head>
    <title>Strigo</title>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/register.css">

  </head>
  <body>

<?php require_once '../shortcuts_php/header.php' ; ?>

<div class="studentsignup" id="studentregister">

<div class="bigContainer" id="studentregister">

<div class="mainContainer">

  <div class="signup-form">
    <h2>Registrering</h2>
    <form action="../shortcuts_php/signup.inc.php" method="post">

      <h3>Hva registrerer du deg som?</h3>
      <label for="StudentTeacher">Elev:    </label>
      <input type="radio" name="StudentTeacher" value="student"><br>
      <label for="StudentTeacher">Lærer:</label>
      <input type="radio" name="StudentTeacher" value="teacher">
      <h3>Navn:</h3><input type="text" name="navn" placeholder="Navn">
      <h3>Email:</h3><input type="text" name="email" placeholder="Email">
      <h3>Brukernavn:</h3><input type="text" name="uid" placeholder="Brukernavn">
      <h3>Passord:</h3><input type="password" name="pwd" placeholder="Passord">
      <h3>Gjenta passordet:</h3><input type="password" name="pwdrepeat" placeholder="Gjenta passord">

      <div class="submit_knapp">

      <button type="submit" name="submit">Registrer</button>

    </div>

    </form>
  </div>

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

</div>

</div>

</div>

<?php require_once '../shortcuts_php/footer.php' ; ?>

  </body>

</html>
