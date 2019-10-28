<?php


namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Categoria extends DataLayer
{
    public function __construct()
    {
        parent::__construct("categoria", ["nome", "alias", "img"]);
    }
}