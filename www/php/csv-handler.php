<?php

function readCSVFile($filePath, $condition = '')
{
    $data = [];
    $content = fopen($filePath, 'r');
    if (!$content) return false;
    while (($row = fgetcsv($content)) !== false) {
        if ($row[1]=== 'deleted') continue;
        if(array(null) !== $row){
            $data[] = $row;
        }
    }
    fclose($content);
    return array_reverse($data);
}

function readFileWithConditions($filePath, $index, $condition, $index1 = 0, $condition1 = '')
{
    $data = [];
    $content = fopen($filePath, 'r');
    while (($row = fgetcsv($content)) !== false) {
        if ($index && $condition && $index1 && $condition1) {
            if ($row[$index1] !== $condition1 || $row[$index] !== $condition) continue;
        } else if ($index && $condition) {
            if ($row[$index] !== $condition) continue;
        }
        $data[] = $row;
    }
    return array_reverse($data);
}

function getPostForUser($filePath)
{
    $data = [];
    $ite= 0;
    $content = fopen($filePath, 'r');
    if (!$content) return false;
    while (($row = fgetcsv($content)) !== false) {
        if ($ite === 0) {
            $ite++;
            continue;
        }
        if ($row[2] === 'private'){
            if ($row[1] != $_SESSION['logged']) continue;
        }
        $data[] = $row;
    }
    return array_reverse($data);
}

function getNextRow($filePath)
{
    $ite = [];
    $content = fopen($filePath, 'r');
    while (($row = fgetcsv($content)) !== false) {
        $ite=intval($row[0])  + 1;
    }
    return $ite;

}

function writeToFile($filePath, $content)
{
    $file = fopen($filePath, 'a');
    if (!$file) {
        return false;
    }
    fputcsv($file, $content);
    fclose($file);
}

function isValidCSVContent($filePath, $content)
{
    $rows = fopen($filePath, 'r');
    $firstRow = fgetcsv($rows);
    if (count($firstRow) !== count($content)) {
        return false;
    }
    $values = array_values($content);
    for ($x = 0; $x <= count($firstRow); $x++) {
        if (!$values[$x]) return false;
    }
    return true;
}

function getUser($filePath, $email, $isAdminLogin=false)
{
    $content = fopen($filePath, 'r');
    if (!$content) return false;
    while (($row = fgetcsv($content)) !== false) {
        if (!$isAdminLogin) {
            if ($row[3] === $email) {
                return $row;
            }
        } else {
            if ($row[3] === $email && $row[5] === 'admin') {
                return $row;
            }
        }
    }
    return null;
}

function getUsers($filePath, $name){

    $pattern = "/(?=.*".$name.")/i";
    $content = fopen($filePath, 'r');
    $matches = array();
    if (!$content) return false;

    while (($row = fgetcsv($content)) !== false) {

        if (preg_match($pattern, $row[1]) || preg_match($pattern, $row[3])) {
            $matches[] =  $row;
        }
    }
    if(count($matches)){
        return array_reverse($matches);
    }
    return null;
    
}

function getUserById($id, $filePath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'data' .DIRECTORY_SEPARATOR. 'users.csv')
{
    $content = fopen($filePath, 'r');
    if (!$content) return false;
    while (($row = fgetcsv($content)) !== false) {
        if ($row[0] === $id) {
            return $row;
        }
    }
    return null;
}

function getPosts($userType)
{
    $path = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR. 'data'. DIRECTORY_SEPARATOR . 'posts.csv';
    switch ($userType) {
        case 'admin':
            return readCSVFile($path);
        case 'user':
            return getPostForUser($path);
        default:
            return readFileWithConditions($path, 2, 'public');

    }
}

function getListOfPost()
{
    if (!isset($_SESSION['logged'])) {
            return getPosts('');
    }
    return getPosts($_SESSION['userType']);
}

function updateCSVRow($otherId, $newContent=null){
    $target = $newContent ? 'posts.csv' : 'users.csv';
    $filePath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR. 'data'. DIRECTORY_SEPARATOR . $target;
    $content = readCSVFile($filePath);
        for ($x=0; $x < count($content); $x++){
            if ($content[$x][0] === $otherId){
                if (!$newContent) {
                    $content[$x][4] = password_hash('123456', PASSWORD_BCRYPT);
                } else {
                    $content[$x] = [$otherId, $newContent];
                }
            }
        }
    $file = fopen($filePath, 'w+');
    if (!$file) {
        return false;
    }
    $content = array_reverse($content);
    for ($x=0; $x < count($content); $x++) {
        var_dump($content[$x]);
        fputcsv($file, $content[$x]);
    }
    fclose($file);
}




?>