<?php
require_once __DIR__ . DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."php".DIRECTORY_SEPARATOR."session-handler.php";
require_once __DIR__ .DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."php".DIRECTORY_SEPARATOR."auth-handler.php";
require_once __DIR__ .DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."php".DIRECTORY_SEPARATOR."upload-handler.php";
$otherId = getOtherId('user');
if ($otherId) {
    $user = getUserById($otherId);
} else {
    if (isset($_SESSION['logged'])) {
        $userId = $_SESSION['logged'];
        $user = getUserById($userId);
        handleEditProfileImage($userId, $message);
    }
}

?>

<div class="page-content page-container" id="page-content">
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
              integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
              crossorigin="anonymous">
        <script type="text/javascript" src="../../js/register-validators.js"></script>
        <link rel="stylesheet" href="../../css/profile.css">
    </head>
    <body>
    <header>
        <?php require(__DIR__ .DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'common-share'.DIRECTORY_SEPARATOR.'header.php'); ?>
    </header>
    <main style="margin-top:33px;" class="container d-flex align-items-center flex-column">
        <!--Sign up-->
        <div id="infor-box">
            <div class="profile-pic">
                <div class="d-flex justify-content-center align-items-center">
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo $user[6] ?>" id="profile-image" width="200"
                         data-toggle="modal" data-target="#exampleModal"/>
                </div>
            </div>
            <?php if (!$otherId or $otherId === $_SESSION['logged']): ?>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-primary"><a class="btn-logout" href='<?= navigate("") . DIRECTORY_SEPARATOR . "index.php?logout=true" ?>'> Logout From This
                            User Session </a></button>
                </div>
            <?php else: ?>
                <div id="button-box">
                    <form method="post" action="profile.php?user=<?=$otherId?>" onsubmit="checkResetPassword(event)">
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Reset password</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class= label-field><label for="password">Password</label></div>
                                    <div class="infor-field"><input id="password" name="password" type="password" placeholder="Password" onchange="check_pass();"></div>
                                    <div id="check-valid-pass"></div>
                                    <div class= label-field><label for="password-confirm">Confirm password</label></div>
                                    <div class="infor-field"><input id="password-confirm" name="password-confirm" type="password"
                                placeholder="Check Password" onchange="check_confirm_pass();"></div>
                                    <div id="check-password"></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="reset" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php isValidPassword() ?>
                    </form>
                    
                    <h3> <?php preResetPassword($otherId) ?> </h3>
                    <button data-toggle="modal" data-target="#exampleModal" class="btn btn-warning"> Reset User Password </button>
                </div>
            <?php endif; ?>
                <div>
                    <div>
                        <h2> Your Information </h2>
                        <div>
                            <div class="label-field">
                                <label>User Id</label>
                            </div>
                            <div class="infor-field">
                                <p><?= $user[0] ?></p>
                            </div>
                        </div>

                        <div>
                            <div class="label-field">
                                <label>Email</label>
                            </div>
                            <div class="infor-field">
                                <p><?= $user[3] ?></p>
                            </div>
                        </div>
                        <div>
                            <div class="label-field">
                                <label>Phone</label>
                            </div>
                            <div class="infor-field">
                                <p>No Data</p>
                            </div>
                        </div>
                        <div>
                            <div class="label-field">
                                <label>Role</label>
                            </div>
                            <div class="infor-field">
                                <p><?= $user[5] ?></p>
                            </div>
                        </div>
                        <div>
                            <div class="label-field">
                                <label>Password</label>
                            </div>
                            <div class="infor-field">
                                <p>hidden password</p>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

    </main>
    <!--footer-->
    <footer>
        <?php require(__DIR__ . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'common-share'.DIRECTORY_SEPARATOR.'footer.php'); ?>
    </footer>
    </body>
