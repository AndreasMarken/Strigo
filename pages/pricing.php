<?php require_once '../shortcuts_php/logincheck.php'; ?>
<!doctype html>
<html lang="nb">
  <head>
    <title>Strigo</title>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/pricing.css">

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
<section class="section-cards u-margin-top-medium" id="section-cards">

 <div class="row">
    <div class="col-1-of-3">
        <div class="card">
            <div class="card__side card__side--front card__side--front-1">
                <h4 class="card__heading">
                    <span class="card__heading-span card__heading-span--1">
                        Reekap basic
                    </span>
                </h4>
                <div class="card__details card__details--1">
                    <ul>
                        <li>30 student-users</li>
                        <li>2 teacher-users</li>
                        <li>1 classroom</li>
                        <li>24/7 support</li>
                    </ul>
                </div>
                <p class="card__price-value--front u-center-text">$ 25, -/user</p>
            </div>
            <div class="card__side card__side--back card__side--back-1">
                <div class="card__cta">
                    <div class="card__price-box">
                        <p class="card__price-only">Only</p>
                        <p class="card__price-value">$25,-/user</p>
                    </div>
                    <a href="#popup" class="btn btn-main btn-main--1">Read more!</a>
                </div>
            </div>
        </div>
    </div>
 <div class="col-1-of-3">
     <div class="card">
        <div class="card__side card__side--front card__side--front-2">
            <h4 class="card__heading">
                <span class="card__heading-span card__heading-span--2">
                    Reekap Standard
                </span>
            </h4>
            <div class="card__details card__details--2">
                <ul>
                    <li>90 student-users</li>
                    <li>10 teacher-users</li>
                    <li>Unlimited classroom</li>
                    <li>24/7 support</li>
                </ul>
            </div>
            <p class="card__price-value--front u-center-text">$20,-/user</p>
        </div>
        <div class="card__side card__side--back card__side--back-2">
            <div class="card__cta">
                <div class="card__price-box">
                    <p class="card__price-only">Only</p>
                    <p class="card__price-value">$20,-/user</p>
                </div>
                <a href="#popup" class="btn btn-main btn-main--2">Read more!</a>
            </div>
        </div>
    </div>
 </div>
 <div class="col-1-of-3">
    <div class="card">
        <div class="card__side card__side--front card__side--front-3">
            <h4 class="card__heading">
                <span class="card__heading-span card__heading-span--3">
                    Reekap Pro
                </span>
            </h4>
            <div class="card__details card__details--3">
                <ul>
                    <li>500 student-users</li>
                    <li>50 teacher-users</li>
                    <li>Unlimited classroom</li>
                    <li>24/7 support</li>
                </ul>
            </div>
            <p class="card__price-value--front u-center-text">$15,-/user</p>
        </div>
        <div class="card__side card__side--back card__side--back-3">
            <div class="card__cta">
                <div class="card__price-box">
                    <p class="card__price-only">Only</p>
                    <p class="card__price-value">$15,-/user</p>
                </div>
                <a href="#popup" class="btn btn-main btn-main--3">Read more!</a>
            </div>
        </div>
    </div>
 </div>
</div>

 <div class="u-center-text u-margin-top-huge u-margin-bottom-medium">
    <a href="#" class="btn btn-main">Order Now</a>
 </div> 

 </section>

 <svg class="btm-left" width="405" height="354" viewBox="0 0 405 354" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M309.28 492C285.569 508.425 233.424 478.542 192.619 466.738C160.478 457.44 129.107 445.034 95.7067 430.218C54.5497 411.96 10.7514 405.733 -25.9717 369.769C-63.0434 333.463 -79.5577 287.304 -90.3708 247.985C-100.483 211.215 -90.1049 185.208 -84.7346 156.097C-78.977 124.886 -93.819 69.4476 -57.7831 71.332C-18.4003 73.3915 29.2711 145.022 74.6814 164.433C113.643 181.087 137.326 139.674 174.513 170.627C211.542 201.449 192.389 243.333 216.005 282.067C239.235 320.167 290.006 349.787 306.819 387.628C325.324 429.279 332.828 475.688 309.28 492Z" fill="#455A64"/>
</svg>

<svg class="mid-right" width="89" height="459" viewBox="0 0 89 459" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M133 27.7445C159.214 33.4008 185.805 31.3152 209.71 47.0806C235.808 64.2915 259.712 88.0391 275.206 121.528C292.046 157.926 306.841 201.123 300.502 243.318C294.234 285.042 260.709 305.595 242.382 340.032C221.754 378.796 220.618 449.22 186.181 458.142C150.494 467.388 129.782 399.326 97.0898 377.675C71.8882 360.985 37.0271 374.787 17.9613 346.736C-1.14334 318.628 -1.30388 274.58 1.02052 236.33C3.05258 202.892 24.6618 178.821 30.1528 146.118C37.7478 100.886 13.0229 40.1212 38.9828 10.2421C63.6845 -18.1889 101.112 20.8641 133 27.7445Z" fill="#F5B78A"/>
</svg>


<div class="popup" id="popup">
    <div class="popup__content">
        <div class="popup__left">
            <img src="../img/reekap-logo.png" alt="" class="popup__img">
        </div>
        <div class="popup__right">
            <a href="#section-tours" class="popup__close">&times;</a>
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
