<?php

// CLASSE QUE VAI SE CONECTAR COM O BANCO DE DADOS 
class Database {

    public static function getConnection()
    {
        // real caminho para pgarmos o file env.ini
        $envPath = realpath(dirname(__FILE__). '/../env.ini');
        // ira pegar chave e valor do envPath, de onde nos atribuimos o arquivo 
        $env = parse_ini_file($envPath);
        //conexao
        $conn = new mysqli($env['host'], $env['username'], $env['password'], $env['database']);

        //tratamento si der erro 
        if($conn->connect_error) {
            die("Erro: " . $conn->connect_error);
        }

        // si nao der erro , retornara a conexao 
        return $conn ; 
    }

    // function para pegar os resultados do banco de dados , parametro pe a tabela que vc escolher 
    public static function getResultFromQuery($sql)
    {
        // primeiro passo , conectar com o banco 
        $conn = self::getConnection();
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }

}