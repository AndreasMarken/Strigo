<html>
    <head>
        <title>Strigo</title>
        <meta charset="utf-8" />
        <style>
        .flash{
    width: 600px;
    height: 600px;
    display: block;
    margin-top: 150px;
    margin-left: auto;
    margin-right: auto;
    width: 40%;
}

.flash:hover {
    opacity: 1;
    animation: flash 1s;
}

@keyframes flash {
    0% { opacity: .3; }
    100% { opacity: 1;  }
}

        </style>
    </head>
    <body>
        <a href="pages/index.php"><img class="flash" src="student/bilder/strigo_logo.png" /></a>
    </body>
</html>
