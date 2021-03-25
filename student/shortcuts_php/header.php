
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
            echo "    <li><a href=''>Praktisk info</a></li>";
            echo "    <li><a href=''>For skolene</a></li>";
            echo "    <li><a href=''>For elever</a></li>";
            echo "    <li><a href='../PHP/login.php'>Logg inn</a></li>";
            echo "    <li><a href='../../teacher/PHP/teachermainpage.php'>Til lærersiden</a></li>";
            echo "  </ul>";
            echo "</div>";
          }
      ?>




<style>

body {
  background-color: #CFF3F7;
  margin: 0;
}

.header {
  display: flex;
  flex-direction: row;
  background-color: #3F7075;
  margin-bottom: 10px;
  height: 75px;
  padding-bottom: 5px;

}

.header img {
  margin:3px;
}

.header h1 {
  color: black;
  text-decoration: none;
  display: flex;
  align-items: center;
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


.knapper_innlogget ul, .knapper_ikke_innlogget ul{
  list-style-type: none;
  padding: 0;

}

.knapper_innlogget ul li, .knapper_ikke_innlogget ul li{
  display: block;
  float: left;

}

ul a {
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
