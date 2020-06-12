<?php

    $con = new PDO("mysql:host=localhost;dbname=crud_php", "root", ""); 

    $query = $con->prepare("SELECT * FROM users WHERE email = :email");
    $query->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
    $query->execute();

    if($query->rowCount()) {        
        echo 'já existe um registro com esse email';
        return false;
    } else {
        $salt = md5('5ac339632');
        $password = md5($_POST['password'] . $salt);

        $query = $con->prepare("INSERT INTO users VALUES (null, :email, :password, null, 0)");
        $query->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);

        if($query->execute()) {
            echo 'cabo deu bom';
            return true;
        } else {
            echo 'deu merda';
        }
    }
