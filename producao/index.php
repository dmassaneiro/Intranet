<?php 
session_destroy();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/x-icon" href="../img/ico.png">
        <title>Identificação</title>
    </head>
    <body>
        <div class="container">
            <br>
            <br>
            <form action="valida.php" method="post" class="form-signin">
                <center><h2 class="form-signin-heading">Área - Produção<br>Idêntifique-se</h2></center>
                <br>
                <input type="text" class="form-control" name="login" placeholder="Login" required autofocus>
                <br>
                <input type="password" class="form-control" name="senha" placeholder="Senha" required>

                <button class="btn btn-lg btn-primary btn-block" type="submit" name="entrar"> 
                    <span class="glyphicon glyphicon-circle-arrow-right"></span> Acessar!
                </button>
            </form>
        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>