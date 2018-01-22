<?php

include_once '../../conexao/ConexaoPDO.php';
include_once '../../classes/dao/ImobilizadoDAO.php';
include_once '../../classes/modelo/Imobilizado.php';

$idenviar = $_GET['id'];
$iddeletar = $_GET['delete'];
$user = $_GET['user'];

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
$codigo = filter_input(INPUT_POST, 'codigo', FILTER_SANITIZE_STRING);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
$setor = filter_input(INPUT_POST, 'setor', FILTER_SANITIZE_STRING);
$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
$tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);
$data = date('Y-m-d');

$imobilizado = new Imobilizado();
$imobilizadodao = new ImobilizadoDAO();

if (isset($_POST['gravar'])) {

    $imobilizado->setCodigo(strtoupper($codigo));
    $imobilizado->setDescricao(nl2br(strtoupper($descricao)));
    $imobilizado->setData($data);
    $imobilizado->setSetor(strtoupper($setor));
    $imobilizado->setUsuario(strtoupper($usuario));
    $imobilizado->setTipoimobilizado_id($tipo);

    echo '<pre>';
    echo var_dump($imobilizado);
    echo '</pre>';

    $imobilizadodao->Inserir($imobilizado);

    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../ti/view/mobilizado.php'>";
}
if (isset($_POST['editar'])) {

    $imobilizado->setCodigo(strtoupper($codigo));
    $imobilizado->setDescricao(nl2br(strtoupper($descricao)));
    $imobilizado->setSetor(strtoupper($setor));
    $imobilizado->setUsuario(strtoupper($usuario));
    $imobilizado->setTipoimobilizado_id($tipo);
    $imobilizado->setId($id);

    echo '<pre>';
    echo var_dump($imobilizado);
    echo '</pre>';

    $imobilizadodao->Editar($imobilizado);


    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../ti/view/mobilizado.php'>";
}
if ($idenviar != null) {

    $inst->setId($idenviar);
    $inst->setSaida($data);
    $inst->setStatus('ENVIADO');

    $consertodao->EditarEnviar($inst);

    $historico->setData($data);
    $historico->setConserto_id($idenviar);
    $historico->setUsuario($user);
    $historico->setOperacao('ENVIADO');

    echo '<pre>';
    echo var_dump($historico);
    echo '</pre>';

    $historicodao->Inserir($historico);
//   
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../ti/view/mobilizado.php'>";
}
if ($iddeletar != null) {

    $imobilizado->setId($iddeletar);

    echo '<pre>';
    echo var_dump($imobilizado);
    echo '</pre>';

    $imobilizadodao->Deletar($iddeletar);

    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../ti/view/mobilizado.php'>";
}