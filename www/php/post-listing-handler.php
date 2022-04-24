<?php
function sampleListing() {
    $items = ['post 1', 'post 2', 'post 3'];
    echo "<ul>";
    for ($x = 0; $x < count($items); $x++) {
        echo "<li> $items[$x] </li>";
    }
    echo "</ul>";
}

