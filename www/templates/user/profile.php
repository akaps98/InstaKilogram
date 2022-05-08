<?php
require_once __DIR__ . DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."php".DIRECTORY_SEPARATOR."session-handler.php";
require_once __DIR__ .DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."php".DIRECTORY_SEPARATOR."auth-handler.php";
require_once __DIR__ .DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."php".DIRECTORY_SEPARATOR."upload-handler.php";
$otherId = getOtherId('user');
$message = '';
if ($otherId) {
    $user = getUserById($otherId);
} else {
    if (isset($_SESSION['logged'])) $user = getUserById($_SESSION['logged']);
}
if (isset($_POST['reset'])) {
    resetOtherPassword($otherId, $message);
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
        <link rel="stylesheet" href="../../css/auth/register.css">
        <link rel="stylesheet" href="../../css/profile.css">
    </head>
    <body>
    <header>
        <?php require(__DIR__ .DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'common-share'.DIRECTORY_SEPARATOR.'header.php'); ?>
    </header>
    <hr size="3">
    <main style="margin-top:33px;" class="row">
        <!--Sign up-->
        <div class="col-sm-12 col-md-6">
            <div class="profile-pic">
                <div class="d-flex justify-content-center align-items-center">
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo $user[6] ?>" id="profile-image" width="200"
                         data-toggle="modal" data-target="#exampleModal"/>
                </div>
            </div>
            <div class="container">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="text-center" role="tabpanel" aria-labelledby="home-tab">
                        <h2> Your Information </h2>
                        <div class="container row">
                            <div class="col-sm-12 col-md-6">
                                <label>User Id</label>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <p><?= $user[0] ?></p>
                            </div>
                        </div>

                        <div class="container row">
                            <div class="col-sm-12 col-md-6">
                                <label>Email</label>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <p><?= $user[3] ?></p>
                            </div>
                        </div>
                        <div class="container row">
                            <div class="col-sm-12 col-md-6">
                                <label>Phone</label>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <p>No Data</p>
                            </div>
                        </div>
                        <div class="container row">
                            <div class="col-sm-12 col-md-6">
                                <label>Role</label>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <p><?= $user[5] ?></p>
                            </div>
                        </div>
                        <div class="container row">
                            <div class="col-sm-12 col-md-6">
                                <label>Password</label>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <p>hidden password</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img src="data:image/jpg;charset=utf8;base64,<?php echo $user[6] ?>" id="output"
                                     width="200"/>
                                <input id="file" type="file" onchange="loadFile(event)"/>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if (!$otherId or $otherId === $_SESSION['logged']): ?>
        <div class="col-sm-12 col-md-6">
            <button class="btn btn-primary"><a class="btn-logout" href='<?= navigate("") . DIRECTORY_SEPARATOR . "index.php?logout=true" ?>'> Logout From This
                    User Session </a></button>
        </div>
        <?php else: ?>
        <div class="col-sm-12 col-md-6">
            <h3> <?php echo $message ?> </h3>
            <form method="post" action="profile.php?user=<?=$otherId?>">
            <button class="btn btn-warning"  type="submit" name="reset"> Reset User Password </button>
            </form>
        </div>
        <?php endif; ?>
    </main>
    <!--footer-->
    <footer>
        <?php require(__DIR__ . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'common-share'.DIRECTORY_SEPARATOR.'footer.php'); ?>
    </footer>
    </body>