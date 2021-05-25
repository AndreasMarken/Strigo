<?php require_once '../shortcuts_php/logincheck.php'; ?>
<!doctype html>
<html lang="nb">
  <head>
    <title>Strigo</title>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/togglemenu.css">

  </head>

  <body>

    <nav class="nav-main">

      <div class="btn-toggle-nav" onclick="toggleNav()"></div>

    </nav>

    <aside class="nav-sidebar">
      <ul>
        <li><span>Navigasjon</span></li>
        <?php
          if (isset($_SESSION["TeacherID"])) {
            echo " <li><a href='../pages/teacherloggedin.php'>Hjemmeside</a></li>";
          } elseif (isset($_SESSION["brukerID"])) {
            echo "<li><a href=''../pages/hovedside_innlogget.php'>Hjemmeside</a></li>";
          }
        ?>
        <li><a href="../index.php">Index</a></li>
        <li><a href="../pages/min_profil.php">Profil</a></li>
        <li><a href='../shortcuts_php/logout.inc.php'>Logg ut</a></li>
      </ul>
    </aside>

  </body>

  <script src="../js/togglemenu.js"></script>

</html>
