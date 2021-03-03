
<div class="header">
    <img src="../bilder/strigo_logo.png" width="100px">
    <h1>Strigo</h1>

<!--Header når logget inn-->
      <?php
        if (isset($_SESSION["brukerID"])) {
            echo "<div class='knapper_innlogget'>";
            echo "  <ul>";
            echo "    <li><a href='../PHP/min_profil.php'>Min profil</a></li>";
            echo "    <li><a href='../shortcuts_php/logout.inc.php'>Logg Ut</a></li>";
            echo "  </ul>";
            echo "</div>";
          }
      ?>
</div>

<!--Header når ikke logget inn-->
      <?php
        if (!isset($_SESSION["brukerID"])) {
            echo "<div class='knapper_ikke_innlogget'>";
            echo "  <ul>";
            echo "    <li><a href='../php/hovedside.php'>Praktisk info</a></li>";
            echo "    <li><a href='../php/bildegalleri.php'>For skolene</a></li>";
            echo "    <li><a href='../php/linkside.php'>For elever</a></li>";
            echo "    <li><a href='../php/gjestebok.php'><img src='../bilder/2.png' height='20px'></a></li>";
            echo "    <li><a href='../PHP/login.php'>Logg inn</a></li>";
            echo "  </ul>";
            echo "</div>";
          }
      ?>




<style>

body {
  background-color: #CFF3F7
}

.header {
  display: flex;
  flex-direction: row;
  background-color: #3F7075;
  margin: -10px;
  margin-bottom: 10px;
  width: 101.4%;
  height: 75px;
}

.knapper_innlogget{
  display: flex;
  justify-content: flex-end;
  margin-right: 20px;
  width: 100%;
  align-items:center;
}

.knapper_ikke_innlogget{
  display: flex;
  justify-content: center;
}


ul {
  list-style-type: none;
  padding: 0;

}

ul li {
  display: inline;

}

ul a {
  width: 240px;
  padding: 5px;
  border-radius: 3px;
  margin: 2px;
  font-weight: bold;
  font-size: 25px;
  text-decoration: none;
  background-color: #3F7075;
  color: white;
}

ul a:hover {
  background-color: #000010;
}

</style>
