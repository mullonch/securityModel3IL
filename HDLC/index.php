<!DOCTYPE html>
<?php
    $_pdo = new PDO ("mysql:host=127.0.0.1;dbname=injectionSQL;charset=utf8", "root", "");
?>
<html lang="en">

<head>
    <title>Website presentation</title>
    <meta charset="utf-8" />

    <link type="text/css" rel="stylesheet" href="node_modules/normalize.css/normalize.css" crossorigin="anonymous" />
    <link type="text/css" rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css" crossorigin="anonymous" />
    <link type="text/css" rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css" crossorigin="anonymous" />
    <link type="text/css" rel="stylesheet" href="css/style.css" crossorigin="anonymous" />
</head>

<body>
    

    <?php
        include_once './views/header.php';
        include_once './views/main_container.php';
    ?>



    <script type="application/javascript" src="node_modules/jquery/dist/jquery.min.js" crossorigin="anonymous"></script>
    <script type="application/javascript" src="node_modules/jquery-easing/dist/jquery.easing.1.3.umd.min.js" crossorigin="anonymous"></script>
    <script type="application/javascript" src="node_modules/popper.js/dist/popper.min.js" crossorigin="anonymous"></script>
    <script type="application/javascript" src="node_modules/bootstrap/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    
    <script type="application/javascript" src="js/index.js" crossorigin="anonymous" defer></script>
    <script type="application/javascript" src="js/genetic.js" crossorigin="anonymous" defer></script>

    <script type="application/javascript" src="js/script.js"></script>
</body>

</html>