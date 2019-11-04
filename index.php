<?php 

require __DIR__ ."/vendor/autoload.php";

$app = new \Slim\App();


// Login
$app->get('/', function() {
  $login = new \App\Controllers\Login;
  $login->index(); // Mudar
});

$app->get('/home', function() {
  $home = new \App\Controllers\Home;
  $home->index();
});


?>