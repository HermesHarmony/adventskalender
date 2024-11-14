<?php require_once("components/head.php"); ?>

<?php if($locked): ?>
    <main class="locked">
        <h1><?= $data['title_day_locked'] ?></h1>
        <p><?= $data['message_day_locked'] ?></p>
    </main>
<?php else: ?>
    <main class="">
        <?php require_once("days/day_". $day .".php"); ?>
    </main>
<?php endif; ?>

<?php require_once("components/footer.php"); ?>