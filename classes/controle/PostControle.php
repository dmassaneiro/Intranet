<?php

include_once '../../conexao/ConexaoPDO.php';
include_once '../modelo/Post.php';
include_once '../dao/PostDAO.php';

$deletar = $_GET['deletar'];

if (isset($_POST['postar'])) {
    //Post
    $funcionarioPost = filter_input(INPUT_POST, 'funcionarioPost');
    $assuntoPost = filter_input(INPUT_POST, 'assuntoPost');
    $data = date('Y-m-d');
    $hora = date('H:i:s');
    

    $inst = new Post();
    $consertodao = new PostDAO();
    
    $inst->setFuncionario(strtoupper($funcionarioPost));
    $inst->setDescricao(nl2br($assuntoPost));
    $inst->setData($data);
    $inst->setHora($hora);
//    
//    echo '<pre>';
//    echo var_dump($post);
//    echo '</pre>';
    
    $consertodao->Inserir($inst);
 
     echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../index.php?msg=1'>";
}





$ie = filter_input(INPUT_POST, 'ie');
$cep = filter_input(INPUT_POST, 'cep');
$endereco = filter_input(INPUT_POST, 'rua');
$numero = filter_input(INPUT_POST, 'numero');
$bairro = filter_input(INPUT_POST, 'bairro');
$cidade = filter_input(INPUT_POST, 'cidade');
$estado = filter_input(INPUT_POST, 'uf');
$nomesocio = filter_input(INPUT_POST, 'socio');
$pessoaempresa = filter_input(INPUT_POST, 'pessoa');
$tecnicoempresa = filter_input(INPUT_POST, 'tecnica');
$referencia = filter_input(INPUT_POST, 'referencia');
$empresa = filter_input(INPUT_POST, 'empresa');
$banco = filter_input(INPUT_POST, 'banco');
$telefone1 = filter_input(INPUT_POST, 'telefone1');
$telefone2 = filter_input(INPUT_POST, 'telefone2');
$email = filter_input(INPUT_POST, 'email');
$senha = filter_input(INPUT_POST, 'senha');

$deletar = $_GET['deletar'];

$auto = new Autorizada();
$autoDao = new AutorizadaDAO();

if (isset($_POST['gravar'])) {
    if (empty($cnpj) || empty($ie) || empty($razao) || empty($senha)) {


       
    } else {
        $auto->setRazao($razao);
        $auto->setFantasia($fantasia);
        $auto->setDatafundacao($datafundacao);
        $auto->setCnpj($cnpj);
        $auto->setIe($ie);
        $auto->setCep($cep);
        $auto->setEndereco($endereco);
        $auto->setNumero($numero);
        $auto->setBairro($bairro);
        $auto->setCidade($cidade);
        $auto->setEstado($estado);
        $auto->setNomesocio($nomesocio);
        $auto->setPessoaempresa($pessoaempresa);
        $auto->setTecnicoempresa($tecnicoempresa);
        $auto->setEmpresa($empresa);
        $auto->setReferencia($referencia);
        $auto->setBanco($banco);
        $auto->setTelefone1($telefone1);
        $auto->setTelefone2($telefone2);
        $auto->setEmail($email);
        $auto->setSenha($senha);

//        echo '<pre>';
//        echo var_dump($auto);
//        echo '</pre>';
        $autoDao->Inserir($auto);

        echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../cadastro.php?msg=1'>";
    }
}
if (isset($_POST['editar'])) {
    if (empty($cnpj) || empty($ie) || empty($razao) || empty($senha)) {

        echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../CadastroAutorizada.php?msg=2 '>";
    } else {
        $auto->setRazao($razao);
        $auto->setFantasia($fantasia);
        $auto->setDatafundacao($datafundacao);
        $auto->setCnpj($cnpj);
        $auto->setIe($ie);
        $auto->setCep($cep);
        $auto->setEndereco($endereco);
        $auto->setNumero($numero);
        $auto->setBairro($bairro);
        $auto->setCidade($cidade);
        $auto->setEstado($estado);
        $auto->setNomesocio($nomesocio);
        $auto->setPessoaempresa($pessoaempresa);
        $auto->setTecnicoempresa($tecnicoempresa);
        $auto->setEmpresa($empresa);
        $auto->setReferencia($referencia);
        $auto->setBanco($banco);
        $auto->setTelefone1($telefone1);
        $auto->setTelefone2($telefone2);
        $auto->setEmail($email);
        $auto->setSenha($senha);

        $auto->setId($id);

//        echo '<pre>';
//        echo var_dump($auto);
//        echo '</pre>';

        $autoDao->Editar($auto);
        echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../consultaAutorizada.php?msg=4 '>";
    }
}
if ($deletar != null) {

    $aid = filter_input(INPUT_POST, 'id');

    $autoDao->Deletar($deletar);

    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../consultaAutorizada.php?msg=3 '>";
}