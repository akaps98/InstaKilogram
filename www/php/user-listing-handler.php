<?php
require_once __DIR__ . "/csv-handler.php";
require_once __DIR__ . "\\navigation-handler.php";

function renderListing($filePath = __DIR__ . '\..\data\users.csv')
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
        if ($filePath === __DIR__ . '\..\data\users.csv') {
            echo '<th scope="col"> <button> <a> View Detail</a>  </button> </th>';
        }
        echo '</tr>';
    }
}

?>