<?php

$router = $di->getRouter();

// Define your routes here
// Define a route
$router->add(
    "/kurva",
    [
        "controller" => 'city',
        "action"     => 'index',
//        "params"     => 3,
    ]
);


$router->handle();
