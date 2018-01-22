<?php

include_once '../../conexao/ConexaoPDO.php';
include_once '../modelo/Instrumento.php';
include_once '../dao/InstrumentoDAO.php';

$deletar = $_GET['deletar'];

$nome = filter_input(INPUT_POST, 'nome');
$numero = filter_input(INPUT_POST, 'numero');

$inst = new Instrumento();
$instdao = new InstrumentoDAO();
if (isset($_POST['grav'])) {

    $inst->setNome(strtoupper($nome));
    $inst->setNumero(strtoupper($numero));

//    
    echo '<pre>';
    echo var_dump($inst);
    echo '</pre>';
//    
    $instdao->Inserir($inst);
//
    echo "<script language= 'JavaScript'>
location.href='http://192.168.1.252:1000/server/intranet/producao/view/instrumentos.php?msg=1'
</script>";
}

if (isset($_POST['alterar'])) {

    $id = filter_input(INPUT_POST, 'id');

    $inst->setid($id);

    $inst->setNome(strtoupper($nome));
    $inst->setNumero(strtoupper($numero));


    echo '<pre>';
    echo var_dump($inst);
    echo '</pre>';
////    
    $instdao->Editar($inst);

    echo "<script language= 'JavaScript'>
location.href='http://192.168.1.252:1000/server/intranet/producao/view/instrumentos.php?msg=3'
</script>";
}


if ($deletar != null) {
   
    $instdao->Deletar($deletar);

    echo "<script language= 'JavaScript'>
location.href='http://192.168.1.252:1000/server/intranet/producao/view/instrumentos.php?msg=2'
</script>";
}