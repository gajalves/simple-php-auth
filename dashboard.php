<?php
    session_start();

    if(!$_SESSION['online']) {
        header('location: login.html');
        return false;
    } else{
        echo 'ta logado amigao<br>';
        echo 'ACESSO LIBERADO APOS AUTENTICAÇÃO<br>';

        echo $_SESSION['id'] . " - ". $_SESSION['email'] . "<br>";
        echo "Bem vindo ";

    }
?>

<a href="logout.php">Sair</a>

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
                    <a class="nav-link" href="gerenciar.php">Gerenciar</a>
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
            <div class="col-6 offset-md-3">
                <div class="card text-white bg-primary">
                    <div class="card-header">Dash</div>
                    <div class="card-body">                        
                        <p class="card-text">Welcome to my saite.</p>  
                        <img src="https://i.gifer.com/50Ey.gif" alt="">
                        <i>by: Marty McFly</i>                      
                    </div>
                </div>
            </div>
        </div>
    </div>
   
  </body>
</html>