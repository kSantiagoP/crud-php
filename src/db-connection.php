<?php
    $config = require "config.php";

//This one and pretty much every method implemented has try catch
//as the main source of error detection. That's not exactly scalable
//as it is but works on a small scale project such as this
    try{
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']}";
        $pdo = new PDO($dsn ,$config['username'], $config['password']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        exit('Could not connect to database: '. $e->getMessage());
    }
