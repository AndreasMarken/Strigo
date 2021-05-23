<?php require_once 'shortcuts_php/logincheck.php'; ?>
<!doctype html>
<html lang="nb">
  <head>
    <title>Strigo</title>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/index.css">

  </head>

  <body>

  <header class="header">

    <div class="navigation">
      <ul class="navigation__list">
        <li class="navigation__item navigation__item--reekap"><a href="index.php"><img src="img/reekap-logo.png" alt="Reekap"></a></li>
        <li class="navigation__item"><a href="pages/product.php" class="navigation__link">Our product</a></li>
        <li class="navigation__item"><a href="pages/pricing.php" class="navigation__link">Pricing</a></li>
        <li class="navigation__item"><a href="pages/contact.php" class="navigation__link">Contact</a></li>
        <?php if(isset($_SESSION["brukerID"])) {?>
          <li class="navigation__item"><a href="pages/hovedside_innlogget.php" class="navigation__link">Hjem</a></li>
        <?php } elseif (isset($_SESSION["TeacherID"])){?>
          <li class="navigation__item"><a href="pages/teacherloggedin.php" class="navigation__link">Hjem</a></li>
          <?php }?>
      </ul>
    </div>

    <div class="login">
      <ul class="login__list">
        <li class="login__item"><a href="pages/login.php" class="login__link orange active">Sign in</a></li>
        <li class="login__item"><a href="pages/registrer.php" class="login__link">Sign up</a></li>
      </ul>
    </div>

  </header>

  <section class="main">

    <div class="row">
      <div class="col-1-of-2 center">
        <img src="img/amico.png" alt="Nerd" class="nerd">
      </div>
      <div class="col-1-of-2">
        <h1 class="heading-primary">Learn <span class="heading-primary orange">smarter</span> with <br>Reekap!</h1> <br>
        <p class="paragraph-main u-margin-top">We make learning faster,<br> easier and funnier for you!</p> <br>
      
        <a href="#" class="btn-main btn--animated btn">Start learing!</a>
      </div>
    </div>

  </section>

  <svg width="414" height="420" viewBox="0 0 414 420" xmlns="http://www.w3.org/2000/svg" class="splash--1">

    <path fill-rule="evenodd" clip-rule="evenodd" d="M486.947 272.5C486.513 310.166 558.228 319.644 559.783 357.281C561.161 390.644 516.711 406.92 493.491 430.916C472.923 452.172 451.169 470.85 429.949 491.454C403.434 517.198 384.617 551.335 351.856 568.436C315.183 587.579 272.885 600.917 231.972 594.797C190.282 588.561 134.737 574.504 122.585 534.14C106.932 482.146 160.829 433.229 167.093 379.292C169.883 355.267 163.521 328.996 148.622 309.944C106.493 256.069 19.9594 235.146 2.63661 168.985C-10.038 120.577 28.2198 40.9748 78.2591 41.2063C157.99 41.5751 196.967 175.181 276.546 170.252C331.558 166.844 305.951 56.8941 350.433 24.3481C388.437 -3.45844 447.795 -7.07016 489.795 14.2258C531.332 35.2867 562.894 85.2457 562.38 131.814C561.787 185.61 487.567 218.705 486.947 272.5Z" fill="#F5B78A"/>
    <a href="#"><img src="img/image 3.png" alt="Instagram logo" class="abs-right--2"></a>
    <a href="#"><img src="img/image 4.png" alt="Facebook logo" class="abs-right"></a>

  </svg>

  </body>
</html>
