<?php


namespace Source\Models\dao;


class categoriaDAO
{
    public static function findAll(){
        global $conn;

        $SQL = $conn->query("SELECT * FROM categoria");

        $result = $SQL->fetch_array();

        return $result;
    }
}