
<?php
$data = array('<h2 class="pg-bgcolor4">', '
', '', '</h2>', '<ul>', '<li>', '<p><a href="http://economia.uol.com.br/cotacoes/cambio/dolar-comercial-estados-unidos/" class="cl_white">Dólar com</a></p>', '', '', '<p class="cotacao">', '</li>','</p>','', '</span>', '</ul>', '</div>', '
');
$exclude = array('', '', '', '', '', '', '', '', '', '', '', '|',);
$array = str_replace($data, $exclude, file_get_contents("http://economia.uol.com.br/"));
$dados = explode('<div id="cambio">', $array);

$dados2 = explode('<div class="colunas colunas2">', $dados[1]);

$cto = explode('|', $dados2[0]);
//valor do dolar
echo '<span class="corP">' . $cto[1] . '</span>';
?>
