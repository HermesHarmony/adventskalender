<?php 

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'controllers/index.php',
    '/days' => 'controllers/days.php'
];

function abort($code = 404) {
    http_response_code($code);
    require "views/error.php";
    die();
}

if(array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else if(str_contains($uri, '/days/')) {    
    require "controllers/day.php";
} else {
    abort();
}
