<?php

require __DIR__ . "/vendor/autoload.php";

require 'init.php';



use CoffeeCode\Router\Router;

$app = new Router("http://localhost/ws/LuLuSo-co");

// Login
$app->group(null);
$app->get('/', function () {
    echo "<h1>Login</h1>";
    $login = new \App\Controllers\LoginController();
    $login->index(); // Mudar
});

$app->group("home");
$app->get('/', function ($data) {
    echo "<h1>Home</h1>";
    $data["id"] = "1";
    $home = new \App\Controllers\HomeController();
    $home->index($data);
});

$app->group("cadastrar");
$app->get('/', function () {
    echo "<h1>Cadastrar</h1>";
    $cadastro = new \App\Controllers\CadastroController();
    $cadastro->index();
});

$app->post('/', function ($data) {
    echo "<h1>Cadastrado</h1>";
    var_dump($data);

    $cadastro = new \App\Controllers\CadastroController();
    $cadastro->cadastrar($data);


});



/*
 * ERROS
 */
$app->group("ooops");
$app->get("/{errcode}", function ($data) {
    echo "<h1>Erro {$data["errcode"]}</h1>";
});


$app->dispatch();

if ($app->error()) {
    $app->redirect("ooops/{$app->error()}");
}

?>