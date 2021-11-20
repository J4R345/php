<?php

class Conexao {

    // Padrão Singleton (conecta ao banco de dados apenas uma vez)

    private static $instancia;

    private function __construct(){}

    public static function getConexao() 
    {

        if(!isset(self::$instancia))
        {

        $dbname = 'aula5_mvc';
        $host = 'localhost';
        $user = 'root';
        $senha = '';

        try
        { 
            self::$instancia = new PDO('mysql:dbname='.$dbname.';host='.$host,$user,$senha);

        }catch(Exception $e)
        {
            echo 'Erro: '.$e;
        }

        }
        
        return self::$instancia;

    }


}


?>