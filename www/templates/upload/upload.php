<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once "../../php/upload-handler.php";
getUploadInput();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Upload Image</title>
    <!-- Link CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<header class="header header-container">
    <!--start nav bar -->
    <?php include('../common-share/header.php')?>
    <!--    end nav bar-->
</header>
<main>
    <div class="container-fluid">
    <h2> Create Your New Post</h2>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Your Post Title</label>
            <input name="title" type="text" class="form-control" id="title" required placeholder="What is your post title?">
        </div>
        <div class="form-group">
            <label for="description">Post Description</label>
            <textarea name='description' class="form-control" id="description" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="privacy">Select Your Image Privacy</label>
            <select name="privacy" class="form-control" id="privacy">
                <option value="public">Public</option>
                <option value="private">Private</option>
                <option value="internal">Internal</option>
            </select>
        </div>
        <div class="form-group">
            <label for="image">Your Photo</label>
            <input name="image" required="required" type="file" class="form-control-file" id="image">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
</main>
<footer>
    <?php include('../common-share/footer.php')?>
</footer>
</body>