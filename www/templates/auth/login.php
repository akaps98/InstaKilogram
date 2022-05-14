<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'php' . DIRECTORY_SEPARATOR . 'session-handler.php';
require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR . '..'.DIRECTORY_SEPARATOR.'php'.DIRECTORY_SEPARATOR.'auth-handler.php';
login();
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
    <?php require_once(__DIR__ . DIRECTORY_SEPARATOR .'..'.DIRECTORY_SEPARATOR.'common-share'.DIRECTORY_SEPARATOR.'header.php'); ?>
</header>

<main style="margin-top:33px;">
    <!--Sign up-->
    <div class="signupbox">
        <h2 class="fs-4 fw-bold" id="signup_text">Login</h2>
        <div class="formbox">
            <form action="login.php" method="post" enctype="multipart/form-data">
                <!--Input email-->
                <div class="input-email">
                    <div class="input-box">
                        <input id="email-add" name="email-add" type="email" placeholder="Email address">
                        <label for="email-add">Email address</label>
                    </div>
                    <!--check email validation(unique)-->
                </div>
                <div class="input-password">
                    <!--Input password-->
                    <div class="input-box">
                        <input id="password" name="password" type="password" placeholder="Password">
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="d-flex flex-column">
                <a href="<?= navigate(__DIR__. DIRECTORY_SEPARATOR.'/templates/auth/register.php') ?>"> Do not have password? Register now! </a>
                <button class="btn btn-primary btn-lg" id="login" type="submit">Login
                </button>
                </div>
            </form>
        </div>
    </div>
</main>
<!--footer-->
<footer>
    <?php require(__DIR__ . DIRECTORY_SEPARATOR .'..'.DIRECTORY_SEPARATOR.'common-share'.DIRECTORY_SEPARATOR.'footer.php'); ?>
</footer>
</body>