<?php


$login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

if (isset($_POST['entrar'])) {
   
    if ($login == strtolower('Mirian') && $senha =='123456') {
       
         echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../financeiro/serasa.php'>";
    } else {
         echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../financeiro/login.php'>";
        
    }
   
}
