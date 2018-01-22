<?php
include_once '../../conexao/ConexaoPDO.php';
include_once '../../classes/dao/FichaTecnicaDAO.php';
include_once '../../classes/modelo/FichaTecnica.php';

$pesquisarNome = $_POST['pesquisaproduto'];
$pesquisarLote = $_POST['pesquisalote'];
$pesquisarOp = $_POST['pesquisaop'];
$pesquisarData = $_POST['pesquisadata'];

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
                <div class="panel-heading" style="background-color:#222; color: white; border-bottom:1px solid #101010">Ficha Técnica - Ação Corretiva</div>
                <div class="panel-body">
                    <form action="" method="POST">
                        <div class="row">                      
                            <div class="col-md-3">
                                <label>Pesquisar Lote</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="pesquisalote" placeholder="">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-block">Pesquisar</button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label>Pesquisar N°OP</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="" name="pesquisaop">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-block">Pesquisar</button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label>Pesquisar Produto</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="" name="pesquisaproduto">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-block">Pesquisar</button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label>Pesquisar por Data</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" placeholder="" name="pesquisadata">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-block">Pesquisar</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </form>
                    <br>
                    <hr>
                    <br>
                    <div class="table-responsive">          
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Produto</th>
                                    <th>Lote</th>
                                    <th>N° OP</th>
                                    <th>Qtd</th>
                                    <th>Data</th>
                                    <th>Situação</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $fichadao = new FichaTecnicaDAO();
                                $resultado = $fichadao->BuscarTodos();

                                if ($pesquisarNome != null) {
                                    $resultado = $fichadao->BuscarTodosNome($pesquisarNome);
                                } elseif ($pesquisarLote != null) {
                                    $resultado = $fichadao->BuscarTodosLote($pesquisarLote);
                                } elseif ($pesquisarOp != null) {
                                    $resultado = $fichadao->BuscarTodosOp($pesquisarOp);
                                } elseif ($pesquisarData != null) {
                                    $resultado = $fichadao->BuscarTodosData($pesquisarData);
                                }
                                foreach ($resultado as $ve) {
                                    ?>
                                    <tr>
                                        <td><?= $ve->getProdutos_nome() ?></td>
                                        <td><?= $ve->getLote() ?></td>
                                        <td><?= $ve->getOrdemproducao() ?></td>
                                        <td><?= $ve->getQuantidade() ?></td>
                                        <td><?= date("d/m/Y", strtotime($ve->getDatainicio())) ?></td>
                                         <?php if ($ve->getSituacao() == 'FECHADA') { ?>
                                            <td style="color: red; font-weight: bold;"><?= $ve->getSituacao() ?></td>
                                        <?php } if ($ve->getSituacao() == 'ABERTA') { ?>
                                            <td style="color: green; font-weight: bold;"><?= $ve->getSituacao() ?></td>   
                                        <?php } ?>
                                        <td>
                                            <a href="http://192.168.1.252:1000/server/intranet/producao/view/acaoadd.php?id=<?= $ve->getId() ?>&id_produto=<?= $ve->getProdutos_id() ?>&nome_produto=<?= $ve->getProdutos_nome() ?>&qtd=<?= $ve->getQuantidade() ?>"><button class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-plus"></span></button></a>
                                        </td>
                                    </tr>
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