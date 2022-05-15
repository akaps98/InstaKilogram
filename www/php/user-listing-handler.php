<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'session-handler.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . "csv-handler.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . "navigation-handler.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . "upload-handler.php";

function renderListing($filePath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'users.csv')
{
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (!isset($_GET['q-name'])) {
            directToUserProfile();
            $data = readCSVFile($filePath);
            if (!count($data)) {
                echo '<h5 class="text-center"> Sorry! There is NO user data! </h5>';
            } else {
                printUsers($data, strpos($filePath,'post'));
            }
        } else {
            $name = $_GET["q-name"];
            $foundUser = getUsers($filePath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'users.csv', $name);
            if (!$foundUser) {
                echo "No user founded";
            } else {
                printUsers($foundUser);
            }
        }
    }
}


function printUsers($data, $canDelete=false)
{
    $buttonContent = "View Details";
    $name = "view-detail";
    if ($canDelete) {
        $buttonContent = "Delete";
        $name = "delete-post";
    }
    for ($x = 0; $x < count($data); $x++) {
        $users = "<tr>
        <td>" . $data[$x][0] . "</td>
        <td>" . $data[$x][1] . "</td>
        <td>" . $data[$x][3] . "</td>
        <td>" . $data[$x][2] . "</td>
        <td>" . $data[$x][5] . "</td>
        <td> <button class='btn btn-primary' type='submit' name='".$name."' value='" . $data[$x][0] . "'>". $buttonContent ."</button> </td></tr>";
        echo $users;
    }
}

function directToUserProfile()
{
    if (isset($_GET['view-detail'])) {
        $uid = $_GET['view-detail'];
        if (!$uid) {
            echo "Error can't go to profile";
        } else {
            header("Location: ..".DIRECTORY_SEPARATOR."user".DIRECTORY_SEPARATOR."profile.php?user=" . $uid);
            exit();
        }
    }
    if (isset($_GET['delete-post'])) {
        $pid = $_GET['delete-post'];
        if (!$pid) {
            echo "Error can't go to profile";
        } else {
            updateCSVRow($pid, 'deleted');
        }
    }
    }

?>