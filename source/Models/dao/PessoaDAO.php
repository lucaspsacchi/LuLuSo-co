<?php


namespace Source\Models\dao;

use Source\Models\Bean\Pessoa;

class PessoaDAO
{
    public static function insert(Pessoa $pessoa){

        global $conn;

        $SQL = $conn->prepare("INSERT INTO pessoa (usuario, senha, nome, conhecimento, flag)
                                VALUES (?,?,?,?,?)");

        $SQL->bind_param("sdiss", $P1, $P2, $P3, $P4, $P5);

        $P1 = $pessoa->getEmail();
        $P2 = $pessoa->getSenha();
        $P3 = $pessoa->getNome();
        $P4 = $pessoa->getConhecimento();
        $P5 = $pessoa->getFlag();

        $SQL->execute();

        if ($SQL->affected_rows > 0){
            return true;
        }else{
            return false;
        }
    }
}