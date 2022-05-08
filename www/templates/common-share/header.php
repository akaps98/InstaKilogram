<?php
require_once __DIR__ . DIRECTORY_SEPARATOR. "..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."php".DIRECTORY_SEPARATOR."session-handler.php";
require_once __DIR__ . DIRECTORY_SEPARATOR. "..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."php".DIRECTORY_SEPARATOR."auth-handler.php";
require_once __DIR__ . DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."php".DIRECTORY_SEPARATOR."navigation-handler.php";
if (isset($_GET['logout'])) {
    destroyUserSession();
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light position-fixed" style="width: 100vw; z-index: 100">
    <a class="navbar-brand" href="#">Instakilogram</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?=navigate('')?>">Home <span class="sr-only">(current)</span></a>
            </li>
            <?php if (!isset($_SESSION['logged'])): ?>
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Authentication
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= navigate(DIRECTORY_SEPARATOR. 'templates'.DIRECTORY_SEPARATOR.'auth'.DIRECTORY_SEPARATOR.'login.php') ?>">Login</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= navigate(DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'auth'.DIRECTORY_SEPARATOR.'register.php') ?>">Register</a>
                    </div>
                </li>
            <?php else: ?>
                <a class="nav-link" href="<?= navigate(DIRECTORY_SEPARATOR .'templates'.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR.'profile.php') ?>">My Account</a>
                <li class="nav-item">
                    <a class="nav-link" href="<?= navigate(DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'upload'.DIRECTORY_SEPARATOR.'upload.php') ?>">Upload</a>
                </li>
                <?php if ($_SESSION['userType'] === 'admin'): ?>
                    <a class="nav-link" href="<?= navigate(DIRECTORY_SEPARATOR. 'templates'.DIRECTORY_SEPARATOR.'admin-page'.DIRECTORY_SEPARATOR.'user-management.php') ?>">User
                        Management</a>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= navigate(DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'admin-page'.DIRECTORY_SEPARATOR.'posts-management.php') ?>">Image
                            Management</a>
                    </li>
                <?php else: ?>
                <?php endif; ?>

            <?php endif; ?>
        </ul>
        <ul class="navbar-nav">
            <?php if (!isset($_SESSION['logged'])): ?>
                <li class="nav-item"></li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href='<?= navigate("") . DIRECTORY_SEPARATOR."index.php?logout=true" ?>'>Logout</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
<br>
<br>
