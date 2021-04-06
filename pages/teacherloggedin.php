<?php  require_once '../shortcuts_php/logincheck.php';
require_once '../shortcuts_php/kobling.php'; ?>
<!doctype html>
<html lang="nb">
  <head>
    <title>Strigo</title>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/hovedside_innlogget.css">

  </head>

  <?php  if (isset($_SESSION["brukerID"])) { ?>

    <?php require_once '../shortcuts_php/header.php';   ?>

<?php } ?>

  </body>

</html>
