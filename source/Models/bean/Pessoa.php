<?php


namespace Source\Models\Bean;
class Pessoa
{

    private $id;
    private $email;
    private $senha;
    private $nome;
    private $conhecimento;
    private $flag;

    /**
     * Pessoa constructor.
     * @param $id
     * @param $email
     * @param $senha
     * @param $nome
     * @param $conhecimento
     * @param $flag
     */
    public function __construct($id, $email, $senha, $nome, $conhecimento, $flag)
    {
        $this->id = $id;
        $this->email = $email;
        $this->senha = $senha;
        $this->nome = $nome;
        $this->conhecimento = $conhecimento;
        $this->flag = $flag;
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha): void
    {
        $this->senha = $senha;
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
    public function getConhecimento()
    {
        return $this->conhecimento;
    }

    /**
     * @param mixed $conhecimento
     */
    public function setConhecimento($conhecimento): void
    {
        $this->conhecimento = $conhecimento;
    }

    /**
     * @return mixed
     */
    public function getFlag()
    {
        return $this->flag;
    }

    /**
     * @param mixed $flag
     */
    public function setFlag($flag): void
    {
        $this->flag = $flag;
    }




}