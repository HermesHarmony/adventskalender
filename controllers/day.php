<?php 

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$day = substr($uri, 6);

$day = str_replace("day-", "", $day);

$locked = $day > $currentDay;

require "views/day.php";
