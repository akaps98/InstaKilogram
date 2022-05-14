<?php
require_once "input-handler.php";
require_once "csv-handler.php";
require_once "upload-handler.php";
$message = '';

$checkedEmail = false;
$checkedPassword = false;
$checkedFirstName = false;
$CheckedLastName = false;
$checkedImageExtension =false;
function isValidEmail()
{
    $email = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = validateInput($_POST['email-add']);
        if ($email){
            //Aligned with RFC 5322 
            if(!preg_match('/^(?!(?>(?1)"?(?>\\\[ -~]|[^"])"?(?1)){255,})(?!(?>(?1)"?(?>\\\[ -~]|[^"])"?(?1)){65,}@)((?>(?>(?>((?>(?>(?>\x0D\x0A)?[\t ])+|(?>[\t ]*\x0D\x0A)?[\t ]+)?)(\((?>(?2)(?>[\x01-\x08\x0B\x0C\x0E-\'*-\[\]-\x7F]|\\\[\x00-\x7F]|(?3)))*(?2)\)))+(?2))|(?2))?)([!#-\'*+\/-9=?^-~-]+|"(?>(?2)(?>[\x01-\x08\x0B\x0C\x0E-!#-\[\]-\x7F]|\\\[\x00-\x7F]))*(?2)")(?>(?1)\.(?1)(?4))*(?1)@(?!(?1)[a-z\d-]{64,})(?1)(?>([a-z\d](?>[a-z\d-]*[a-z\d])?)(?>(?1)\.(?!(?1)[a-z\d-]{64,})(?1)(?5)){0,126}|\[(?:(?>IPv6:(?>([a-f\d]{1,4})(?>:(?6)){7}|(?!(?:.*[a-f\d][:\]]){8,})((?6)(?>:(?6)){0,6})?::(?7)?))|(?>(?>IPv6:(?>(?6)(?>:(?6)){5}:|(?!(?:.*[a-f\d]:){6,})(?8)?::(?>((?6)(?>:(?6)){0,4}):)?))?(25[0-5]|2[0-4]\d|1\d{2}|[1-9]?\d)(?>\.(?9)){3}))\])(?1)$/isD',$email)){
                echo "Email invalid. Please enter again";
                return false;
            }else{
                global $checkedEmail;
                $checkedEmail = true;
                //Check identical email
                $data = readCSVFile(__DIR__ . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'users.csv');
                for ($x = 1; $x < count($data); $x++) {
                    if (($data[$x][3]) === $email) {
                        echo "Email is already exist, Please choose another one!";;
                        return false;
                    }
                }
                return true;
            }
        }else{
            echo "Email cannot be empty!";
            return false;
        }
    }
    return false;
}

function isValidPassword(){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
       $password = validateInput($_POST['password']);
       if($password){
            if(!preg_match('/^(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z])(.{8,20})$/', $password)){
                echo "Must contain at least 1 lower case letter, 1 upper case letter, 1 digit, and  8 to 20 characters";
                return false;
            }else{
                return true;
            }
        }else{
            echo "Password can't not be empty";
            return false;
        }
    }
    return false;
}

function isValidFirstName(){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $fname = validateInput($_POST['first-name']);
        if($fname){
            if ( !(strlen($fname) >= 2 && strlen($fname) <= 20)){
                echo "First name's length must be from 2 to 20 characters";
                return false;
            }else{
                global $checkedFirstName;
                $checkedFirstName = true;
                return true;
            }
        }else{
            echo "First name can't not be empty";
            return false;
        }
    }
    return false;
}

function isValidLastName(){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $lname = validateInput($_POST['last-name']);
        if($lname){
            if ( !(strlen($lname) >= 2 && strlen($lname) <= 20)){
                echo "Last name's length must be from 2 to 20 characters";
                return false;
            }else{
                global $CheckedLastName;
                $CheckedLastName = true;
                return true;
            }
        }else{
            echo "Last name can't not be empty";
            return false;
        }
    }
    return false;
}

function isValidFileExtention(){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $image = $_FILES["image"]["type"];
        if($image){
            $validExtention = array("jpg", "jpeg", "png", "gif");
            $extension = strtolower(substr($image,strpos($image,"/")+1));
            global $checkedImageExtension;
            for($x=0; $x < count($validExtention); $x++){
                if(strcmp($validExtention[$x], $extension) == 0){
                    $checkedImageExtension = true;
                    return true;
                }
            }
        }
    }
    return false;
}

function register()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userPath = __DIR__ . '\..\data\users.csv';
        $id = getNextRow($userPath);
        $email = validateInput($_POST['email-add']);
        $pw = validateInput($_POST['password']);
        $pw2 = validateInput($_POST['password-confirm']);
        $gender = validateInput($_POST['gender']);
        $image = getImage();
        $fName = validateInput($_POST['first-name']);
        $lName = validateInput($_POST['last-name']);

        // Problem when calling these valid function, it will print the error along with "Register Sucessfully"
        if( isValidEmail() &&  isValidPassword() && isValidFirstName() && isValidLastName() && isValidFileExtention()){
            $password_hashed = password_hash($pw, PASSWORD_BCRYPT);
            writeToFile($userPath, [$id, $fName.' '. $lName, $gender, $email, $password_hashed, 'user', $image]);
            echo "Register Sucessfully";
        }else{
            echo " Fail to Register";
        }
    }
}

//function editProfile($user){
//    if ($_SERVER["REQUEST_METHOD"] == "POST") {
//        $password = validateInput($_POST['password']);
//        $password_hashed = password_hash($password, PASSWORD_BCRYPT);
//        $image = getImage();
//
//        $content = getStringContent(__DIR__ . '\..\data\users.csv');
//        $id = $user[0];
//        $pattern = '/'.$user[0].',"'.$user[1].'",'.$user[2].','.$user[3].'/';
//        preg_match($pattern, $content,$match,PREG_OFFSET_CAPTURE);
//        $startIndex = $match[0][1];
//        //print_r($startIndex);
//        //print_r(" ");
//        $endIndex = strpos($content,"\n",$startIndex);
//        //print_r($endIndex);
//        //print_r(" ");
//        //print_r($image);
//
//        $replacement = "$user[0],\"$user[1]\",$user[2],$user[3],$password_hashed,$user[5],$image";
//        $editedContent = substr_replace($content,$replacement,$startIndex,$endIndex-$startIndex);
//
//        writeStringContentToFile(__DIR__ . '\..\data\users.csv', $editedContent);
//    }
//}


function login($isAdminLogin=false)
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = validateInput($_POST['email-add']);
        $pw = validateInput($_POST['password']);
        echo $email;
        echo $pw;
        $result = getUser( __DIR__ . DIRECTORY_SEPARATOR . '..'.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'users.csv', $email, $isAdminLogin);
        if($result){
            if (password_verify($pw, $result[4])) {
                setUserSession($result);
                if(!$isAdminLogin){
                    header("Location: " . ".." . DIRECTORY_SEPARATOR ."user" . DIRECTORY_SEPARATOR . "profile.php");
                }else{
                    header("Location: " .".." . DIRECTORY_SEPARATOR ."user" . DIRECTORY_SEPARATOR . "profile.php");
                }
                exit();
            }else{
                echo "Wrong password";
            }
        }else{
            echo "Your Email is invalid";
        }
        return null;
    }
}

function viewDetail($result){
    $_SESSION['logged'] = $result[0];
    $_SESSION['userType'] = $result[5];
    header("Location: ../user/profile.php");
}

function setUserSession($result){
    $_SESSION['logged'] = $result[0];
    $_SESSION['userType'] = $result[5];
}



function destroyUserSession(){
    unset($_SESSION['logged']);
    unset($_SESSION['userType']);
}

function checkViewOtherPermission(){
    return isset($_SESSION['logged']) &&  $_SESSION['userType'] === 'admin';
}

function getOtherId($paramName){
    if (checkViewOtherPermission()) {
        $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $url_components = parse_url($url);
        if (isset($url_components['query'])) {
            parse_str($url_components['query'], $params);
            if (isset($params[$paramName])) {
                return $params[$paramName];
            }
        }
    }
}

function resetOtherPassword($otherId, &$userMessage){
    if (checkViewOtherPermission()){
        $userMessage = 'User Password of user '. $otherId.' has been reset to Palomino1!';
        updateCSVRow($otherId);
    }
    }

?>