<?php


namespace Source\Controllers;


use League\Plates\Engine;
use Source\Models\dao\PessoaDAO;
use Source\Models\Bean\Pessoa;


class Gerenciamento
{
    private $view;

    public function __construct()
    {
        $this->view = Engine::create(__DIR__."/../../Views", "php");
    }

    public function login($data)
    {
        echo "<h1>Login</h1>";
        var_dump($data);
        require __DIR__ ."/../../Views/login.php";
    }

    public function registerGET($data)
    {
        echo "<h1>Cadastrar</h1>";
        var_dump($data);

        $url = URL_BASE;
        require __DIR__ ."/../../Views/cadastrar.php";
    }

    public function registerPOST($data)
    {
        echo "<h1>Cadastrado</h1>";
        var_dump($data);

        $pessoa = new Pessoa(null, $data["email"], $data["psw"], "Lucas", "leigo", "0");

        if(PessoaDAO::insert($pessoa)){
            echo("Sucesso");
        }





    }
}