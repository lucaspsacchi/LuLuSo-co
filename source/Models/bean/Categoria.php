<?php


namespace Source\Models;
class Categoria
{
    private $id;
    private $nome;
    private $alias;
    private $img;

    /**
     * Categoria constructor.
     * @param $id
     * @param $nome
     * @param $alias
     * @param $img
     */
    public function __construct($id, $nome, $alias, $img)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->alias = $alias;
        $this->img = $img;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * @param mixed $alias
     */
    public function setAlias($alias): void
    {
        $this->alias = $alias;
    }

    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param mixed $img
     */
    public function setImg($img): void
    {
        $this->img = $img;
    }




}