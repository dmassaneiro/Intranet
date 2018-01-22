<?php

include_once '../../conexao/ConexaoPDO.php';
include_once '../dao/FichaTecnicaDAO.php';
include_once '../modelo/FichaTecnica.php';
include_once '../dao/FichaTesteDAO.php';
include_once '../modelo/FichaTeste.php';


$deletar = $_GET['deletar'];
$deletarficha = $_GET['deletaficha'];
//prancha 1 1/4
$testeprancha = filter_input(INPUT_POST, 'temperaturaprancha');
$montagemsuperior = filter_input(INPUT_POST, 'montagemsuperior');
$circuito1 = filter_input(INPUT_POST, 'montagemcircuito1');
$circuito2 = filter_input(INPUT_POST, 'montagemcircuito2');
$montagemfinal = filter_input(INPUT_POST, 'montagemfinal');
$ledprancha = filter_input(INPUT_POST, 'ledprancha');
$caboprancha = filter_input(INPUT_POST, 'caboprancha');
$laminaprancha = filter_input(INPUT_POST, 'laminaprancha');

//prancha 1 polegada- fast - mini
$test = filter_input(INPUT_POST, 'teste');
$led = filter_input(INPUT_POST, 'led');
//secador
$montagemsecador = filter_input(INPUT_POST, 'montagemsecador');
$cabosecador = filter_input(INPUT_POST, 'cabosecador');
$aquecimentosecador = filter_input(INPUT_POST, 'aquecimentosecador');
$ledsecador = filter_input(INPUT_POST, 'ledsecador');
$bico = filter_input(INPUT_POST, 'bico');
$conferenciasecador = filter_input(INPUT_POST, 'conferenciasecador');
//maquina
$pente = filter_input(INPUT_POST, 'pente');
$ledmaquina = filter_input(INPUT_POST, 'ledmaquina');
$fonte = filter_input(INPUT_POST, 'fonte');
$alavanca = filter_input(INPUT_POST, 'alavanca');
$oleo = filter_input(INPUT_POST, 'oleo');
//pedicuro
$motor = filter_input(INPUT_POST, 'motor');
$velocidade = filter_input(INPUT_POST, 'velocidade');
$onoff = filter_input(INPUT_POST, 'onoff');
$suporte = filter_input(INPUT_POST, 'suporte');
$embalagempedicuro = filter_input(INPUT_POST, 'embalagempedicuro');
$lixa = filter_input(INPUT_POST, 'lixa');
//photon
$montagemphoton = filter_input(INPUT_POST, 'montagemphoton');
$testephoton = filter_input(INPUT_POST, 'testephoton');

//finalização
$polimento = filter_input(INPUT_POST, 'polimento');
$embalagem = filter_input(INPUT_POST, 'embalagem');
$instrumento = filter_input(INPUT_POST, 'instrumento');
$data = date('Y-m-d');

$produto_id = filter_input(INPUT_POST, 'produto');
$lote = filter_input(INPUT_POST, 'lote');
$loteimportacao = filter_input(INPUT_POST, 'loteimportacao');
$op = filter_input(INPUT_POST, 'op');
$dt_inicio = filter_input(INPUT_POST, 'incio');
$dt_fim = filter_input(INPUT_POST, 'fim');
$qtd = filter_input(INPUT_POST, 'qtd');
$obs = filter_input(INPUT_POST, 'obs');

$ficha = new FichaTecnica();
$fichadao = new FichaTecnicaDAO();
$fichateste = new FichaTeste();
$fichatestedao = new FichaTesteDAO();

if (isset($_POST['inicia'])) {

    $ficha->setLote($lote);
    $ficha->setLoteimportacao($loteimportacao);
    $ficha->setOrdemproducao($op);
    $ficha->setDatainicio($dt_inicio);
    $ficha->setDatafim($dt_fim);
    $ficha->setQuantidade($qtd);
    $ficha->setObs(nl2br(strtoupper($obs)));
    $ficha->setMontagem(strtoupper($montagemsecador . '' . $montagemphoton));
    $ficha->setPente(strtoupper($pente));
    $ficha->setFonte(strtoupper($fonte));
    $ficha->setAlavanca(strtoupper($alavanca));
    $ficha->setLamina(strtoupper($laminaprancha));
    $ficha->setMotor(strtoupper($motor));
    $ficha->setVelocidade(strtoupper($velocidade));
    $ficha->setOnoff(strtoupper($onoff));
    $ficha->setSuporte(strtoupper($suporte));
    $ficha->setConteudo(strtoupper($conferenciasecador . '' . $embalagempedicuro));
    $ficha->setLed(strtoupper($ledprancha . '' . $led . '' . $ledmaquina . '' . $ledsecador));
    $ficha->setCabo(strtoupper($caboprancha . '' . $cabosecador));
    $ficha->setFinal(strtoupper($montagemfinal));
    $ficha->setSuperior(strtoupper($montagemsuperior));
    $ficha->setCircuito1(strtoupper($circuito1));
    $ficha->setCircuito2(strtoupper($circuito2));
    $ficha->setTeste(strtoupper($testeprancha . '' . $test . '' . $aquecimentosecador . '' . $testephoton));
    $ficha->setPolimento(strtoupper($polimento));
    $ficha->setEmbalagem(strtoupper($embalagem));
    $ficha->setInstrumento_id($instrumento);
    $ficha->setProdutos_id($produto_id);
    $ficha->setSituacao('ABERTA');

    echo '<pre>';
    echo var_dump($ficha);
    echo '</pre>';

    $fichadao->Inserir($ficha);

    echo "<script language= 'JavaScript'>
location.href='http://192.168.1.252:1000/server/intranet/producao/view/inicioficha.php?msg=1'
</script>";
}
if (isset($_POST['editaficha'])) {

    $id_ficha = filter_input(INPUT_POST, 'id_ficha');

    $ficha->setLote($lote);
    $ficha->setLoteimportacao($loteimportacao);
    $ficha->setOrdemproducao($op);
    $ficha->setDatainicio($dt_inicio);
    $ficha->setDatafim($dt_fim);
    $ficha->setQuantidade($qtd);
    $ficha->setObs(nl2br(strtoupper($obs)));
    $ficha->setMontagem(strtoupper($montagemsecador . '' . $montagemphoton));
    $ficha->setPente(strtoupper($pente));
    $ficha->setFonte(strtoupper($fonte));
    $ficha->setAlavanca(strtoupper($alavanca));
    $ficha->setLamina(strtoupper($laminaprancha));
    $ficha->setMotor(strtoupper($motor));
    $ficha->setVelocidade(strtoupper($velocidade));
    $ficha->setOnoff(strtoupper($onoff));
    $ficha->setSuporte(strtoupper($suporte));
    $ficha->setConteudo(strtoupper($conferenciasecador . '' . $embalagempedicuro));
    $ficha->setLed(strtoupper($ledprancha . '' . $led . '' . $ledmaquina . '' . $ledsecador));
    $ficha->setCabo(strtoupper($caboprancha . '' . $cabosecador));
    $ficha->setFinal(strtoupper($montagemfinal));
    $ficha->setSuperior(strtoupper($montagemsuperior));
    $ficha->setCircuito1(strtoupper($circuito1));
    $ficha->setCircuito2(strtoupper($circuito2));
    $ficha->setTeste(strtoupper($testeprancha . '' . $test . '' . $aquecimentosecador . '' . $testephoton));
    $ficha->setPolimento(strtoupper($polimento));
    $ficha->setEmbalagem(strtoupper($embalagem));
    $ficha->setInstrumento_id($instrumento);
    $ficha->setProdutos_id($produto_id);
    $ficha->setid($id_ficha);

    echo '<pre>';
    echo var_dump($ficha);
    echo '</pre>';

    $fichadao->Editar($ficha);

    echo "<script language= 'JavaScript'>
location.href='http://192.168.1.252:1000/server/intranet/producao/view/inicioficha.php?msg=2'
</script>";
}
if (isset($_POST['concluir'])) {
    $id_ficha = filter_input(INPUT_POST, 'id_ficha');
    $ficha->setSituacao('FECHADA');
    $ficha->setid($id_ficha);

    echo '<pre>';
    echo var_dump($ficha);
    echo '</pre>';

    $fichadao->EditarFechar($ficha);

    echo "<script language= 'JavaScript'>
        location.href='http://192.168.1.252:1000/server/intranet/producao/view/inicioficha.php?msg=5'
        </script>";
}
if (isset($_POST['addteste'])) {

    $numero = filter_input(INPUT_POST, 'numero');
    $valor = filter_input(INPUT_POST, 'valor');
    $outro = filter_input(INPUT_POST, 'outro');
    $nc = filter_input(INPUT_POST, 'nc');
    $acao = filter_input(INPUT_POST, 'acao');
    $valor1 = filter_input(INPUT_POST, 'valor1');
    $outro1 = filter_input(INPUT_POST, 'outro1');
    $nc1 = filter_input(INPUT_POST, 'nc1');
    $acao1 = filter_input(INPUT_POST, 'acao1');
    $id_produto = filter_input(INPUT_POST, 'id_produto');
    $id_ficha = filter_input(INPUT_POST, 'id_ficha');

    $nome_produto = filter_input(INPUT_POST, 'nome_produto');
    $qtd = filter_input(INPUT_POST, 'qtd');

    $fichateste->setFichatecnica_id($id_ficha);
    $fichateste->setProduto_id($id_produto);
    $fichateste->setNumero($numero);
    $fichateste->setValor($valor . '' . $valor1);
    $fichateste->setAcao($acao . '' . $acao1);
    $fichateste->setNc($nc . '' . $nc1);
    $fichateste->setOutro($outro . '' . $outro1);

    echo '<pre>';
    echo var_dump($fichateste);
    echo '</pre>';

    $fichatestedao->Inserir($fichateste);

    echo "<script language= 'JavaScript'>
location.href='http://192.168.1.252:1000/server/intranet/producao/view/testeadd.php?id=$id_ficha&id_produto=$id_produto&nome_produto=$nome_produto&qtd=$qtd'
</script>";
}
if (isset($_POST['addteste1'])) {

    $numero = filter_input(INPUT_POST, 'numero');
    $valor = filter_input(INPUT_POST, 'valor');
    $outro = filter_input(INPUT_POST, 'outro');
    $nc = filter_input(INPUT_POST, 'nc');
    $acao = filter_input(INPUT_POST, 'acao');
    $valor1 = filter_input(INPUT_POST, 'valor1');
    $outro1 = filter_input(INPUT_POST, 'outro1');
    $nc1 = filter_input(INPUT_POST, 'nc1');
    $acao1 = filter_input(INPUT_POST, 'acao1');
    $id_produto = filter_input(INPUT_POST, 'id_produto');
    $id_ficha = filter_input(INPUT_POST, 'id_ficha');

    $nome_produto = filter_input(INPUT_POST, 'nome_produto');
    $qtd = filter_input(INPUT_POST, 'qtd');

    $fichateste->setFichatecnica_id($id_ficha);
    $fichateste->setProduto_id($id_produto);
    $fichateste->setNumero($numero);
    $fichateste->setValor($valor . '' . $valor1);
    $fichateste->setAcao($acao . '' . $acao1);
    $fichateste->setNc($nc . '' . $nc1);
    $fichateste->setOutro($outro . '' . $outro1);

    echo '<pre>';
    echo var_dump($fichateste);
    echo '</pre>';

    $fichatestedao->Inserir($fichateste);

    echo "<script language= 'JavaScript'>
location.href='http://192.168.1.252:1000/server/intranet/producao/view/acaoadd.php?id=$id_ficha&id_produto=$id_produto&nome_produto=$nome_produto&qtd=$qtd'
</script>";
}
if (isset($_POST['editateste1'])) {

    $numero = filter_input(INPUT_POST, 'numero');
    $valor = filter_input(INPUT_POST, 'valor');
    $outro = filter_input(INPUT_POST, 'outro');
    $nc = filter_input(INPUT_POST, 'nc');
    $acao = filter_input(INPUT_POST, 'acao');
    $valor1 = filter_input(INPUT_POST, 'valor1');
    $outro1 = filter_input(INPUT_POST, 'outro1');
    $nc1 = filter_input(INPUT_POST, 'nc1');
    $acao1 = filter_input(INPUT_POST, 'acao1');
    $id_produto = filter_input(INPUT_POST, 'id_produto');
    $id_ficha = filter_input(INPUT_POST, 'id_ficha');
    $id_teste = filter_input(INPUT_POST, 'id_teste');

    $nome_produto = filter_input(INPUT_POST, 'nome_produto');
    $qtd = filter_input(INPUT_POST, 'qtd');

    $fichateste->setId($id_teste);
    $fichateste->setProduto_id($id_produto);
    $fichateste->setNumero($numero);
    $fichateste->setValor($valor . '' . $valor1);
    $fichateste->setAcao($acao . '' . $acao1);
    $fichateste->setNc($nc . '' . $nc1);
    $fichateste->setOutro($outro . '' . $outro1);

    echo '<pre>';
    echo var_dump($fichateste);
    echo '</pre>';

    $fichatestedao->Editar($fichateste);

    echo "<script language= 'JavaScript'>
location.href='http://192.168.1.252:1000/server/intranet/producao/view/acaoadd.php?id=$id_ficha&id_produto=$id_produto&nome_produto=$nome_produto&qtd=$qtd'
</script>";
}
if (isset($_POST['editateste'])) {

    $numero = filter_input(INPUT_POST, 'numero');
    $valor = filter_input(INPUT_POST, 'valor');
    $outro = filter_input(INPUT_POST, 'outro');
    $nc = filter_input(INPUT_POST, 'nc');
    $acao = filter_input(INPUT_POST, 'acao');
    $valor1 = filter_input(INPUT_POST, 'valor1');
    $outro1 = filter_input(INPUT_POST, 'outro1');
    $nc1 = filter_input(INPUT_POST, 'nc1');
    $acao1 = filter_input(INPUT_POST, 'acao1');
    $id_produto = filter_input(INPUT_POST, 'id_produto');
    $id_ficha = filter_input(INPUT_POST, 'id_ficha');
    $id_teste = filter_input(INPUT_POST, 'id_teste');

    $nome_produto = filter_input(INPUT_POST, 'nome_produto');
    $qtd = filter_input(INPUT_POST, 'qtd');

    $fichateste->setId($id_teste);
    $fichateste->setProduto_id($id_produto);
    $fichateste->setNumero($numero);
    $fichateste->setValor($valor . '' . $valor1);
//    $fichateste->setAcao($acao . '' . $acao1);
    $fichateste->setNc($nc . '' . $nc1);
    $fichateste->setOutro($outro . '' . $outro1);

    echo '<pre>';
    echo var_dump($fichateste);
    echo '</pre>';

    $fichatestedao->EditarTeste($fichateste);
////
    echo "<script language= 'JavaScript'>
location.href='http://192.168.1.252:1000/server/intranet/producao/view/testeadd.php?id=$id_ficha&id_produto=$id_produto&nome_produto=$nome_produto&qtd=$qtd'
</script>";
}
if ($deletar != null) {
    $numero = filter_input(INPUT_POST, 'numero');
    $valor = filter_input(INPUT_POST, 'valor');
    $outro = filter_input(INPUT_POST, 'outro');
    $nc = filter_input(INPUT_POST, 'nc');
    $acao = filter_input(INPUT_POST, 'acao');
    $valor1 = filter_input(INPUT_POST, 'valor1');
    $outro1 = filter_input(INPUT_POST, 'outro1');
    $nc1 = filter_input(INPUT_POST, 'nc1');
    $acao1 = filter_input(INPUT_POST, 'acao1');
    $id_produto = filter_input(INPUT_POST, 'id_produto');
    $id_ficha = filter_input(INPUT_POST, 'id_ficha');
    $id_teste = filter_input(INPUT_POST, 'id_teste');

    $nome_produto = filter_input(INPUT_POST, 'nome_produto');
    $qtd = filter_input(INPUT_POST, 'qtd');

    $fichatestedao->Deletar($deletar);

    echo "<script language= 'JavaScript'>
location.href='http://192.168.1.252:1000/server/intranet/producao/view/testeadd.php?id=$id_ficha&id_produto=$id_produto&nome_produto=$nome_produto&qtd=$qtd'
</script>";
}
if ($deletarficha != null) {

    $fichadao->Deletar($deletarficha);

    echo "<script language= 'JavaScript'>
location.href='http://192.168.1.252:1000/server/intranet/producao/view/inicioficha.php?msg=3'
</script>";
}