<?php 
namespace App\Controllers;
use \App\Models\Categoria;

class LoginController {
  public function index() {
      \App\View::make('login', []);
    }
}