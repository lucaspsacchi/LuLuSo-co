<?php 
namespace App\Controllers;
use \App\Models\Categoria;

class HomeController {
  public function index() {
    $cat = Categoria::listAll();
        \App\View::make('home', [ 'categorias' => $categorias ]);
    }
}