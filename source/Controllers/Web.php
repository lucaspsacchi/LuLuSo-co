<?php

namespace Source\Controllers;
use League\Plates\Engine;
use Source\Models\Categoria;

class Web
{

    private $view;

    public function __construct()
    {
        $this->view = Engine::create(__DIR__."/../../Views", "php");
    }

    public function home($data)
    {

        $categorias = (new Categoria())->find()->fetch(true);

        echo $this->view->render("home", [
            "categorias" => $categorias
        ]);

    }

    public function categoria($data)
    {
        echo "<h1>Categoria {$data["catName"]}</h1>";
        var_dump($data);
    }


    public function error($data)
    {
        echo "<h1>Erro {$data["errcode"]}</h1>";
        var_dump($data);
    }
}