<?php

$json = file_get_contents("data.json");

if($json === false) {
	die("Error reading file");
}

$data = json_decode($json, true);

if($data === null) {
	die("Error decoding JSON");
}