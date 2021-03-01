  <body>

          <div class="body">

            <div class="header">
              <img src="../bilder/strigologo.jfif" width="100px">
              <h1>Strigo</h1>
              <?php
                if (isset($_SESSION["brukerID"])) {
                  echo "<div class='knapper_innlogget'>";
                  echo "<ul>";
                  echo "  <li><a href='../PHP/prfoil.php'>Min profil</a></li>";
                  echo "  <li><a href='../shortcuts_php/logout.inc.php'>Logg Ut</a></li>";
                  echo "  </ul>";
                }
                ?>
            </div>

      <?php
        if (!isset($_SESSION["brukerID"])) {
          echo "<ul>";
          echo "<div class='knapper'>";
          echo "<li><a href='../php/hovedside.php'>Praktisk info</a></li>";
          echo " <li><a href='../php/bildegalleri.php'>For skolene</a></li>";
          echo "<li><a href='../php/linkside.php'>For elever</a></li>";
          echo "<li><a href='../php/gjestebok.php'><img src='../bilder/2.png' height='20px'></a></li>";
          echo "<li><a href='../PHP/login.php'>Logg inn</a></li>";
          echo "  </ul>";
        }
       ?>


  </div>

<style>
.header {
  display: flex;
  flex-direction: row;
  background-color: #3F7075;
  margin: -10px;
  margin-bottom: 10px;
}

.knapper_innlogget{
    display: flex;
    justify-content: flex-end;
    margin-left: 800px;
    align-items:center;
}

body {
  background-color: #CFF3F7
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

.knapper_innlogget ul a {
  width: 240px;
  padding: 5px;
  border-radius: 3px;
  margin: 2px;
  font-weight: bold;
  font-size: 25px;
  text-decoration: none;
  background-color: #69b9c2;
  color: white;
}

ul a:hover {
  background-color: #000010;
}

.knapper{
  display: flex;
  justify-content: center;
}
</style>
