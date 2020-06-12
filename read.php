<?php
    
    session_start();

    if(!$_SESSION['online']) {
        header('location: login.html');
        return false;
    } 

    if(!isset($_GET['userId'])) {
        header('location: dashboard.php');
        return false;
    }

    $con = new PDO("mysql:host=localhost;dbname=crud_php", "root", ""); 
    $query = $con->prepare("SELECT * FROM users WHERE id = :id");
    $query->bindParam(':id', $_GET['userId'], PDO::PARAM_INT);
    $query->execute();    
    
    if(!$query->rowCount()) {   
        header('location: dashboard.php?error=1');
        return false;
    } 

    $user = $query->fetch(PDO::FETCH_ASSOC);

?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://bootswatch.com/4/darkly/bootstrap.min.css">    

    <style>
      .card-login {
        padding: 30px 0 0 0;
        width: 350px;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="https://upload.wikimedia.org/wikipedia/commons/f/ff/Mozilla_Firefox_logo_2013.png" width="30" height="30" class="d-inline-block align-top" alt="">
            App Help Desk
        </a>

        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="dashboard.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Gerenciar</a>
                </li>                
            </ul>
            <ul class="navbar-nav my-2 my-lg-0">
            <li class="nav-item">
                    <a class="nav-link">Olá <?= $_SESSION['email'] ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Sair</a>
                </li>
            </ul>
        </div>
    </nav>
      <br>
    <div class="container">
        <div class="row">
            <div class="col-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Gerenciar</div>
                    <div class="card-body">  
                        <table class="table text-center">                                                                                         
                            <tbody>
                                <tr>
                                    <td>ID</td>                                
                                    <td><?= $user['id'] ?></td>
                                </tr>
                                <tr>
                                    <td>EMAIL</td>                                
                                    <td><?= $user['email'] ?></td>
                                </tr>
                                <tr>
                                    <td>ADMIN</td>                                
                                    <td><?= $user['admin'] ? "Sim" : "Não" ?></td>
                                </tr>                                
                            </tbody>
                        </table>                                              
                    </div>
                </div>
            </div>
        </div>
    </div>   
  </body>
</html>
