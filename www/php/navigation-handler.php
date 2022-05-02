<?php
function navigate($target)
{
    $home_page = getHost();
    $actual_link = getHost() . "$_SERVER[REQUEST_URI]";

    if (!$target) return $home_page;
    if (strpos($actual_link, $target)) {
        return $actual_link;
    }
    return $home_page . $target;
}

function getHost(){
    return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
}