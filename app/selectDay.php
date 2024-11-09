<?php 

$year = $data['year'];

$currentDate = new DateTime();

$december = false;
$currentDay = 0;
$state = null;

if($currentDate->format('Y') > $year) {
    $currentDay = 24;
    $state = "unlocked";
} else if($currentDate->format('Y') < $year) {
    $state = "locked";
} else {
    if($december = $currentDate->format('m') == 11) {
        $currentDay = $currentDate->format('d');
        $state = "active";
    } else {
        $state = "locked";
    }
}

$remainingDays = 24 - $currentDay;