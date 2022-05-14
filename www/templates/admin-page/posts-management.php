<?php
require_once __DIR__ . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'php'.DIRECTORY_SEPARATOR.'user-listing-handler.php';
directToUserProfile()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - User management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/auth/register.css">

</head>
<body>
<header>
    <?php require(__DIR__. DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'common-share'.DIRECTORY_SEPARATOR.'header.php'); ?>
</header>

<main style="margin-top:33px;">
    <!--Sign up-->
    <div class="container-fluid table-responsive-sm">
        <form action="posts-management.php" method="get">
        <table class="table">
            <caption>List of Images</caption>
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Posted By</th>
                <th scope="col">Title</th>
                <th scope="col">Privacy</th>
                <th scope="col">Posted Date</th>
            </tr>
            </thead>
            <tbody>
            <?php renderListing(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'posts.csv'); ?>
            </tbody>
        </table>
        </form>
    </div>
</main>
<!--footer-->
<footer>
    <?php require(__DIR__. DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'common-share'.DIRECTORY_SEPARATOR.'footer.php'); ?>
</footer>
</body>