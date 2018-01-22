<?php

include_once '../../conexao/ConexaoPDO.php';
include_once '../../classes/dao/ConsertoDAO.php';
include_once '../../classes/modelo/Conserto.php';
include_once '../../classes/dao/ClienteDAO.php';
include_once '../../classes/modelo/Cliente.php';
include_once '../../classes/dao/HistoricoConsertoDAO.php';
include_once '../../classes/modelo/HistoricoConserto.php';

$idenviar = $_GET['id'];
$iddeletar = $_GET['delete'];
$user = $_GET['user'];

$nome = filter_input(INPUT_POST, 'cliente', FILTER_SANITIZE_STRING);
$prateleira = filter_input(INPUT_POST, 'prateleira', FILTER_SANITIZE_STRING);
$local = filter_input(INPUT_POST, 'local', FILTER_SANITIZE_STRING);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
$observacao = filter_input(INPUT_POST, 'observacao', FILTER_SANITIZE_STRING);
$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);

$data = date('Y-m-d');

$inst = new Conserto();
$consertodao = new ConsertoDAO();
$cliente = new Cliente();
$clientedao = new ClienteDAO();
$historico = new HistoricoConserto();
$historicodao = new HistoricoConsertoDAO();

if (isset($_POST['gravar'])) {

    $status = "PENDENTE";

    $cliente->setNome(strtoupper($nome));
    $clientedao->Inserir($cliente);
    $last = $clientedao->PegaId();
    $id_cliente = $last->getId();

    $inst->setCliente($id_cliente);
    $inst->setPrateleira($prateleira);
    $inst->setLocal($local);
    $inst->setData($data);
    $inst->setSaida('0000-00-00');
    $inst->setDescricao($descricao);
    $inst->setObservacao($observacao);
    $inst->setStatus($status);

//    echo '<pre>';
//    echo var_dump($conserto);
//    echo '</pre>';

    $consertodao->Inserir($inst);
    $last2 = $consertodao->PegaIdConserto();
    $id_conserto = $last2->getId();

    $historico->setData($data);
    $historico->setConserto_id($id_conserto);
    $historico->setUsuario($usuario);
    $historico->setOperacao($status);

    echo '<pre>';
    echo var_dump($historico);
    echo '</pre>';

    $historicodao->Inserir($historico);

    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../astec/view/conserto.php'>";
}
if (isset($_POST['editar'])) {

    $nomeid = filter_input(INPUT_POST, 'clienteid', FILTER_SANITIZE_STRING);
    $id = filter_input(INPUT_POST, 'consertoid', FILTER_SANITIZE_STRING);
    $saida = filter_input(INPUT_POST, 'saida', FILTER_SANITIZE_STRING);
    $situacao = filter_input(INPUT_POST, 'situacao', FILTER_SANITIZE_STRING);
    $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);

    $cliente->setId($nomeid);

    $inst->setId($id);
    $inst->setId_cliente($nomeid);
    $inst->setCliente($nome);
    $inst->setPrateleira($prateleira);
    $inst->setLocal($local);
    $inst->setData($data);
    $inst->setSaida($saida);
//    $conserto->setSaida();
    $inst->setDescricao($descricao);
    $inst->setObservacao($observacao);
    $inst->setStatus('CADASTRO');

    echo '<pre>';
    echo var_dump($inst);
    echo '</pre>';

    $consertodao->Editar($inst);

    $historico->setData($data);
    $historico->setConserto_id($id);
    $historico->setUsuario($usuario);
    $historico->setOperacao($situacao);

    echo '<pre>';
    echo var_dump($historico);
    echo '</pre>';

    $historicodao->Inserir($historico);

    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../astec/view/conserto.php'>";
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
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../astec/view/conserto.php'>";
}
if ($iddeletar != null) {

    $inst->setId($iddeletar);
    $inst->setStatus('EXCLUIDO');

    $consertodao->Excluir($inst);

    $historico->setData($data);
    $historico->setConserto_id($iddeletar);
    $historico->setUsuario($user);
    $historico->setOperacao('EXCLUIDO');

    echo '<pre>';
    echo var_dump($historico);
    echo '</pre>';
    
  $historicodao->Inserir($historico);
////   
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../astec/view/conserto.php'>";
}