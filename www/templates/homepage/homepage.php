<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once __DIR__ . '/../../php/csv-handler.php';
require_once __DIR__ . '/../../php/post-listing-handler.php';
?>

<style> <?
    require_once __DIR__ . '/../../css/card.css'; ?>
</style>
<!--    TODO: add image listing-->
<h1 class="text-center"> Welcome To InstaKilogram</h1>
<div class="card-group text-center">
    <?php postListing(); ?>
</div>
