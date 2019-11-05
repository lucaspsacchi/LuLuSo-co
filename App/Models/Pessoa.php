<?php


namespace App\Models;

use App\DB;

class Pessoa
{
    public static function insert($email, $senha, $nome)
    {
        $conhecimento = "Leigo";
        $flag = 0;
        // insere no banco
        $DB = new DB;
        $sql = "INSERT INTO pessoa(usuario, senha, nome, conhecimento, flag) VALUES(:email, :senha, :nome,:conhecimento, :flag)";
        $stmt = $DB->prepare($sql);

        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':conhecimento', $conhecimento);
        $stmt->bindParam(':flag', $flag);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Erro ao cadastrar";
            print_r($stmt->errorInfo());
            return false;
        }
    }
}