<?php
function navigate($target)
{
    $home_page = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]" . "/InstaKilogram/www";
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if (!$target) return $home_page;
    if (strpos($actual_link, $target)) {
        return $actual_link;
    }
    return $home_page . $target;
}