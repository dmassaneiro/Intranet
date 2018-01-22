<?php

include_once '../../conexao/ConexaoPDO.php';
include_once '../modelo/Serasa.php';
include_once '../dao/SerasaDAO.php';

$deletar = $_GET['deletar'];

if (isset($_POST['grav'])) {

    $codigo = filter_input(INPUT_POST, 'codigo');
    $nome = filter_input(INPUT_POST, 'nome');
    $empresa = filter_input(INPUT_POST, 'empresa');

    $inst = new Serasa();
    $consertodao = new SerasaDAO();

    $inst->setCodigo($codigo);
    $inst->setNome(strtoupper($nome));
    $inst->setEmpresa(nl2br(strtoupper($empresa)));

//    
//    echo '<pre>';
//    echo var_dump($serasa);
//    echo '</pre>';
//    
    $consertodao->Inserir($inst);

    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../financeiro/serasa.php?msg=1'>";
}

if (isset($_POST['alterar'])) {

    $id = filter_input(INPUT_POST, 'id');
    $codigo = filter_input(INPUT_POST, 'codigo');
    $nome = filter_input(INPUT_POST, 'nome');
    $empresa = filter_input(INPUT_POST, 'empresa');

    $inst = new Serasa();
    $consertodao = new SerasaDAO();

    $inst->setid($id  );
    $inst->setCodigo($codigo);
    $inst->setNome(strtoupper($nome));
    $inst->setEmpresa(nl2br(strtoupper($empresa)));

    
//    echo '<pre>';
//    echo var_dump($serasa);
//    echo '</pre>';
////    
    $consertodao->Editar($inst);

   echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../financeiro/serasa.php?msg=3'>";
}


if ($deletar != null) {
 $consertodao = new SerasaDAO();
    $consertodao->Deletar($deletar);

    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../financeiro/serasa.php?msg=2 '>";
}