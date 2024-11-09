<?php require_once("components/head.php"); ?>

<?php if($locked): ?>
    <main class="locked">
        <h1>Locked</h1>
        <p>It's not time to open this door yet.</p>
    </main>
<?php else: ?>
    <main class="">
        <?php require_once("days/day_". $day .".php"); ?>
    </main>
<?php endif; ?>

<?php require_once("components/footer.php"); ?>