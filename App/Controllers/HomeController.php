<?php 
namespace App\Controllers;
use \App\Models\Categoria;

class HomeController {
  public function index($data) {
      echo  "OláMundo";
    $cat = Categoria::listAll($data["id"]);
        \App\View::make('home', [ 'categorias' => $cat ]);
    }
}