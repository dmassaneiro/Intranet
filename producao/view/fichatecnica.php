<?php
include '../session.php';
$acesso_user = $_SESSION['user_acesso'];

include_once '../../conexao/ConexaoPDO.php';
include_once '../../classes/dao/ProdutoDAO.php';
include_once '../../classes/modelo/Produto.php';
include_once '../../classes/dao/InstrumentoDAO.php';
include_once '../../classes/modelo/Instrumento.php';

$pesquisarNome = $_POST['pesquisanome'];
$pesquisarSaida = $_POST['pesquisadata'];
$pesquisarSituacao = $_POST['situacao'];

$msg = filter_input(INPUT_GET, 'msg');

if ($acesso_user == 'Funcionario') {

    echo "<script language= 'JavaScript'>
location.href='http://192.168.1.252:1000/server/intranet/producao/view/inicioficha.php?msg=6'
</script>";
}
?>
<!DOCTYPE html>
<html>
    <?php include '../estrutura/head.php'; ?>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="../js/autocomp.js"></script>
    <title>Produção - Ficha Técnica</title>
    <body>
        <script>
            function setText() {
                var x = document.getElementById('option1');
                value = x.options[x.selectedIndex].value;
                //fast - mini - 1 polegada
                if (value === '14' || value === '15' || value === '16' || value === '17'
                        || value === '22' || value === '23' || value === '24'
                        || value === '25') {
                    newInput.innerHTML = "<div class='row'>" +
                            "<div class='col-md-3'>" +
                            "<label>Teste de Temperatura</label>" +
                            "<input id='teste' type='text' class='form-control' name='teste'>" +
                            "</div>" +
                            "<div class='col-md-3'>" +
                            "<label >Display/LED</label>" +
                            "<input id='skills' name='led' type='text' class='form-control'>" +
                            "</div>" +
                            "</div>" +
                            "<br>";
                }
                if (value === '28' || value === '29' || value === '30' || value === '31' || value === '32'
                        || value === '33' || value === '34' || value === '35' || value === '36' || value === '37'
                        || value === '38' || value === '39' || value === '40' || value === '41' || value === '42'
                        || value === '43' || value === '44' || value === '45' || value === '46' || value === '47') {
                    //secador
                    newInput.innerHTML = "<div class='row'>" +
                            "<div class='col-md-3'>" +
                            "<label>Montagem</label>" +
                            "<input id='skills' name='montagemsecador' type='text' class='form-control'>" +
                            "</div>" +
                            "<div class='col-md-3'>" +
                            "<label id='skills'>Teste do Cabo</label>" +
                            "<input type='text' name='cabosecador' class='form-control'>" +
                            "</div>" +
                            "<div class='col-md-3'>" +
                            "<label for='email'>Teste de Aquecimento</label>" +
                            "<input id='skills' name='aquecimentosecador' type='text' class='form-control'>" +
                            "</div>" +
                            "<div class='col-md-3'>" +
                            "<label for='email'>LED</label>" +
                            "<input id='skills' name='ledsecador' type='text' class='form-control'>" +
                            "</div>" +
                            "</div>" +
                            "<br>" +
                            "<div class='row'>" +
                            "<div class='col-md-3'>" +
                            "<label for='email'>Verificação dos Bicos</label>" +
                            "<input id='skills' name='bico' type='text' class='form-control'>" +
                            "</div>" +
                            "<div class='col-md-3'>" +
                            "<label for='email'>Conferência</label>" +
                            "<input id='skills' name='conferenciasecador' type='text' class='form-control'>" +
                            "</div>" +
                            "</div>" +
                            "<br>";
                }
                if (value === '1' || value === '2' || value === '3' || value === '4' || value === '5'
                        || value === '6' || value === '7' || value === '8') {
                    //prancha 1 1/4
                    newInput.innerHTML = "<div class='row'>" +
                            "<div class='col-md-3'>" +
                            "<label>Montagem Superior</label>" +
                            "<input id='skills' name='montagemsuperior' type='text' class='form-control'>" +
                            "</div>" +
                            "<div class='col-md-3'>" +
                            "<label>Montagem Circuito (1)</label>" +
                            "<input id='skills' name='montagemcircuito1' type='text' class='form-control'>" +
                            "</div>" +
                            "<div class='col-md-3'>" +
                            "<label>Montagem Circuito (2)</label>" +
                            "<input id='skills' name='montagemcircuito2' type='text' class='form-control'>" +
                            "</div>" +
                            "<div class='col-md-3'>" +
                            "<label>Montagem Final</label>" +
                            "<input id='skills' name='montagemfinal' type='text' class='form-control'>" +
                            "</div>" +
                            "</div>" +
                            "<br>" +
                            "<div class='row'>" +
                            "<div class='col-md-3'>" +
                            "<label>Teste de Temperatura</label>" +
                            "<input id='skills' name='temperaturaprancha' type='text' class='form-control'>" +
                            "</div>" +
                            "<div class='col-md-3'>" +
                            "<label>Teste LED</label>" +
                            "<input id='skills' name='ledprancha' type='text' class='form-control'>" +
                            "</div>" +
                            "<div class='col-md-3'>" +
                            "<label>Teste do Cabo</label>" +
                            "<input id='skills' name='caboprancha' type='text' class='form-control'>" +
                            "</div>" +
                            "<div class='col-md-3'>" +
                            "<label>Teste de Fechamento e Lâminas</label>" +
                            "<input id='skills' name='laminaprancha' type='text' class='form-control'>" +
                            "</div>" +
                            "</div>" +
                            "<br>";
                }
                if (value === '50') {
                    //photon
                    newInput.innerHTML = "<div class='row'>" +
                            "<div class='col-md-3'>" +
                            "<label>Motagem</label>" +
                            "<input id='skills' name='montagemphoton' type='text' class='form-control'>" +
                            "</div>" +
                            "<div class='col-md-3'>" +
                            "<label>Teste de Funcionamento/LED</label>" +
                            "<input id='skills' name='testephoton' type='text' class='form-control'>" +
                            "</div>" +
                            "</div>" +
                            "<br>";
                }
                if (value === '51' || value === '52' || value === '53' || value === '54') {
                    //maquina
                    newInput.innerHTML = "<div class='row'>" +
                            "<div class='col-md-3'>" +
                            "<label for='email'>Teste Encaixe dos pentes</label>" +
                            "<input id='skills' name='pente' type='text' class='form-control'>" +
                            "</div>" +
                            "<div class='col-md-3'>" +
                            "<label for='email'>Acionamento do LED</label>" +
                            "<input id='skills' name='ledmaquina' type='text' class='form-control'>" +
                            "</div>" +
                            "<div class='col-md-3'>" +
                            "<label for='email'>Teste da fonte</label>" +
                            "<input id='skills' name='fonte' type='text' class='form-control'>" +
                            "</div>" +
                            "<div class='col-md-3'>" +
                            "<label for='email'>Alavanca de Regulagem</label>" +
                            "<input id='skills' name='alavanca' type='text' class='form-control'>" +
                            "</div>" +
                            "</div>" +
                            "<br>" +
                            "<div class='row'>" +
                            "<div class='col-md-3'>" +
                            "<label for='email'>Conteúdo da embalagem</label>" +
                            "<input id='skills' name='conteudo' type='text' class='form-control'>" +
                            "</div>" +
                            "<div class='col-md-3'>" +
                            "<label for='email'>Óleo</label>" +
                            "<input id='skills' name='oleo' type='text' class='form-control'>" +
                            "</div>" +
                            "</div>" +
                            "<br>";
                }
                if (value === '48' || value === '49') {
                    //pedicuro
                    newInput.innerHTML = "<div class='row'>" +
                            "<div class='col-md-3'>" +
                            "<label for='email'>Acionamento motor(127v e 220v)</label>" +
                            "<input type='text' name='motor' class='form-control'>" +
                            "</div>" +
                            "<div class='col-md-3'>" +
                            "<label for='email'>Ajuste de Velocidade</label>" +
                            "<input type='text' name='velocidade' class='form-control'>" +
                            "</div>" +
                            "<div class='col-md-3'>" +
                            "<label>Ajuste no botão On/Off</label>" +
                            "<input type='text' name='onoff' class='form-control'>" +
                            "</div>" +
                            "<div class='col-md-3'>" +
                            "<label>Suporte para o motor</label>" +
                            "<input type='text' name='suporte' class='form-control'>" +
                            "</div>" +
                            "</div>" +
                            "<br>" +
                            "<div class='row'>" +
                            "<div class='col-md-3'>" +
                            "<label>Conteúdo da embalagem</label>" +
                            "<input type='text' name='embalagempedicuro' class='form-control'>" +
                            "</div>" +
                            "<div class='col-md-3'>" +
                            "<label>Conferência das lixas</label>" +
                            "<input type='text' name='lixa' class='form-control'>" +
                            "</div>" +
                            "</div>" +
                            "<br>";
                }
            }
            ;
        </script>
        <?php include '../estrutura/menu.php'; ?>
        <div class="container-fluid">
            <br>
            <?php if ($msg == '1') { ?>
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <strong>Successo!</strong> Ficha Técnica Cadastrada .
                </div>
            <?php } ?>

            <div class="panel panel-primary" style="border:1px solid #101010">
                <!-- Default panel contents -->
                <div class="panel-heading" style="background-color:#222; color: white; border-bottom:1px solid #101010"><a href="javascript:window.history.go(-1)"><button class="btn btn-xs btn-default"><span class="glyphicon glyphicon-chevron-left"></span>Voltar</button></a>&nbsp;&nbsp; <b>Cadastro de Ficha Técnica</b></div>
                <div class="panel-body">
                    <form action="../../classes/controle/FichaTecnicaControle.php" method="POST">
                        <div class="row">         
                            <div class="col-md-3">
                                <label>Produto</label>
                                <select class="form-control" name="produto" required="" onChange='setText()' id='option1'>
                                    <option value='0'>Selecione...</option>
                                    <?php
                                    $pro = new ProdutoDAO();
                                    foreach ($pro->BuscarTodos() as $ve) {
                                        ?>
                                        <option id="<?= $ve->getNome() ?>" value='<?= $ve->getId() ?>'><?= $ve->getNome() ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-1">
                                <label>Quantidade</label>
                                <input type="text" name="qtd" required="" class="form-control">
                            </div>
                            <div class="col-md-1">
                                <label>Lote</label>
                                <input type="text" name="lote" required="" class="form-control">
                            </div>
                            <div class="col-md-1">
                                <label>N° OP</label>
                                <input type="text" name="op" required="" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <label>Lote Importação</label>
                                <input type="text" name="loteimportacao"  class="form-control">
                            </div>
                            <div class="col-md-2">
                                <label>Dt. Inicio</label>
                                <input type="date" name="incio" required=""  class="form-control" value="<?= date('Y-m-d') ?>">
                            </div>
                            <div class="col-md-2">
                                <label>Dt. Fim</label>
                                <input type="date" name="fim" required="" class="form-control" value="<?= date('Y-m-d') ?>">
                            </div>
                        </div>
                        <br>
                        <div id='newInput' style="background-color: #FFF0F5">
                            <!-- lugar onde aparecerao os campos -->
                        </div>
                        <br>
                        <div class="row">         
                            <div class="col-md-3">
                                <label>Polimento</label>
                                <input id="polimento" name="polimento" required="" type="text" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label>Embalagem</label>
                                <input id="embalagem" name="embalagem" required="" type="text" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label>Instrumento de Medição</label>
                                <select class="form-control" required="" name="instrumento">
                                    <option value="">Selecione...</option>
                                    <?php
                                    $inst = new InstrumentoDAO();
                                    foreach ($inst->BuscarTodos() as $in) {
                                        ?>
                                        <option value="<?= $in->getId() ?>"><?= $in->getNome() ?> - <?= $in->getNumero() ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <br>
                                <label>Observação</label>
                                <textarea rows="3" class="form-control" name="obs"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">         
                            <div class="col-md-6">
                                <button type="submit" name="inicia" class="btn btn-primary pull-left"><span class="glyphicon glyphicon-saved"></span> Abrir Ficha Técnica</button>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" name="concluir"class="btn btn-success pull-right"><span class="glyphicon glyphicon-floppy-disk"></span> Fechar Ficha Técnica</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
        <?php include '../estrutura/footer.php'; ?>
    </body>
</html>