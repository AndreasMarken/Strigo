<?php require_once '../shortcuts_php/logincheck.php'; ?>

<!doctype html>
<html lang="nb">
  <head>
    <title>Strigo</title>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/login.css">

  </head>

<?php require_once '../shortcuts_php/header.php' ; ?>

<div class="storboks">

  <div class="venstreboks">

    <div class="Logg_inn_med">
      <h2>Logg inn med:</h2>
      <a href="404.php"><img src="../bilder/google.png" width="200px"></a>
      <a href="404.php"><img src="../bilder/facebook.png" width="100px"></a>
      <a href="404.php"><img src="../bilder/feide.png" width="200px"></a>
    </div>

  </div>

  <div class="høyreboks">

    <div class="logginn-registrer">
      <ul>
        <li ><a class="current" href="login.php">Logg inn</a></li>
        <li><a href="registrer.php">Registrer</a></li>
      </ul>
    </div>

<div class="signup-form">
  <h2>Logg inn</h2>

  <form class="form" action="../shortcuts_php/login.inc.php" method="post">

    <h3>Brukernavn</h3>

      <input type="text" name="uid" placeholder="Brukernavn/Email">

    <h3>Passord</h3>

      <input type="password" name="pwd" placeholder="Passord">

  <div class="submit_knapp">

    <button type="submit" name="submit">Logg inn</button>

    <a href="forgottenPwd.php">Glemt passord?</a>

  </div>
  </form>
</div>

<div class="errormessage">

<?php
if (isset($_GET["error"])) {
  if ($_GET["error"] == "emptyinput") {
    echo "<p>Fyll inn alle felt</p>";
  }
  else if ($_GET["error"] == "wronglogin") {
    echo "<p>Feil innlogginsinformasjon</p>";
  }

}
 ?>


</div>

 </div>

</div>


  </body>

</html>
