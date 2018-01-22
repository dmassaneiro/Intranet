<?php
session_cache_expire(240);
$cache_expire = session_cache_expire();

session_start();

if ($_SESSION['user_acesso'] != 'Master') {
    echo"<META HTTP-EQUIV=REFRESH CONTENT = '0;URL= http://192.168.1.252:1000/server/intranet/ti/index.php'>";
}
if (!isset($_SESSION['user_nome'])) {

    echo"<META HTTP-EQUIV=REFRESH CONTENT = '0;URL= http://192.168.1.252:1000/server/intranet/ti/index.php'>";
    exit;
}
