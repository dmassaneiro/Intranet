<?php
include_once '../../conexao/ConexaoPDO.php';
include_once '../../classes/dao/ProdutoDAO.php';
include_once '../../classes/modelo/Produto.php';
include_once '../../classes/dao/InstrumentoDAO.php';
include_once '../../classes/modelo/Instrumento.php';
include_once '../../classes/dao/FichaTecnicaDAO.php';
include_once '../../classes/modelo/FichaTecnica.php';
include_once '../../classes/dao/FichaTesteDAO.php';
include_once '../../classes/modelo/FichaTeste.php';

$pesquisarNome = $_POST['pesquisanome'];
$pesquisarSaida = $_POST['pesquisadata'];
$pesquisarSituacao = $_POST['situacao'];
$id_ficha = $_GET['id'];

$fichadao = new FichaTecnicaDAO();
$last = $fichadao->BuscarFicha($id_ficha);

$id_pro = $last->getProdutos_id();
$idproduto = $last->getProdutos_id();
$id_ficha = $last->getId();

$msg = filter_input(INPUT_GET, 'msg');
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
                <div class="panel-heading" style="background-color:#222; color: white; border-bottom:1px solid #101010">Consulta de Ficha Técnica</div>
                <div class="panel-body">
                    <form action="../../classes/controle/FichaTecnicaControle.php" method="POST">
                        <div class="row">         
                            <div class="col-md-3">
                                <input type="hidden" name="id_ficha" value="<?= $last->getId() ?>">
                                <label><b>Produto</b></label>
                                <input type="text" name="nome" class="form-control" value="<?= $last->getProdutos_nome() ?>">
                            </div>
                            <div class="col-md-1">
                                <label>Quantidade</label>
                                <input type="text" name="qtd" class="form-control" value="<?= $last->getQuantidade() ?>">
                            </div>
                            <div class="col-md-1">
                                <label>Lote</label>
                                <input type="text" name="lote" class="form-control" value="<?= $last->getLote() ?>">
                            </div>
                            <div class="col-md-1">
                                <label>N° OP</label>
                                <input type="text" name="op"  class="form-control" value="<?= $last->getOrdemproducao() ?>">
                            </div>
                            <div class="col-md-2">
                                <label>Lote Importação</label>
                                <input type="text" name="loteimportacao"  class="form-control" value="<?= $last->getLoteimportacao() ?>">
                            </div>
                            <div class="col-md-2">
                                <label>Dt. Inicio</label>
                                <input type="date" name="incio"  class="form-control" value="<?= $last->getDatainicio() ?>">
                            </div>
                            <div class="col-md-2">
                                <label>Dt. Fim</label>
                                <input type="date" name="fim"  class="form-control" value="<?= $last->getDatafim() ?>">
                            </div>
                        </div>
                        <br>
                        <?php if ($id_pro == '51' || $id_pro == '52' || $id_pro == '53' || $id_pro == '54') { ?>
                            <script>
                                //maquina
                                document.write("<div class='row'>" +
                                        "<div class='col-md-3'>" +
                                        "<label for='email'>Teste Encaixe dos pentes</label>" +
                                        "<input id='skills' name='pente' type='text' class='form-control' value='<?= $last->getPente() ?>'> " +
                                        "</div>" +
                                        "<div class='col-md-3'>" +
                                        "<label for='email'>Acionamento do LED</label>" +
                                        "<input id='skills' name='ledmaquina' type='text' class='form-control' value='<?= $last->getLed() ?>'>" +
                                        "</div>" +
                                        "<div class='col-md-3'>" +
                                        "<label for='email'>Teste da fonte</label>" +
                                        "<input id='skills' name='fonte' type='text' class='form-control' value='<?= $last->getFonte() ?>'>" +
                                        "</div>" +
                                        "<div class='col-md-3'>" +
                                        "<label for='email'>Alavanca de Regulagem</label>" +
                                        "<input id='skills' name='alavanca' type='text' class='form-control' value='<?= $last->getAlavanca() ?>'>" +
                                        "</div>" +
                                        "</div>" +
                                        "<br>" +
                                        "<div class='row'>" +
                                        "<div class='col-md-3'>" +
                                        "<label for='email'>Conteúdo da embalagem</label>" +
                                        "<input id='skills' name='conteudo' type='text' class='form-control' value='<?= $last->getEmbalagem() ?>'>" +
                                        "</div>" +
                                        "<div class='col-md-3'>" +
                                        "<label for='email'>Óleo</label>" +
                                        "<input id='skills' name='oleo' type='text' class='form-control' value='<?= $last->getEmbalagem() ?>'>" +
                                        "</div>" +
                                        "</div>" +
                                        "<br>");
                            </script>
                        <?php }if ($id_pro == '1' || $id_pro == '2' || $id_pro == '3' || $id_pro == '4' || $id_pro == '5' || $id_pro == '6' || $id_pro == '7' || $id_pro == '8') {
                            ?>
                            <script>
                                //prancha 1 1/4
                                document.write("<div class='row'>" +
                                        "<div class='col-md-3'>" +
                                        "<label>Montagem Superior</label>" +
                                        "<input id='skills' name='montagemsuperior' type='text' class='form-control' value='<?= $last->getSuperior() ?>'>" +
                                        "</div>" +
                                        "<div class='col-md-3'>" +
                                        "<label>Montagem Circuito (1)</label>" +
                                        "<input id='skills' name='montagemcircuito1' type='text' class='form-control' value='<?= $last->getCircuito1() ?>'>" +
                                        "</div>" +
                                        "<div class='col-md-3'>" +
                                        "<label>Montagem Circuito (2)</label>" +
                                        "<input id='skills' name='montagemcircuito2' type='text' class='form-control' value='<?= $last->getCircuito2() ?>'>" +
                                        "</div>" +
                                        "<div class='col-md-3'>" +
                                        "<label>Montagem Final</label>" +
                                        "<input id='skills' name='montagemfinal' type='text' class='form-control' value='<?= $last->getFinal() ?>'>" +
                                        "</div>" +
                                        "</div>" +
                                        "<br>" +
                                        "<div class='row'>" +
                                        "<div class='col-md-3'>" +
                                        "<label>Teste de Temperatura</label>" +
                                        "<input id='skills' name='temperaturaprancha' type='text' class='form-control' value='<?= $last->getTeste() ?>'>" +
                                        "</div>" +
                                        "<div class='col-md-3'>" +
                                        "<label>Teste LED</label>" +
                                        "<input id='skills' name='ledprancha' type='text' class='form-control' value='<?= $last->getLed() ?>'>" +
                                        "</div>" +
                                        "<div class='col-md-3'>" +
                                        "<label>Teste do Cabo</label>" +
                                        "<input id='skills' name='caboprancha' type='text' class='form-control' value='<?= $last->getCabo() ?>'>" +
                                        "</div>" +
                                        "<div class='col-md-3'>" +
                                        "<label>Teste de Fechamento e Lâminas</label>" +
                                        "<input id='skills' name='laminaprancha' type='text' class='form-control' value='<?= $last->getLamina() ?>'>" +
                                        "</div>" +
                                        "</div>" +
                                        "<br>");
                            </script>
                        <?php }if ($id_pro == '48' || $id_pro == '49') {
                            ?>
                            <script>
                                //pedicuro
                                document.write("<div class='row'>" +
                                        "<div class='col-md-3'>" +
                                        "<label for='email'>Acionamento motor(127v e 220v)</label>" +
                                        "<input type='text' name='motor' class='form-control' value='<?= $last->getMotor() ?>'>" +
                                        "</div>" +
                                        "<div class='col-md-3'>" +
                                        "<label for='email'>Ajuste de Velocidade</label>" +
                                        "<input type='text' name='velocidade' class='form-control' value='<?= $last->getVelocidade() ?>'>" +
                                        "</div>" +
                                        "<div class='col-md-3'>" +
                                        "<label>Ajuste no botão On/Off</label>" +
                                        "<input type='text' name='onoff' class='form-control' value='<?= $last->getOnoff() ?>'>" +
                                        "</div>" +
                                        "<div class='col-md-3'>" +
                                        "<label>Suporte para o motor</label>" +
                                        "<input type='text' name='suporte' class='form-control' value='<?= $last->getSuporte() ?>'>" +
                                        "</div>" +
                                        "</div>" +
                                        "<br>" +
                                        "<div class='row'>" +
                                        "<div class='col-md-3'>" +
                                        "<label>Conteúdo da embalagem</label>" +
                                        "<input type='text' name='embalagempedicuro' class='form-control' value='<?= $last->getEmbalagem() ?>'>" +
                                        "</div>" +
                                        "<div class='col-md-3'>" +
                                        "<label>Conferência das lixas</label>" +
                                        "<input type='text' name='lixa' class='form-control' value='<?= $last->getEmbalagem() ?>'>" +
                                        "</div>" +
                                        "</div>" +
                                        "<br>");
                            </script>
                        <?php }if ($id_pro == '50') {
                            ?>
                            <script>
                                //Photon
                                document.write("<div class='row'>" +
                                        "<div class='col-md-3'>" +
                                        "<label>Motagem</label>" +
                                        "<input id='skills' name='montagemphoton' type='text' class='form-control' value='<?= $last->getMontagem() ?>'>" +
                                        "</div>" +
                                        "<div class='col-md-3'>" +
                                        "<label>Teste de Funcionamento/LED</label>" +
                                        "<input id='skills' name='testephoton' type='text' class='form-control' value='<?= $last->getTeste() ?>'>" +
                                        "</div>" +
                                        "</div>" +
                                        "<br>");
                            </script>
                            <?php
                        } if ($id_pro == '14' || $id_pro == '15' || $id_pro == '16' || $id_pro == '17' || $id_pro == '22' || $id_pro == '23' || $id_pro == '24' || $id_pro == '25') {
                            ?>
                            <script>
                                //mini, fast, 1 polegada
                                document.write("<div class='row'>" +
                                        "<div class='col-md-3'>" +
                                        "<label>Teste de Temperatura</label>" +
                                        "<input id='teste' type='text' class='form-control' name='teste' value='<?= $last->getTeste() ?>'>" +
                                        "</div>" +
                                        "<div class='col-md-3'>" +
                                        "<label >Display/LED</label>" +
                                        "<input id='skills' name='led' type='text' class='form-control' value='<?= $last->getLed() ?>'>" +
                                        "</div>" +
                                        "</div>" +
                                        "<br>");
                            </script>
                            <?php
                        } if ($id_pro == '28' || $id_pro == '29' || $id_pro == '30' || $id_pro == '31' || $id_pro == '32' || $id_pro == '33' || $id_pro == '34' || $id_pro == '35' || $id_pro == '36' || $id_pro == '37' || $id_pro == '38' || $id_pro == '39' || $id_pro == '40' || $id_pro == '41' || $id_pro == '42' || $id_pro == '43' || $id_pro == '44' || $id_pro == '45' || $id_pro == '46' || $id_pro == '47') {
                            ?>
                            <script>
                                //secador
                                document.write("<div class='row'>" +
                                        "<div class='col-md-3'>" +
                                        "<label>Montagem</label>" +
                                        "<input id='skills' name='montagemsecador' type='text' class='form-control' value='<?= $last->getMontagem() ?>'>" +
                                        "</div>" +
                                        "<div class='col-md-3'>" +
                                        "<label id='skills'>Teste do Cabo</label>" +
                                        "<input type='text' name='cabosecador' class='form-control' value='<?= $last->getCabo() ?>'>" +
                                        "</div>" +
                                        "<div class='col-md-3'>" +
                                        "<label for='email'>Teste de Aquecimento</label>" +
                                        "<input id='skills' name='aquecimentosecador' type='text' class='form-control' value='<?= $last->getTeste() ?>'>" +
                                        "</div>" +
                                        "<div class='col-md-3'>" +
                                        "<label for='email'>LED</label>" +
                                        "<input id='skills' name='ledsecador' type='text' class='form-control' value='<?= $last->getLed() ?>'>" +
                                        "</div>" +
                                        "</div>" +
                                        "<br>" +
                                        "<div class='row'>" +
                                        "<div class='col-md-3'>" +
                                        "<label for='email'>Verificação dos Bicos</label>" +
                                        "<input id='skills' name='bico' type='text' class='form-control' value='<?= $last->getEmbalagem() ?>'>" +
                                        "</div>" +
                                        "<div class='col-md-3'>" +
                                        "<label for='email'>Conferência</label>" +
                                        "<input id='skills' name='conferenciasecador' type='text' class='form-control' value='<?= $last->getConteudo() ?>'>" +
                                        "</div>" +
                                        "</div>" +
                                        "<br>");
                            </script>
                        <?php }
                        ?>
                        <br>
                        <div class="row">         
                            <div class="col-md-3">
                                <label>Polimento</label>
                                <input id="polimento" name="polimento" type="text" class="form-control" value="<?= $last->getPolimento() ?>">
                            </div>
                            <div class="col-md-3">
                                <label>Embalagem</label>
                                <input id="embalagem" name="embalagem" type="text" class="form-control" value="<?= $last->getEmbalagem() ?>">
                            </div>
                            <div class="col-md-3">
                                <label>Instrumento de Medição</label>
                                <input  type="text" class="form-control" value="<?= $last->getInstrumento_nome() . ' - ' . $last->getInstrumento_numero() ?>">
                            </div>
                            <div class="col-md-12">
                                <br>
                                <label>Observação</label>
                                <textarea rows="3" class="form-control" name="obs"><?= $last->getObs() ?></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="table-responsive">          
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Número</th>
                                        <th><?php
                                            if ($idproduto == '1' || $idproduto == '2' || $idproduto == '3' || $idproduto == '4' ||
                                                    $idproduto == '5' || $idproduto == '6' || $idproduto == '7' || $idproduto == '8' ||
                                                    $idproduto == '14' || $idproduto == '15' || $idproduto == '16' || $idproduto == '17' ||
                                                    $idproduto == '22' || $idproduto == '23' || $idproduto == '24' || $idproduto == '25') {
                                                echo 'Temperatura °C';
                                            } if ($idproduto == '28' || $idproduto == '29' || $idproduto == '30' || $idproduto == '31' ||
                                                    $idproduto == '32' || $idproduto == '33' || $idproduto == '34' || $idproduto == '35' || $idproduto == '36' || $idproduto == '37' || $idproduto == '38' || $idproduto == '39' || $idproduto == '40' || $idproduto == '41' || $idproduto == '42' || $idproduto == '43' || $idproduto == '44' || $idproduto == '45' || $idproduto == '46' || $idproduto == '47') {
                                                echo 'Potência';
                                            } if ($idproduto == '50') {
                                                echo 'Luxímetro';
                                            }
                                            ?></th>
                                        <th><?php
                                            if ($idproduto == '28' || $idproduto == '29' || $idproduto == '30' || $idproduto == '31' ||
                                                    $idproduto == '32' || $idproduto == '33' || $idproduto == '34' || $idproduto == '35' || $idproduto == '36' || $idproduto == '37' || $idproduto == '38' || $idproduto == '39' || $idproduto == '40' || $idproduto == '41' || $idproduto == '42' || $idproduto == '43' || $idproduto == '44' || $idproduto == '45' || $idproduto == '46' || $idproduto == '47') {
                                                echo 'Vazão de ar';
                                            }
                                            ?></th>
                                        <th>Não Conformidade</th>
                                        <th>Ação Corretiva</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $fichatestedao = new FichaTesteDAO();
                                    foreach ($fichatestedao->BuscarTodosFicha($id_ficha) as $ve) {
                                        ?>
                                        <tr>
                                            <td><?= $ve->getNumero() ?></td>
                                            <td><b><?= $ve->getValor() ?></b></td>
                                            <td><b><?= $ve->getOutro() ?></b></td>
                                            <?php if (true) {
                                                    
                                                }?>
                                            <td>
                                                <?= $ve->getNc() ?>
                                            </td>
                                            <td>
                                                <?= $ve->getAcao() ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
        <?php include '../estrutura/footer.php'; ?>
    </body>
</html>