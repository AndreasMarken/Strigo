<?php require_once '../shortcuts_php/logincheck.php'; ?>
<!doctype html>
<html lang="nb">
  <head>
    <title>Reekap</title>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/product.css">
    <link rel = "icon" href ="../img/re.png" type ="image/x-icon">
    
  </head>

  <body>

  <header class="header">

    <div class="navigation">
      <ul class="navigation__list">
        <li class="navigation__item navigation__item--reekap"><a href="../index.php"><img src="../img/reekap-logo.png" alt="Reekap"></a></li>
        <li class="navigation__item"><a href="product.php" class="navigation__link">Our product</a></li>
        <li class="navigation__item"><a href="pricing.php" class="navigation__link">Pricing</a></li>
        <li class="navigation__item"><a href="contact.php" class="navigation__link">Contact</a></li>
        <?php if(isset($_SESSION["brukerID"])) {?>
          <li class="navigation__item"><a href="hovedside_innlogget.php" class="navigation__link">Hjem</a></li>
        <?php } elseif (isset($_SESSION["TeacherID"])){?>
          <li class="navigation__item"><a href="teacherloggedin.php" class="navigation__link">Hjem</a></li>
          <?php }?>
      </ul>
    </div>

    <div class="login">
      <ul class="login__list">
        <li class="login__item"><a href="login.php" class="login__link orange active">Sign in</a></li>
        <li class="login__item"><a href="registrer.php" class="login__link">Sign up</a></li>
      </ul>
    </div>
  </header>

  <section class="main u-margin-top">
      <div class="row">
          <div class="col-2-of-3">
            <h1 class="heading-primary">Videos, practice, gamification</h1>
            <p class="paragraph__main u-margin-top">
                The combination of videos, hands on <br>practice and gamification is what makes<br> Reekap so <span class="orange">unique</span>.<br>
                This combination is also scientificly proven <br> to be a more <span class="orange">effective</span> way of learning.
            </p>
          </div>
          <div class="col-1-of-3">
            <img src="../img/bro.png" alt="Picture" class="nerd-picture">
          </div>
      </div>
  </section>

  <div class="buttons u-margin-top--big">
      <a href="#popup" class="btn btn--secondary">Reekap insight</a>
      <a href="login.php" class="btn btn-main">Start learning</a>
  </div>

    <svg class="btm-left" width="529" height="283" viewBox="0 0 529 283" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M249.091 1.95735C311.751 21.6482 285.603 134.293 337.833 174.117C379.643 205.996 462.105 144.365 492.307 187.402C521.127 228.471 440.577 277.911 445.697 327.822C451.784 387.178 553.198 434.503 522.924 485.92C492.503 537.586 405.785 487.946 346.429 496.415C312.372 501.275 282.245 515.812 249.091 524.994C203.657 537.577 158.13 578.94 114.702 560.592C72.6923 542.843 77.9284 479.118 51.8889 441.677C22.6657 399.659 -29.5729 375.877 -47.1874 327.822C-67.6246 272.067 -89.862 200.161 -53.9848 152.841C-16.8686 103.887 66.0153 133.359 121.011 105.98C171.1 81.0433 195.711 -14.8173 249.091 1.95735Z" fill="#455A64"/>
    </svg>

    <a href="#"><img src="../img/image 3.png" class="abs-right--2"></a>
    <a href="#"><img src="../img/image 4.png" class="abs-right"></a>


  <div class="popup" id="popup">
    <div class="popup__content">
        <div class="popup__left">
            <img src="../img/reekap-logo.png" alt="" class="popup__img">
        </div>
        <div class="popup__right">
            <a href="product.php" class="popup__close">&times;</a>
            <h2 class="">Reekap</h2>
            <h3 class="">Important &ndash; This is not yet done</h3>
            <p class="popup__text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis facere consectetur dignissimos, adipisci cupiditate quas dolorum temporibus quibusdam veritatis nihil, facilis doloribus ipsa unde quis assumenda rerum eius blanditiis amet! Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat aspernatur neque natus amet velit sunt sed eos recusandae. Debitis dignissimos culpa ducimus nihil neque quia laborum, commodi aut optio cum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae minus ad quisquam quibusdam corrupti quae atque, facilis dolor nemo! Repudiandae modi reiciendis, placeat repellat perferendis voluptatibus ab ea facere necessitatibus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias labore illum autem sequi. Error nesciunt incidunt reprehenderit culpa earum, velit nulla illum quibusdam non placeat, minima, deserunt ab est odit.
            </p>
            <a href="#" class="btn-main">Order now</a>
        </div>
    </div>
 </div>
  </body>
</html>