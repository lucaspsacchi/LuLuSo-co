<?php

namespace App\Controllers;

use \App\Models\Categoria;
use App\Models\Pessoa;

class CadastroController
{
    public function index()
    {
        \App\View::make('cadastro', ['url' => URL_BASE]);
    }

    public function cadastrar($data)
    {
        Pessoa::insert($data["email"], MD5($data["psw"]), $data["name"]);
    }
}