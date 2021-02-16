<?php require_once '../shortcuts_php/knapper.php' ; ?>

<div class="signup-form">
  <h2>Registrer</h2>
  <form action="../shortcuts_php/signup.inc.php" method="post">
    <input type="text" name="navn" placeholder="Navn">
    <input type="text" name="email" placeholder="Email">
    <input type="text" name="uid" placeholder="Brukernavn">
    <input type="password" name="pwd" placeholder="Passord">
    <input type="password" name="pwdrepeat" placeholder="Gjenta passord">
    <button type="submit" name="submit">Registrer</button>
  </form>
</div>

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
  else if ($_GET["error"] == "none") {
    echo "<p>Du har nå regisrert deg.</p>";
  }
}
 ?>

      </div> <!-- Body-->

  </body>

</html>
