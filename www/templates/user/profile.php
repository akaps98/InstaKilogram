<?php
if(!isset($_SESSION)) {
    session_start();
}
require_once "../../php/auth-handler.php";
require_once "../../php/upload-handler.php";
$user = getUserById($_SESSION['logged']);
?>

<div class="page-content page-container" id="page-content">
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
    <link rel="stylesheet" href="../../css/profile.css">
</head>
<body>
<header>
    <?php require('../common-share/header.php'); ?>
</header>
<hr size="3">
<main style="margin-top:33px;">
    <!--Sign up-->
    <div class="w3-container">
     <div class="profile-pic">
    <label class="-label" for="file">
      <span class="glyphicon glyphicon-camera"></span>
      <span>Change Image</span>
  </label>
  <input id="file" type="file" onchange="loadFile(event)"/>
  <img src="data:image/jpg;charset=utf8;base64,<?php echo $user[6] ?>" id="output" width="200" />
</div>
      <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $user[0] ?></p>
                                            </div>
                                        </div>
                                       
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $user[3] ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>123 456 7890</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Role</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $user[5] ?></p>
                                            </div>
                                        </div>
                              <div class="row">
                                            <div class="col-md-6">
                                                <label>Password</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>hidden password</p>
                                            </div>
                                        </div>
                            </div>
    </div>
</main>
<!--footer-->
<footer>
    <?php require('../common-share/footer.php'); ?>
</footer>
</body>