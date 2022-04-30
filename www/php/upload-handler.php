<?php

function getUploadInput()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $privacy = $_POST['privacy'];
        $image = $_POST['image'];
        if (empty($image)) {
            echo "image is empty";
        } else {
            echo base64_encode($image);
        }
    }

}


function convertImageToBinary($image){
    return base64_encode($image);
}

function convertBinaryToImageUrl($binary, $type="image/png")
{
    $contents = file_get_contents($binary);
    $base64 = base64_encode($contents);
    return ('data:' . $type . ';base64,' . $base64);
}


?>