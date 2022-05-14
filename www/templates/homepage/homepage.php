<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once __DIR__ . DIRECTORY_SEPARATOR . '..'. DIRECTORY_SEPARATOR .'..'.DIRECTORY_SEPARATOR.'php'.DIRECTORY_SEPARATOR.'csv-handler.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'php/post-listing-handler.php';
?>

<style> <?
    require_once __DIR__ . DIRECTORY_SEPARATOR .'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR.'card.css'; ?>
</style>
<!--    TODO: add image listing-->
<h1 class="text-center"> Welcome To InstaKilogram</h1>
<div class="container-fluid row">
    <?php postListing(); ?>
</div>
