<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . "csv-handler.php";
require_once __DIR__ . DIRECTORY_SEPARATOR. "navigation-handler.php";
require_once __DIR__ . DIRECTORY_SEPARATOR. "upload-handler.php";

function renderListing($filePath = __DIR__ . DIRECTORY_SEPARATOR . '..'.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'users.csv')
{
    $data = readCSVFile($filePath);
    if (!count($data)) {
        echo '<h5 class="text-center"> Sorry! There is NO user data! </h5>';
        return;
    }
    for ($x = 0; $x < count($data); $x++) {
        echo '<tr>';
        echo '<th scope="row">' . $data[$x][0] . '</th>';
        echo '<th scope="col">' . $data[$x][1] . '</th>';
        echo '<th scope="col">' . $data[$x][3] . '</th>';
        echo '<th scope="col">' . $data[$x][2] . '</th>';
        echo '<th scope="col">' . $data[$x][5] . '</th>';
        if ($filePath === __DIR__ .  DIRECTORY_SEPARATOR . '..' .DIRECTORY_SEPARATOR .'data'. DIRECTORY_SEPARATOR.'users.csv') {
            echo '<th scope="col"> <button type="submit" name="q-email" value="'.$data[$x][3].'">View details</button> </th>';
        }
        echo '</tr>';
    }
}
function directToUserProfile(){
    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        if(isset($_GET['q-email'])){
            $email = $_GET['q-email'];
            $user = getUser(__DIR__ . '\..\data\users.csv', $email);
            $_SESSION['logged'] = $user[0];
            $_SESSION['userType'] = $user[5];
            header("Location: ../user/profile.php");
            exit();
        }
    } 
}
?>