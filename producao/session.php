<?php
session_cache_expire(240);
$cache_expire = session_cache_expire();

session_start();

if ($_SESSION['user_acesso'] != 'Master' && $_SESSION['user_acesso'] != 'Producao' && $_SESSION['user_acesso'] != 'Qualidade'
        && $_SESSION['user_acesso'] != 'Funcionario') {
    echo"<META HTTP-EQUIV=REFRESH CONTENT = '0;URL= http://192.168.1.252:1000/server/intranet/producao/index.php'>";
}
if (!isset($_SESSION['user_nome'])) {

    echo"<META HTTP-EQUIV=REFRESH CONTENT = '0;URL= http://192.168.1.252:1000/server/intranet/producao/index.php'>";
    exit;
}
