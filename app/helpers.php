<?php

function siteUrl() {
    $host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost';

    // http or https
    $http = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';

    return $http . '://' . $host;
}

function contact($array) {
    $title = $array['title'];
    $fields = $array['fields'];
    global $form;
    ?>
    <div class="mt-16">
        <h3 class="text-2xl font-bold mb-4"><?= $title; ?></h3>
        <?php $form->messages(); ?>
        <?php $form->create_form($fields); ?>
    </div>
    <?php
}