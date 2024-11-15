<?php

function siteUrl() {
    $host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost';

    // http or https
    $http = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';

    return $http . '://' . $host;
}

function contact($array) {
    global $data;
    global $form;
    global $day;

    $title = $array['title'];
    $fields = $array['fields'];
    $submit = $array['submit'] ?? null;

    ?>
    <div class="mt-16">
        <h3 class="text-2xl font-bold mb-4"><?= $title; ?></h3>
        <?php $form->messages(); ?>

        <form action="/" method="post" class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <?php $form->create($fields); ?>
            <input type="hidden" name="day" id="day" value="<?= $day ?>">
            <div class="field">
                <button type="submit" class="block btn btn-primary md:col-span-2">
                    <?= $submit ? $submit : $data['form_submit_button'] ?>
                </button>
            </div>
        </form>

    </div>
    <?php
}