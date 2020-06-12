<?php 
    
    session_start();

    $con = new PDO("mysql:host=localhost;dbname=crud_php", "root", ""); 

    $query = $con->prepare("SELECT * FROM users WHERE email = :email");
    $query->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
    $query->execute();

    if(!$query->rowCount()) {
        echo 'Essa conta não existe';        
        return false;
    } else {

        $user_data = $query->fetch(PDO::FETCH_ASSOC);        

        $salt = md5('5ac339632');
        $password = md5($_POST['password'] . $salt);        

        if($password != $user_data['password']) {            
            header('location:login.html');
            return false;
            
        } else {
            echo 'login bem sucedido';
            $_SESSION = $user_data;
            $_SESSION['online'] = true;
            header('location:dashboard.php');
            
        }
    }
