<?php
    $config = require "config.php";

    try{
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']}";
        $pdo = new PDO($dsn ,$config['username'], $config['password']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        exit('Não foi possível se comunicar com o Banco de Dados: '. $e->getMessage());
    }
    


?>