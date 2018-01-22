<?php
session_cache_expire(240);
$cache_expire = session_cache_expire();
session_start();
include './conexao.php';

$preco = $_POST['login'];
$senha = $_POST['senha'];



if ($preco && $senha != null) {
    $result = mysqli_query($conn, "SELECT * FROM `Usuarios` WHERE login = '$preco' && senha = '$senha'");
    $row = mysqli_fetch_assoc($result);

    if ($preco == "lizze") {
        session_start();
        $_SESSION['user_nome'] = "Lizze";
        header("Location: admin.php");
    }

    if ($row == null) {
        $_SESSION['loginErro'] = "Usuario e/ou Senha Invalidos3";
        header("Location: index.php");
    } elseif ($row != null) {
        session_start();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_nome'] = $row['nome'];
        $_SESSION['user_acesso'] = $row['acesso'];
        header("Location: ./view/inicioficha.php");
    }
} else {
    $_SESSION['loginErro'] = "Os campos Login e/ou Senha não podem ficar em branco";
    header("Location: index.php");
}

$action = $_GET['action'];
if ($action == 'logout') {
    session_start();
    $_SESSION['user_id'] = null;
    $_SESSION['user_nome'] = null;
    $_SESSION['user_acesso'] = null;
    $_SESSION['user_setor'] = null;
    header("Location:./index.php");
}
    