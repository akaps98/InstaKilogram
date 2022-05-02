<?php
if(!isset($_SESSION)) {
    session_start();
}
require_once "../../php/auth-handler.php";
require_once "../../php/upload-handler.php";
$user = getUserById($_SESSION['logged']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/auth/register.css">
</head>
<body>
<header>
    <?php require('../common-share/header.php'); ?>
</header>
<hr size="3">
<main style="margin-top:33px;">
    <!--Sign up-->
    <div class="signupbox">
        <h2 class="fs-4 fw-bold" id="signup_text">User Profile</h2>
            <h2> User: <?= $user[1] ?> </h2>
            <h2> Email: <?= $user[3] ?> </h2>
            <h2> Role: <?= $user[5] ?> </h2>
        <img src="data:image/jpg;charset=utf8;base64,<?php echo $user[6] ?>"/>
        </div>
    </div>
</main>
<!--footer-->
<footer>
    <?php require('../common-share/footer.php'); ?>
</footer>
</body>