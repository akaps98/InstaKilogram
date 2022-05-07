<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . "csv-handler.php";
require_once __DIR__ . DIRECTORY_SEPARATOR. "navigation-handler.php";
require_once __DIR__ . DIRECTORY_SEPARATOR. "upload-handler.php";

function renderListing($filePath = __DIR__ . DIRECTORY_SEPARATOR . '..'.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'users.csv')
{
    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        if(!isset($_GET['q-name'])){
            if(isset($_GET['q-email'])){
                directToUserProfile();
            }else{
                $data = readCSVFile($filePath);
                if (!count($data)) {
                    echo '<h5 class="text-center"> Sorry! There is NO user data! </h5>';
                    return;
                }else{
                    printUsers($data);
                }
            }
        }
        else{
            $name = $_GET["q-name"];
            $foundUser = getUsers($filePath = __DIR__ . DIRECTORY_SEPARATOR . '..'.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'users.csv',$name);
            if(!$foundUser){
                echo "No user founded";
            }else{
                printUsers($foundUser);
            }
        }
    }
}


function printUsers($data){
    for($x =0; $x <count($data); $x++){
        $users = "<tr class = 'user-data'><td scope='row'>" . $data[$x][0] . "</td>
        <td scope='col'>" . $data[$x][1] . "</td>
        <td scope='col'>" . $data[$x][3] . "</td>
        <td scope='col'>" . $data[$x][2] . "</td>
        <td scope='col'>" . $data[$x][5] . "</td>
        <td scope='col'> <button type='submit' name='q-email' value='".$data[$x][3]."'>View details</button> </td></tr>";
        echo $users;
    }
}

function directToUserProfile(){

    $email = $_GET['q-email'];
    if(!$email){
        echo"Error can't go to profile";
    }else{
        $user = getUser(__DIR__ . '\..\data\users.csv', $email);
        $_SESSION['logged'] = $user[0];
        $_SESSION['userType'] = $user[5];
        header("Location: ../user/profile.php");
        exit();
    }
}
?>