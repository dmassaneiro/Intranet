<?php

include_once '../../conexao/ConexaoPDO.php';
include_once '../../classes/dao/OrcamentoDAO.php';
include_once '../../classes/modelo/Orcamento.php';
include_once '../../classes/dao/ClienteDAO.php';
include_once '../../classes/modelo/Cliente.php';
include_once '../../classes/dao/HistoricoOrcamentoDAO.php';
include_once '../../classes/modelo/HistoricoOrcamento.php';

$idenviar = $_GET['id'];
$iddeletar = $_GET['delete'];
$user = $_GET['user'];

$nome = filter_input(INPUT_POST, 'cliente', FILTER_SANITIZE_STRING);
$numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
$ocorrencia = filter_input(INPUT_POST, 'ocorrencia', FILTER_SANITIZE_STRING);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
$observacao = filter_input(INPUT_POST, 'observacao', FILTER_SANITIZE_STRING);
$status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);

$data = date('Y-m-d');

$inst = new Orcamento;
$consertodao = new OrcamentoDAO();
$cliente = new Cliente();
$clientedao = new ClienteDAO();
$historico = new HistoricoOrcamento();
$historicodao = new HistoricoOrcamentoDAO();

if (isset($_POST['gravar'])) {
    echo 'entro';
    $situacao = "PENDENTE";

    $cliente->setNome(strtoupper($nome));
    $clientedao->Inserir($cliente);
    $last = $clientedao->PegaId();
    $id_cliente = $last->getId();

    $inst->setCliente_id($id_cliente);
    $inst->setData($data);
    $inst->setNumeroserie($numero);
    $inst->setOcorrencia($ocorrencia);
    $inst->setSaida('0000-00-00');
    $inst->setDescricao($descricao);
    $inst->setObsercacao($observacao);
    $inst->setStatus($status);
    $inst->setSituacao('PENDENTE');

    $consertodao->Inserir($inst);
    echo '<pre>';
    echo var_dump($inst);
    echo '</pre>';

    
    $last2 = $consertodao->PegaIdOrcamento();
    $id_conserto = $last2->getId();

    $historico->setData($data);
    $historico->setConserto_id($id_conserto);
    $historico->setUsuario($usuario);
    $historico->setOperacao('CADASTRO');

    echo '<pre>';
    echo var_dump($historico);
    echo '</pre>';

    $historicodao->Inserir($historico);
//
  echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../astec/view/orcamento.php'>";
}
if (isset($_POST['editar'])) {

    $nomeid = filter_input(INPUT_POST, 'idcliente', FILTER_SANITIZE_STRING);
    $id = filter_input(INPUT_POST, 'idocamento', FILTER_SANITIZE_STRING);
    $saida = filter_input(INPUT_POST, 'saida', FILTER_SANITIZE_STRING);
    $situacao = filter_input(INPUT_POST, 'situacao', FILTER_SANITIZE_STRING);
    $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
    $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);

    $cliente->setId($nomeid);

    $inst->setId($id);
    $inst->setCliente_id($nomeid);
    $inst->setCliente($nome);
    $inst->setNumeroserie($numero);
    $inst->setOcorrencia($ocorrencia);
    $inst->setData($data);
    $inst->setSaida($saida);
    $inst->setDescricao($descricao);
    $inst->setObsercacao($observacao);
    $inst->setStatus($status);
    $inst->setSituacao($situacao);

    echo '<pre>';
    echo var_dump($inst);
    echo '</pre>';

    $consertodao->Editar($inst);

    $historico->setData($data);
    $historico->setConserto_id($id);
    $historico->setUsuario($usuario);
    $historico->setOperacao('ALTERAÇÃO');

    echo '<pre>';
    echo var_dump($historico);
    echo '</pre>';

    $historicodao->Inserir($historico);

    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../astec/view/orcamento.php'>";
}
if ($idenviar != null) {

    $data2 = date('Y-m-d');
    $inst->setId($idenviar);
    $inst->setSaida($data2);
    $inst->setSituacao('ENVIADO');

    $consertodao->EditarEnviar($inst);

    echo '<pre>';
    echo var_dump($inst);
    echo '</pre>';
    
    $historico->setData($data);
    $historico->setConserto_id($idenviar);
    $historico->setUsuario($user);
    $historico->setOperacao('ENVIADO');

    echo '<pre>';
    echo var_dump($historico);
    echo '</pre>';

   $historicodao->Inserir($historico);
//   
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../astec/view/orcamento.php'>";
}
if ($iddeletar != null) {

    $inst->setId($iddeletar);
    $inst->setSituacao('EXCLUIDO');

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
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../astec/view/orcamento.php'>";
}