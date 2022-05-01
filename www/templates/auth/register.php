<?php
require_once '../../php/auth-handler.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/auth/register.css">
    <script type="text/javascript" src="../../js/register-validators.js"></script>
</head>
<body>
<header>
    <?php require('../common-share/header.php'); ?>
</header>
<hr size="3">
<main style="margin-top:33px;">
    <!--Sign up-->
    <div class="signupbox">
        <h2 class="fs-4 fw-bold" id="signup_text">Sign Up</h2>
        <div class="formbox">
            <form action="register.php" method="post" enctype="multipart/form-data">
                <!--Input email-->
                <div class="input-email">
                    <div class="input-box">
                        <input id="email-ad" name="email-ad" type="email" placeholder="Email address">
                        <label for="email-ad">Email address</label>
                    </div>
                    <?php isValidEmail() ?>
                    <!--check email validation(unique)-->
                </div>
                <div class="input-password">
                    <!--Input password-->
                    <div class="input-box">
                        <input id="password" name="password" type="password" placeholder="Password"
                               onchange="check_pass();">
                        <label for="password">Password</label>
                    </div>
                    <span id="check-pw-len"></span>
                    <!--Recheck password-->
                    <div class="input-box">
                        <input id="password-confirm" name="password-confirm" type="password"
                               placeholder="Check Password" onchange="check_pass();">
                        <label for="password-confirm">Check password</label>
                    </div>
                    <span id="check-password"></span>
                </div>
                <div class="input-box">
                    <p class="d-flex flex-start"> Gender </p>
                    <select class="form-control" id="gender" name="gender">
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                    </select>
                </div>
                <!--upload photo-->
                <div class="upload-pic-button flex-column d-flex flex-start">
                    <p class="d-flex flex-start">Upload Photo</p>
                    <input type="file" id="image" name="image" accept="image/*">
                </div>
                <div class="input-name">
                    <!--input first name-->
                    <div class="input-box">
                        <input id="first-name" name="first-name" type="first-name" placeholder="First name"
                               onchange="check_fname();">
                        <label for="first-name">First name</label>
                    </div>
                    <span id="check-fname"></span>
                    <!--input last name-->
                    <div class="input-box">
                        <input id="last-name" name="last-name" type="last-name" placeholder="Last name"
                               onchange="check_lname();">
                        <label for="last-name">Last name</label>
                    </div>
                    <span id="check-lname"></span>
                </div>
                <a href="<?= navigate('/templates/auth/login.php') ?>"> Already have one account? Login now! </a>
                <h3> <?php register()?></h3>
                <button class="btn btn-primary btn-lg" id="signup" type="submit" onclick="check_signup();">Sign Up
                </button>
            </form>
        </div>
    </div>
</main>
<!--footer-->
<footer>
    <?php require('../common-share/footer.php'); ?>
</footer>
</body>