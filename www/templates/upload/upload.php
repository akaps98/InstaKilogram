<?php
require_once "../../php/upload-handler.php";
//getUploadInput();
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
echo "run here " . $target_file;
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
echo 'beeeeeee' . $_FILES["fileToUpload"]["tmp_name"];

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
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
            </select>
        </div>
        <div class="form-group">
            <label for="image">Your Photo</label>
            <input name="fileToUpload" required="required" type="file" class="form-control-file" id="fileToUpload">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
</main>
<footer>
    <?php include('../common-share/footer.php')?>
</footer>
</body>