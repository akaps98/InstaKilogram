<?php
require_once "input-handler.php";
require_once "csv-handler.php";
require_once "upload-handler.php";
$message = '';
function isValidEmail()
{
    $email = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = validateInput($_POST['email-ad']);
        if (!$email) echo "Email cannot be empty!";
    }
    $data = readCSVFile(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'users.csv');
    for ($x = 1; $x < count($data); $x++) {
        if (($data[$x][3]) === $email) {
            echo "Email is already exist, Please choose another one!";;
            return false;
        }
    }
    return true;
}


function register()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userPath = __DIR__ . DIRECTORY_SEPARATOR . '..'. DIRECTORY_SEPARATOR.'data' .DIRECTORY_SEPARATOR .'users.csv';
        $id = getNextRow($userPath);
        $email = validateInput($_POST['email-ad']);
        $pw = validateInput($_POST['password']);
        $pw2 = validateInput($_POST['password-confirm']);
        $gender = validateInput($_POST['gender']);
        $image = getImage();
        $fName = validateInput($_POST['first-name']);
        $lName = validateInput($_POST['last-name']);
//        TODO: add more validation functions
        if (isValidEmail()) {
            writeToFile($userPath, [$id, $fName . ' ' . $lName, $gender, $email, $pw, 'user', $image]);
            echo "Register Sucessfully";
        }
    }
}

function login($isAdminLogin = false)
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = validateInput($_POST['email-ad']);
        $pw = validateInput($_POST['password']);
        $result = getUser(__DIR__ . DIRECTORY_SEPARATOR .'..'.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'users.csv', $email, $pw, $isAdminLogin);
        if ($result) {
            echo "Login Successfully! ";
            setUserSession($result);
            header("Location: ../user/profile.php");
            exit;
        }
        echo "Your Email/Password is invalid!";
        return null;
    }
}

function adminLogin()
{

}

function setUserSession($result)
{
    $_SESSION['logged'] = $result[0];
    $_SESSION['userType'] = $result[5];
}


function destroyUserSession()
{
    unset($_SESSION['logged']);
    unset($_SESSION['userType']);
}

?>