<?php require_once '../shortcuts_php/knapper.php' ; ?>

<div class="signup-form">
  <h2>Logg inn</h2>
  <form action="../shortcuts_php/login.inc.php" method="post">
    <input type="text" name="uid" placeholder="Brukernavn/Email">
    <input type="password" name="pwd" placeholder="Passord">
    <button type="submit" name="submit">Logg inn</button>
  </form>
</div>
<?php
echo "<a href='registrer.php'>Registrer deg her</a>";
if (isset($_GET["error"])) {
  if ($_GET["error"] == "emptyinput") {
    echo "<p>Fyll inn alle felt</p>";
  }
  else if ($_GET["error"] == "wronglogin") {
    echo "<p>Feil innlogginsinformasjon</p>";
  }

}
 ?>



      </div> <!-- Body-->

  </body>

</html>
