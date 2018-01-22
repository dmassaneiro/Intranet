<?php

include_once '../../conexao/ConexaoPDO.php';
include_once '../modelo/Ouvidoria.php';
include_once '../dao/OuvidoriaDAO.php';

$deletar = $_GET['deletar'];

if (isset($_POST['ouvidoria'])) {

    $funcionario = filter_input(INPUT_POST, 'nome');
    $descricao = filter_input(INPUT_POST, 'descricao2');
    $data = date('Y-m-d');  

    $inst = new Ouvidoria();
    $consertodao = new OuvidoriaDAO();
    
    $inst->setNome(strtoupper($funcionario));
    $inst->setDescricao(nl2br(strtoupper($descricao)));
    $inst->setData($data);
//    
//    echo '<pre>';
//    echo var_dump($serasa);
//    echo '</pre>';
//    
    $consertodao->Inserir($inst);
 
     echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../index.php?msg=3'>";
}

if (isset($_POST['alterar'])) {
//    //Post
//    $funcionario = filter_input(INPUT_POST, 'nome');
//    $assunto = filter_input(INPUT_POST, 'descricao');
//    $data = date('Y-m-d');  
//
//    $ideia = new Ideias();
//    $ideiaDao = new IdeiaDAO();
//    
//    $ideia->setFuncionario(strtoupper($funcionario));
//    $ideia->setIdeia(nl2br(strtoupper($assunto)));
//    $ideia->setData($data);
////    
////    echo '<pre>';
////    echo var_dump($post);
////    echo '</pre>';
//    
//    $ideiaDao->Inserir($ideia);
// 
//     echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../index.php?msg=2'>";
    echo 'oi';
}


if ($deletar != null) {

    $consertodao->Deletar($deletar);

    //include '../../sistema_lizze/rh/ideias.php';
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../consultaAutorizada.php?msg=3 '>";
}