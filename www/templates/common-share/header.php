<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once __DIR__ . "/../../php/auth-handler.php";
include_once __DIR__ . "/../../php/navigation-handler.php";
if (isset($_GET['logout'])) {
    destroyUserSession();
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light position-fixed" style="width: 100vw; z-index: 100">
    <a class="navbar-brand" href="#">Instakilogram</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" >
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?= navigate('') ?>">Home <span class="sr-only">(current)</span></a>
            </li>
            <?php if (!array_key_exists( 'logged', $_SESSION)): ?>
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Authentication
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= navigate('/templates/auth/login.php') ?>">Login</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= navigate('/templates/auth/register.php') ?>">Register</a>
                    </div>
                </li>
            <?php else: ?>
                <a class="nav-link" href="<?= navigate('/templates/user/profile.php') ?>">My Account</a>
                <li class="nav-item">
                    <a class="nav-link" href="<?= navigate('/templates/upload/upload.php') ?>">Upload</a>
                </li>
                <?php if ($_SESSION['userType'] === 'admin'): ?>
                    <a class="nav-link" href="<?= navigate('/templates/admin-page/user-management.php') ?>">User Management</a>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= navigate('/templates/admin-page/posts-management.php') ?>">Image Management</a>
                    </li>
                <?php else: ?>
                <?php endif; ?>
            <?php endif; ?>
        </ul>
        <ul class="navbar-nav">
            <?php if (!array_key_exists( 'logged', $_SESSION)): ?>
                <li class="nav-item"></li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href='<?= navigate("") . "/index.php?logout=true" ?>'>Logout</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
<br>
<br>
