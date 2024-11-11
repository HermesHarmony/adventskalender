
<?php 

$days = range(1, 24);
shuffle($days);

$title = $data['title_'.$state];
$message = $data['message_'.$state];

$title = str_replace('{{year}}', $year, $title);
$message = str_replace('{{year}}', $year, $message);
$message = str_replace('{{currentDay}}', $currentDay, $message);
$message = str_replace('{{remainingDays}}', $remainingDays, $message);


require "views/index.php";

