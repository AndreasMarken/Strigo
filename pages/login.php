<?php require_once '../shortcuts_php/logincheck.php'; ?>

<!doctype html>
<html lang="nb">
  <head>
    <title>Strigo</title>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/login.css">

  </head>

  <header class="header">

    <div class="navigation">
      <ul class="navigation__list">
        <li class="navigation__item navigation__item--reekap"><a href="../index.php"><img src="../img/reekap-logo.png" alt="Reekap"></a></li>
      </ul>
    </div>
  
  </header>

    <section class="signin">
      <div class="signin__box">
        <div class="signin-as">
          <a href="" class="signin-as__choice current">Student</a>
          <a href="" class="signin-as__choice inactive">Teacher</a>
        </div>

        <div class="main-content">

          <h1 class="heading-primary u-margin-bottom--medium">Sign in</h1>
        
          <div class="signup-form">
            <form action="../shortcuts_php/login.inc.php" method="post" class="form">
              <div class="inline u-margin-bottom--small">
                <h3 class="heading-tertiary">Username:</h3> &nbsp;
                <input class="signup-form__input" type="text" name="uid">
              </div>
              <div class="inline">
                <h3 class="heading-tertiary">Password:</h3>&nbsp;
                <input class="signup-form__input" type="password" name="pwd">
              </div>
              <div class="littlebox">
                <div class="signin-register">
                  <button type="submit" name="submit" class="btn submit-btn">Sign in</button>
                  <a href="" class="btn btn-secondary">New account</a>
                </div>
                <a href="forgottenPwd.php" class="frgpwd">Forgot your password?</a>
              </div>
        
            </form>
          </div>

          <?php
if (isset($_GET["error"])) {
  if ($_GET["error"] == "emptyinput") {
    echo "<p>Fyll inn alle felt</p>";
  }
  else if ($_GET["error"] == "wronglogin") {
    echo "<p>Feil innlogginsinformasjon</p>";
  }

}
 ?>
        </div>

      </div>
    </section>


  <svg class="topright" viewBox="0 0 343 285" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M289.813 -197.46C331.212 -191.651 341.535 -130.961 376.491 -107.431C408.575 -85.8332 454.567 -94.3513 482.735 -67.5952C513.815 -38.0727 539.715 3.42206 538.985 46.9198C538.256 90.3589 497.993 120.402 478.928 159.175C458.523 200.669 466.397 271.664 422.659 283.483C373.225 296.842 340.405 217.763 289.813 210.278C250.187 204.416 210.435 270.366 177.348 247.193C142.964 223.112 191.547 153.512 163.567 121.858C122.793 75.73 7.84829 108.768 0.321787 46.9198C-6.68665 -10.6709 102.677 -0.0427246 143.908 -39.6874C169.113 -63.9234 164.529 -108.121 188.308 -133.835C216.087 -163.873 249.869 -203.065 289.813 -197.46Z" fill="#F5B78A"/>
  </svg>

  <svg class="midleft" viewBox="0 0 148 505" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M-73.5331 76.1916C-26.3127 50.5539 15.0613 -12.8093 66.6303 2.29801C112.651 15.78 113.062 85.6494 120.416 133.01C126.3 170.896 99.9855 206.821 104.306 244.917C109.454 290.308 152.705 327.103 147.579 372.496C141.921 422.599 123.458 487.62 75.2265 502.416C22.9645 518.448 -20.9426 455.247 -73.5331 440.327C-108.56 430.389 -144.625 436.689 -180.395 429.892C-231.268 420.224 -310.358 440.461 -328.296 391.913C-347.94 338.75 -254.293 301.317 -248.743 244.917C-244.054 197.271 -330.936 151.03 -300.918 113.718C-268.149 72.9857 -198.362 126.673 -146.763 118.157C-118.52 113.496 -98.687 89.8486 -73.5331 76.1916Z" fill="#455A64"/>
  </svg>

  <a href="#"><img src="../img/image 3.png" class="abs-right--2"></a>
  <a href="#"><img src="../img/image 4.png" class="abs-right"></a>


<!--


<div class="storboks">

  <div class="høyreboks studentlogin"  id="studentlogin">

    <div class="logginn-registrer">
      <ul>
        <li ><a class="current" href="login.php">Logg inn</a></li>
        <li><a href="registrer.php">Registrer</a></li>
      </ul>
    </div>

    <ul>
      <li ><a class="current" href="#studentlogin">Logg inn som elev</a></li>
      <li><a href="#teacherlogin">Logg inn som lærer</a></li>
    </ul>

<div class="signup-form">
  <h2>Logg inn</h2>

  <form class="form" action="../shortcuts_php/login.inc.php" method="post">

    <h3>Brukernavn</h3>

      <input type="text" name="uid" placeholder="Brukernavn/Email">

    <h3>Passord</h3>

      <input type="password" name="pwd" placeholder="Passord">

  <div class="submit_knapp">

    <button type="submit" name="submit">Logg inn</button>

    <a href="forgottenPwd.php">Glemt passord?</a>

  </div>
  </form>
</div>

<div class="errormessage">
</div>

 </div>
 <div class="høyreboks teacherlogin" id="teacherlogin">

   <div class="logginn-registrer">
     <ul>
       <li ><a class="current" href="login.php#teacherlogin">Logg inn</a></li>
       <li><a href="registrer.php">Registrer</a></li>
     </ul>
   </div>

   <ul>
     <li ><a href="#studentlogin">Logg inn som elev</a></li>
     <li><a class="current" href="#teacherlogin">Logg inn som lærer</a></li>
   </ul>

<div class="signup-form">
 <h2>Logg inn</h2>

 <form class="form" action="../shortcuts_php/teacherlogin.inc.php" method="post">

   <h3>Brukernavn</h3>

     <input type="text" name="uid" placeholder="Brukernavn/Email">

   <h3>Passord</h3>

     <input type="password" name="pwd" placeholder="Passord">

 <div class="submit_knapp">

   <button type="submit" name="submit">Logg inn</button>

   <a href="forgottenPwd.php">Glemt passord?</a>

 </div>
 </form>
</div>

</div>

</div>

-->

  </body>

</html>
