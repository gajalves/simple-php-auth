<?php
    session_start();

    if(!$_SESSION['online']) {        
        header('location: login.html');
        return false;
    } 
    if(!$_SESSION['admin']) {
        header('location: login.html');
        return false;
    } 
    
    $con = new PDO("mysql:host=localhost;dbname=crud_php", "root", ""); 

    $query = $con->prepare("SELECT * FROM users WHERE id = :id");
    $query->bindParam(":id", $_POST['userId'], PDO::PARAM_INT);
    $query->execute();

    if(!$query->rowCount()) {        
        header('location: dashboard.php');        
        return false;
    }

    $query = $con->prepare("UPDATE users SET  email = :email WHERE id = :id");
    $query->bindParam(":email", $_POST['email'], PDO::PARAM_STR);
    $query->bindParam(":id", $_POST['userId'], PDO::PARAM_INT);

    if(!$query->execute()) {
        echo 'deu merda';
        return false;
    } else {
        header('location: gerenciar.php');        
    }
 
?>