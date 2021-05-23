<?php require_once '../shortcuts_php/logincheck.php'; ?>
<!doctype html>
<html lang="nb">
  <head>
    <title>Strigo</title>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/contact.css">

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
      <h1 class="heading-primary">We would love to hear from you</h1>
      <div class="row u-margin-top-medium">
          <div class="col-1-of-3">
            <div class="bluebox">
                <h2 class="heading-sec">Call us: 22 22 55 55</h2>
                <h2 class="heading-sec">Email: reekap@app.com</h2>
                <h2 class="heading-sec">Visit: Guttas gate 1</h2>
            </div>
          </div>
          <div class="col-2-of-3">
            <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1784.984699618585!2d10.414154916318182!3d63.42397108323495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x466d31bcecce3079%3A0xecf66e56c5b92c26!2sEidsvolls%20gate%2043%2C%207052%20Trondheim!5e0!3m2!1sno!2sno!4v1621677823272!5m2!1sno!2sno" allowfullscreen="" loading="lazy"></iframe>
          </div>
      </div>
  </section>

    <svg class="mid-right" viewBox="0 0 588 820" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M313.858 586.534C289.728 557.289 234.708 573.647 214.585 540.685C193.929 506.85 212.133 456.061 208.035 413.193C201.892 348.948 137.203 275.868 184.505 226.082C235.479 172.432 305.9 265.329 370.313 242.394C425.043 222.907 447.44 110.195 501.511 113.209C552.941 116.076 536.273 212.75 567.168 253.367C595.843 291.066 656.137 292.405 673.248 338.99C691.491 388.654 695.602 458.913 660.433 507.273C623.919 557.484 548.24 528.073 504.565 570.944C452.013 622.529 463.698 758.728 398.867 764.027C332.081 769.487 355.025 636.427 313.858 586.534Z" fill="#F5B78A"/>
    </svg>

    <svg class="btm-left" width="711" height="174" viewBox="0 0 711 174" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M639.278 404.014C638.292 461.155 599.432 524.334 545.522 543.397C489.293 563.28 435.9 492.243 376.435 496.958C325.614 500.987 292.349 583.998 244.18 567.29C197.424 551.072 221.038 470.967 190.131 432.336C154.715 388.067 72.6448 387.047 56.5129 332.718C41.0805 280.744 90.2883 232.534 116.759 185.232C144.269 136.069 158.89 62.9181 214.037 51.2194C272.631 38.7895 311.901 120.575 370.836 131.332C423.765 140.993 483.685 76.8772 527.284 108.394C569.904 139.203 531.77 211.974 550.391 261.128C570.671 314.658 640.265 346.796 639.278 404.014Z" fill="#F5B78A"/>
    </svg>


  <a href="#"><img src="../img/image 3.png" class="abs-right--2"></a>
  <a href="#"><img src="../img/image 4.png" class="abs-right"></a>
  </body>
</html>
