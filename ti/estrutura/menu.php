<?php

session_start();
include '../session.php';

$id_user = $_SESSION['user_nome'];
$nome_user = $_SESSION['user_nome'];
$acesso_user = $_SESSION['user_acesso'];
?>
<div class="w3-container-fluid">

    <div class="w3-bar w3-black w3-padding-14">
        <a href="painel.php" class="w3-bar-item w3-button w3-padding-16"><i class="fa fa-home"></i> Início</a>
        <a href="mobilizado.php" class="w3-bar-item w3-button w3-padding-16"><i class="fa fa-folder"></i> Mobilizados</a>
        <a href="orcamento.php" class="w3-bar-item w3-button w3-padding-16"><i class="fa fa-money"></i> Teste</a>
                       <div class="w3-dropdown-hover">
                            <button class="w3-button w3-padding-16">TI</button>
                            <div class="w3-dropdown-content w3-bar-block w3-card-4">
                                <a href="#" class="w3-bar-item w3-button">Link 1</a>
                                <a href="#" class="w3-bar-item w3-button">Link 2</a>
                                <a href="#" class="w3-bar-item w3-button">Link 3</a>
                            </div>
                        </div>
        <a href="http://192.168.1.252:1000/server/intranet/ti/" h class="w3-bar-item w3-button w3-padding-16 w3-right"><i class="fa fa-share-square-o"></i> Sair</a>
        <a href="#" h class="w3-bar-item w3-button w3-padding-16 w3-right"><i class="fa fa-user"></i> <?= strtoupper($nome_user)?></a>
    </div>
</div>
