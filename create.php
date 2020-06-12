<?php
    
    echo 'olaaa-create';

    if(!isset($_POST['title']) && !isset($_POST['content'])) {
        echo 'vaza irmao';
        return false;
    }        

    $con = new PDO("mysql:host=localhost;dbname=crud_php", "root", ""); 

    $title = $_POST['title'];
    $content = $_POST['content'];

    $query = $con->prepare("INSERT INTO posts VALUES (null, :title, :content)");
    $query->bindParam(':title', $title, PDO::PARAM_STR);
    $query->bindParam(':content', $content, PDO::PARAM_STR);

    if(!$query->execute()) {
        echo 'post nao criado';
        return false;
    }

    header('location:http://localhost/web/crud_php/');