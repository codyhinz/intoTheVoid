<?php 

    $dsn = "mysql:host=localhost;dbname=shadowpriest";
    $username = "root";


    try {
        $db = new PDO($dsn, $username);
    }  catch(PDOException $e) {
        echo $e;
    }