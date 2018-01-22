<?php
include_once '../../conexao/ConexaoPDO.php';
include_once '../../classes/dao/ProdutoDAO.php';
include_once '../../classes/modelo/Produto.php';
include_once '../../classes/dao/InstrumentoDAO.php';
include_once '../../classes/modelo/Instrumento.php';
include_once '../../classes/dao/FichaTesteDAO.php';
include_once '../../classes/modelo/FichaTeste.php';

$msg = $_GET['msg'];
?>
<!DOCTYPE html>
<html>
    <?php include '../estrutura/head.php'; ?>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="../js/autocomp.js"></script>
    <title>Produção - Instrumentos</title>
    <body>
        <?php include '../estrutura/menu.php'; ?>
        <div class="container-fluid">
            <br>
            <?php if ($msg == '1') { ?>
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <strong>Successo!</strong> Instrumento Cadastrado.
                </div>
            <?php } ?>
            <?php if ($msg == '2') { ?>
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <strong>Successo!</strong> Instrumento Excluido .
                </div>
            <?php } ?>
            <?php if ($msg == '3') { ?>
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <strong>Successo!</strong> Instrumento Alterado .
                </div>
            <?php } ?>

            <div class="panel panel-primary" style="border:1px solid #101010">
                <!-- Default panel contents -->
                <div class="panel-heading" style="background-color:#222; color: white; border-bottom:1px solid #101010">Ficha Técnica - Instrumentos</div>
                <div class="panel-body">
                    <form action="../../classes/controle/InstrumentoControle.php" method="POST">
                        <div class="col-md-2">
                            <label>Nome</label>
                            <input type="text" class="form-control" placeholder="Nome" name="nome">
                        </div>
                        <div class="col-md-4">
                            <label>Número</label>
                            <input type="text" class="form-control" placeholder="Numero de Identificação" name="numero">
                        </div>
                        <div class="col-md-2">
                            <br>
                            <button type="submit" name="grav" class="btn btn-success" value="GRAVAR" >GRAVAR</button>
                        </div>
                    </form>
                    <br>

                    <div class="col-md-12">
                        <div class="table-responsive">  
                            <br>
                            <br>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Cod.</th>
                                        <th>Nome</th>
                                        <th>Numero</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $inst = new InstrumentoDAO();
                                    foreach ($inst->BuscarTodos() as $ve) {
                                        ?>
                                        <tr>
                                            <td><?= $ve->getId() ?></td>
                                            <td><?= $ve->getNome() ?></td>
                                            <td><?= $ve->getNumero() ?></td>
                                            <td>
                                              <td><button type="button" name="insert" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal<?php echo $ve->getId(); ?> " align="center"><i class="fa fa-pencil"></i><span class="glyphicon glyphicon-pencil"></span></button>
                                                <a  href="../../classes/controle/InstrumentoControle.php?deletar=<?php echo $ve->getId(); ?>">
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
                                                            <div class="col-md-8">
                                                                <form action="../../classes/controle/InstrumentoControle.php" method="post">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-3">
                                                                            <label>Nome</label>           
                                                                            <input type="hidden" name="id" value="<?= $ve->getId() ?>">
                                                                            <input type="text" id="nome" name="nome" value="<?= $ve->getNome() ?>" class="form-control"   >
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-md-6">
                                                                            <label>Numero</label>           
                                                                            <input type="text" id="nome" name="numero" value="<?= $ve->getNumero() ?>" class="form-control"   >
                                                                        </div>
                                                                    </div>
                                                                                                                                       <div class="row">
                                                                        <div class="form-group col-md-6">
                                                                            <button type="submit"  name="alterar" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Editar</button>
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
        </div>
        <?php include '../estrutura/footer.php'; ?>
    </body>
</html>