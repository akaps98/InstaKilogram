<?php
function validateInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data);
}

function isValidImage($image){

}

?>