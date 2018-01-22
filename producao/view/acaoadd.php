<?php
include_once '../../conexao/ConexaoPDO.php';
include_once '../../classes/dao/ProdutoDAO.php';
include_once '../../classes/modelo/Produto.php';
include_once '../../classes/dao/InstrumentoDAO.php';
include_once '../../classes/modelo/Instrumento.php';
include_once '../../classes/dao/FichaTesteDAO.php';
include_once '../../classes/modelo/FichaTeste.php';

$pesquisarNome = $_POST['pesquisanome'];
$pesquisarSaida = $_POST['pesquisadata'];
$pesquisarSituacao = $_POST['situacao'];

$id = filter_input(INPUT_GET, 'id');
$idproduto = filter_input(INPUT_GET, 'id_produto');
$nomeproduto = filter_input(INPUT_GET, 'nome_produto');
$qtd = filter_input(INPUT_GET, 'qtd');
$contador = 1;

$fichatestedao = new FichaTesteDAO();
$last = $fichatestedao->BuscarUltimoNumero($id);
$idd = $last->getNumero() + 1;
?>
<!DOCTYPE html>
<html>
    <?php include '../estrutura/head.php'; ?>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="../js/autocomp.js"></script>
    <title>Produção - Ação Corretiva</title>
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
                <div class="panel-heading" style="background-color:#222; color: white; border-bottom:1px solid #101010"><a href="javascript:window.history.go(-1)"><button class="btn btn-xs btn-default"><span class="glyphicon glyphicon-chevron-left"></span>Voltar</button></a>&nbsp;&nbsp; <b>Ficha Técnica - Testes</b></div>
                <div class="panel-body">
                    <h3><?= $nomeproduto ?></h3>
                    <br>
                    <h3>Ações Corretivas</h3>
                    <BR>
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
                                        } elseif ($idproduto == '28' || $idproduto == '29' || $idproduto == '30' || $idproduto == '31' ||
                                                $idproduto == '32' || $idproduto == '33' || $idproduto == '34' || $idproduto == '35' || $idproduto == '36' || $idproduto == '37' || $idproduto == '38' || $idproduto == '39' || $idproduto == '40' || $idproduto == '41' || $idproduto == '42' || $idproduto == '43' || $idproduto == '44' || $idproduto == '45' || $idproduto == '46' || $idproduto == '47') {
                                            echo 'Potência';
                                        } elseif ($idproduto == '50') {
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
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($fichatestedao->BuscarTodosFicha($id) as $ve) {
                                    ?>
                                    <tr>
                                        <td><?= $ve->getNumero() ?></td>
                                        <td><?= $ve->getValor() ?></td>
                                        <td><?= $ve->getOutro() ?></td>
                                        <td><?= $ve->getNc() ?></td>
                                        <td><?= $ve->getAcao() ?></td>
                                        <td><button type="button" name="insert" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal<?php echo $ve->getId(); ?> " align="center"><i class="fa fa-pencil"></i><span class="glyphicon glyphicon-pencil"></span></button>
                                            <a  href="../../classes/controle/FichaTecnicaControle.php?deletar=<?php echo $ve->getId(); ?>">
                                                <button type="button" name="deletar" class="btn btn-danger btn-xs"  align="center"><i class="fa fa-trash"></i><span class="glyphicon glyphicon-trash"></span></button>
                                            </a>
                                        </td>
                                    </tr>
                                <div class="modal fade" id="myModal<?php echo $ve->getId(); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title text-center" id="myModalLabel" class="lizz" style=" text-transform: uppercase; font-size:25px;" ><b><i class="fa fa-pencil"></i>&nbsp;Editar</b></h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <div class="col-md-12">
                                                        <form action="../../classes/controle/FichaTecnicaControle.php" method="post">
                                                            <div class="row">
                                                                <input type="hidden" name="id_ficha" value="<?= $id ?>">
                                                                <input type="hidden" name="id_produto" value="<?= $idproduto ?>">
                                                                <input type="hidden" name="qtd" value="<?= $qtd ?>">
                                                                <input type="hidden" name="nome_produto" value="<?= $nomeproduto ?>">
                                                                <input type="hidden" name="id_teste" value="<?= $ve->getId() ?>">
                                                                <div class="col-md-2">
                                                                    <label>Número</label>
                                                                    <input type="number" required="" name="numero" class="form-control" value="<?= $ve->getNumero() ?>">
                                                                </div>
                                                                <?php
                                                                if ($idproduto == '1' || $idproduto == '2' || $idproduto == '3' || $idproduto == '4' ||
                                                                        $idproduto == '5' || $idproduto == '6' || $idproduto == '7' || $idproduto == '8' ||
                                                                        $idproduto == '14' || $idproduto == '15' || $idproduto == '16' || $idproduto == '17' ||
                                                                        $idproduto == '22' || $idproduto == '23' || $idproduto == '24' || $idproduto == '25' ||
                                                                        $idproduto == '28' || $idproduto == '29' || $idproduto == '30' || $idproduto == '31' ||
                                                                        $idproduto == '32' || $idproduto == '33' || $idproduto == '34' || $idproduto == '35' || $idproduto == '36' || $idproduto == '37' || $idproduto == '38' || $idproduto == '39' || $idproduto == '40' || $idproduto == '41' || $idproduto == '42' || $idproduto == '43' || $idproduto == '44' || $idproduto == '45' || $idproduto == '46' || $idproduto == '47' ||
                                                                        $idproduto == '50') {
                                                                    ?>

                                                                    <div class="col-md-2">
                                                                        <label>
                                                                            <?php
                                                                            if ($idproduto == '1' || $idproduto == '2' || $idproduto == '3' || $idproduto == '4' ||
                                                                                    $idproduto == '5' || $idproduto == '6' || $idproduto == '7' || $idproduto == '8' ||
                                                                                    $idproduto == '14' || $idproduto == '15' || $idproduto == '16' || $idproduto == '17' ||
                                                                                    $idproduto == '22' || $idproduto == '23' || $idproduto == '24' || $idproduto == '25') {
                                                                                echo 'Temperatura °C';
                                                                            } elseif ($idproduto == '28' || $idproduto == '29' || $idproduto == '30' || $idproduto == '31' ||
                                                                                    $idproduto == '32' || $idproduto == '33' || $idproduto == '34' || $idproduto == '35' || $idproduto == '36' || $idproduto == '37' || $idproduto == '38' || $idproduto == '39' || $idproduto == '40' || $idproduto == '41' || $idproduto == '42' || $idproduto == '43' || $idproduto == '44' || $idproduto == '45' || $idproduto == '46' || $idproduto == '47') {
                                                                                echo 'Potência';
                                                                            } elseif ($idproduto == '50') {
                                                                                echo 'Luxímetro';
                                                                            }
                                                                            ?>
                                                                        </label>
                                                                        <input type="number" name="valor" class="form-control" value="<?= $ve->getValor() ?>">
                                                                    </div>
                                                                    <?php
                                                                }
                                                                if ($idproduto == '28' || $idproduto == '29' || $idproduto == '30' || $idproduto == '31' ||
                                                                        $idproduto == '32' || $idproduto == '33' || $idproduto == '34' || $idproduto == '35' || $idproduto == '36' || $idproduto == '37' || $idproduto == '38' || $idproduto == '39' || $idproduto == '40' || $idproduto == '41' || $idproduto == '42' || $idproduto == '43' || $idproduto == '44' || $idproduto == '45' || $idproduto == '46' || $idproduto == '47') {
                                                                    ?>
                                                                    <div class="row">
                                                                        <div class="col-md-2">
                                                                            <label>Vazão de ar</label>
                                                                            <input type="text" name="outro1" class="form-control" value="<?= $ve->getOutro() ?>">
                                                                        </div>
                                                                    </div>
                                                                <?php }
                                                                ?>
                                                            </div>
                                                            <br>
                                                            <div class="row">
                                                                <div class="col-md-5">
                                                                    <label>Não Conformidade</label>
                                                                    <input type="text" name="nc" class="form-control" value="<?= $ve->getNc() ?>">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-5">
                                                                    <label>Ação Corretiva</label>
                                                                    <input type="text" name="acao" class="form-control" value="<?= $ve->getAcao() ?>">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <label><br><br></label>
                                                                    <button type="submit" name="editateste1" class="btn btn-success">Editar</button>
                                                                </div>
                                                            </div>
                                                        </form>         
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> 
        </div>
        <?php include '../estrutura/footer.php'; ?>
    </body>
</html>