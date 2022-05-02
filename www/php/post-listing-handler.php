<?php
require_once __DIR__ . '/csv-handler.php';

function postListing()
{
    $items = getListOfPost();
    if (!count($items)) {
        echo '<h5 class="text-center"> Sorry! There is No data right now! </h5>';
    }
    for ($x = 0; $x < count($items); $x++) {
        $img = $items[$x][6];
        $title = $items[$x][3];
        $description = $items[$x][4];
        $createdDate = $items[$x][5];
        echo '<div class="card">';
        echo '<img class="card-img-top" style="object-fit: none;object-position: center;height: 300px;width: 100%;" src="data:image/jpg;charset=utf8;base64,' . $img
            . '" alt="Card image cap">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $title . '</h5>';
        echo '<p class="card-text">' . $description . '</p>';
        echo '<p class="card-text"><small class="text-muted">Posted at ' . $createdDate . '</p>';
        echo '</div>';
        echo '</div>';
    }
}
