<?php require_once __DIR__ . DIRECTORY_SEPARATOR .'php' . DIRECTORY_SEPARATOR . 'session-handler.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<header class="header header-container">
    <h1> Hello it is my new code </h1>
    <!--start nav bar -->
    <?php require_once '.'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'common-share'.DIRECTORY_SEPARATOR.'header.php' ?>
    <!--    end nav bar-->
</header>
<main>
    <div class="container-fluid">
        <?php require_once '.'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'homepage'.DIRECTORY_SEPARATOR.'homepage.php' ?>
    </div>
</main>
<footer>
    <?php require_once '.'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'common-share'.DIRECTORY_SEPARATOR.'footer.php' ?>
</footer>
</body>
</html>
