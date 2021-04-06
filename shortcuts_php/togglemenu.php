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
        <li><a href="../pages/hovedside_innlogget.php">Hjemmeside</a></li>
        <li><a href="../pages/htmlogcsskurs.php">HTML + CSS</a></li>
        <li><a href="../pages/javakurs.php">Javascript</a></li>
        <li><a href="../pages/phpogmysqlkurs.php">PHP + Mysql</a></li>
        <li><a href="../pages/min_profil.php">Profil</a></li>
        <li><a href="../pages/404.php">Kontakt oss</a></li>
      </ul>
    </aside>

  </body>

  <script src="../js/togglemenu.js"></script>

</html>
