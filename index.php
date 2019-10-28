<?php

require __DIR__ ."/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(URL_BASE);


$router->namespace("Source\Controllers");

/*
 * Gerenciamento
 * login
 */
$router->group(null);
$router->get("/", "Gerenciamento:login");

/*
 * WEB
 * home
 */
$router->group("home");
$router->get("/", "Web:home");


/*
 * WEB
 * categoria
 */
$router->group("categoria");
$router->get("/{catName}", "Web:categoria");

/*
 * Gerenciamento
 * cadastro
 */
$router->group("cadastrar");
$router->get("/", "Gerenciamento:registerGET");
$router->post("/", "Gerenciamento:registerPOST");

/*
 * ERROS
 */
$router->group("ooops");
$router->get("/{errcode}", "Web:error");

$router->dispatch();

if($router->error()){
    $router->redirect("ooops/{$router->error()}");
}
