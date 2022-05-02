<?php
require_once __DIR__. "/input-handler.php";
require_once __DIR__. "/csv-handler.php";
function getUploadInput()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $filePath = __DIR__ . DIRECTORY_SEPARATOR . '..'.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'posts.csv';
        $title = validateInput($_POST['title']);
        $description = validateInput($_POST['description']);
        $privacy = validateInput($_POST['privacy']);
        $image = getImage();
        $pid = getNextRow($filePath);
        $date   = new DateTime();
        $createdDate = $date->format('d-m-Y:H-i-s');
        $uid = $_SESSION['logged'];
        if ($title && $description && $privacy && $image){
            writeToFile($filePath, [$pid, $uid, $privacy, $title, $description, $createdDate, $image]);
        } else {
            echo $title;
            echo $description;
            echo $privacy;
            echo $image;
        }
    }
}


function getImage(){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $image = file_get_contents($_FILES["image"]["tmp_name"]);
        return convertImageToBinary($image);
    }
}


function convertImageToBinary($image){
    return base64_encode($image);
}

function convertBinaryToImageUrl($binary, $type="image/png")
{
    echo $binary;
    $contents = file_get_contents($binary);
    $base64 = base64_encode($contents);

    return ('data:' . $type . ';base64,' . $base64);
}


?>