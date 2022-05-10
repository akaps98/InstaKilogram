<?php
require_once __DIR__. DIRECTORY_SEPARATOR. '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'php' . DIRECTORY_SEPARATOR . 'session-handler.php';
require_once __DIR__. DIRECTORY_SEPARATOR.'..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'php' . DIRECTORY_SEPARATOR . 'navigation-handler.php';
require_once __DIR__. DIRECTORY_SEPARATOR.'..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'php' . DIRECTORY_SEPARATOR . 'auth-handler.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/footer.css" type="text/css">
    <link rel="stylesheet" href="../../css/about.css" type="text/css">
</head>
<body>
    <header>
        <?php include('./templates/common-share/header.php')?>
    </header>
    <div class="about_text">
        <h1>ABOUT US</h1>
    </div>
    <main>
        <div class="about_contents">
            <div class="content">
                <h2>Jun Sik Kang</h2>
                <div class="profile_pic">
                    <img src="../../assets/junsik.jpg">
                </div>
                <ul>
                  <li>Date of Birth: 02/03/1998</li>
                  <li>Student ID: S3916884</li>
                  <li>Hobbies: Online Games | Watching Baseball</li>
                </ul>
            </div>
        </div>
        <div class="about_contents">
            <div class="content">
                <h2>Vo Gia Bao</h2>
                <div class="profile_pic">
                    <img src="../../assets/Bao.png">
                </div>
                <ul>
                  <li>Date of Birth: 29/02/2000</li>
                  <li>Student ID: S3823477</li>
                  <li>Hobbies: Listening Rap Music | Karoake Party</li>
                </ul>
            </div>
        </div>
        <div class="about_contents">
            <div class="content">
                <h2>Hoang Duc Phuong</h2>
                <div class="profile_pic">
                    <img src="../../assets/phuong.png">
                </div>
                <ul>
                  <li>Date of Birth: 06/02/2001</li>
                  <li>Student ID: S3885751</li>
                  <li>Hobbies: Playing tennis | Playing soccer</li>
                </ul>
            </div>
        </div>
        <div class="about_contents">
            <div class="content">
                <h2>Vu Viet Minh</h2>
                <div class="profile_pic">
                    <img src="../../assets/">
                </div>
                <ul>
                  <li>Date of Birth: 02/03/1998</li>
                  <li>Student ID: S3790708</li>
                  <li>Hobbies: Online Games | Watching Baseball</li>
                </ul>
            </div>
        </div>
    </main>
    <footer>
        <?php include('./templates/common-share/footer.php')?>
    </footer>
</body>
</html>