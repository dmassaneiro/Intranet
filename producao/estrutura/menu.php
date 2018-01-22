<?php
session_start();
include '../session.php';

$id_user = $_SESSION['user_nome'];
$nome_user = $_SESSION['user_nome'];
$acesso_user = $_SESSION['user_acesso'];
?>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="http://192.168.1.252:1000/server/intranet/producao/view/inicioficha.php"><img src="../../img/sr.png" style="margin-top: -7%" width="150px"></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Produção<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="http://192.168.1.252:1000/server/intranet/producao/view/inicioficha.php">Ficha Técnica</a></li>
                        <li><a href="http://192.168.1.252:1000/server/intranet/producao/view/teste.php">Testes</a></li>
                        <li><a href="http://192.168.1.252:1000/server/intranet/producao/view/acaocorretiva.php">Ação Corretivas</a></li>
                    </ul>
                </li>     
                <li><a href="http://192.168.1.252:1000/server/intranet/producao/view/instrumentos.php">Instrumentos</a></li>   
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?= strtoupper($nome_user) ?></a></li>
                <li><a href="http://192.168.1.252:1000/server/intranet/producao/index.php"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
            </ul>
        </div>
    </div>
</nav>
