<?php
include_once '../conexao/ConexaoPDO.php';
include_once '../classes/modelo/Serasa.php';
include_once '../classes/dao/SerasaDAO.php';

$msg = filter_input(INPUT_GET, 'msg');

$pesquisarCodigo = $_POST['pesquisarCodigo'];
$pesquisarNome = $_POST['pesquisarNome'];
$pesquisarEmpresa = $_POST['pesquisarEmpresa'];
?>
<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="shortcut icon" type="image/x-icon" href="../img/ico.png">
        <title>Cadastro do Clientes Serasa</title>
    </head>
    <body style="background-color: #C0C0C0">


        <br>
        <br>
        <br>
        <div class="container">
            <?php if ($msg == 1) { ?>
                <div class="alert alert-success">
                    <strong>Sucesso!</strong> Cadastrado.
                    <a class="pull-right" href="serasa.php"><span class="glyphicon">&#xe014;</span></a>
                </div>
            <?php }if ($msg == 2) { ?>
                <div class="alert alert-danger">
                    <strong>Sucesso!</strong> Excluido.
                    <a class="pull-right" href="serasa.php"><span class="glyphicon">&#xe014;</span></a>
                </div>
            <?php } if ($msg == 3) { ?>
                <div class="alert alert-warning">
                    <strong>Sucesso!</strong> Alterado.
                    <a class="pull-right" href="serasa.php"><span class="glyphicon">&#xe014;</span></a>
                </div>
            <?php } if ($msg == 4) { ?>
                <div class="alert alert-success">
                    <strong>Sucesso!</strong> Meta editado.
                    <a class="pull-right" href="serasa.php"><span class="glyphicon">&#xe014;</span></a>
                </div>
            <?php } ?>
            <h2></h2>
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-heading"><span class="glyphicon glyphicon-plus"></span> Cadastro de Cliente Serasa</div>
                    <div class="panel-body">
                        <form action="../classes/controle/SerasaControle.php" method="POST">

                            <div class="col-md-2">
                                <label>Cod. Cliente</label>
                                <input type="text" class="form-control" placeholder="Codigo" name="codigo">

                            </div>
                            <div class="col-md-4">
                                <label>Nome</label>
                                <input type="text" class="form-control" placeholder="Nome" name="nome">
                            </div>
                            <div class="col-md-4">
                                <div class="form-group col-md-12">
                                    <div class="form-group">
                                        <label for="sel1">Empresa</label>
                                        <select class="form-control" name="empresa" id="sel1">
                                            <option value="S R DOS SANTOS EQUIPAMENTOS">S R DOS SANTOS EQUIPAMENTOS</option>
                                            <option value="DSA INDUSTRIA">DSA INDUSTRIA</option>
                                            <option value="PETLIZZE">PETLIZZE</option>
                                            
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <br>
                                <button type="submit" name="grav" class="btn btn-success" value="GRAVAR" >GRAVAR</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-heading"><span class="glyphicon glyphicon-search"></span> Pesquisar </div>
                    <div class="panel-body">
                        <br>
                        <form action="" method="POST">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="pesquisarCodigo" placeholder="Pesquisa Por Codigo...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-secondary" type="submit" name="pesquisaDescricao"><span class="glyphicon glyphicon-search"></span>Pesquisar</button>
                                    </span>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="pesquisarNome" placeholder="Pesquisa por nome...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-secondary" type="submit" name="pesquisaDescricao"><span class="glyphicon glyphicon-search"></span>Pesquisar</button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="pesquisarEmpresa" placeholder="Pesquisa por Empresa...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-secondary" type="submit" name="pesquisaDescricao"><span class="glyphicon glyphicon-search"></span>Pesquisar</button>
                                    </span>
                                </div>
                            </div>
                        </form><br>
                        <br>
                        <div class="row">
                            <br>
                            <br>
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-10">
                                <table class="table table-hover">

                                    <tr>
                                        <th>Cod. Cliente</th>
                                        <th>Nome</th>
                                        <th>Empresa</th>
                                        <th></th>
                                    </tr>
                                    <?php
                                    $q = new SerasaDAO();
                                    $resultado = $q->BuscarTodos();

                                    if ($pesquisarCodigo != null) {
                                        $resultado = $q->BuscarCodigo($pesquisarCodigo);
                                    } elseif ($pesquisarNome != null) {
                                        $resultado = $q->BuscarNome($pesquisarNome);
                                    } elseif ($pesquisarEmpresa != null) {
                                        $resultado = $q->BuscarEmpresa($pesquisarEmpresa);
                                    } else {
                                        $resultado = $q->BuscarTodos();
                                    }

                                    foreach ($resultado as $ve) {
                                        ?>
                                        <tr>
                                            <td><?= $ve->getCodigo() ?></td>
                                            <td><?= $ve->getNome() ?></td>
                                            <td><?= $ve->getEmpresa() ?></td>
                                            <td><button type="button" name="insert" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal<?php echo $ve->getId(); ?> " align="center"><i class="fa fa-pencil"></i><span class="glyphicon glyphicon-pencil"></span></button>
                                                <a  href="../classes/controle/SerasaControle.php?deletar=<?php echo $ve->getId(); ?>">
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
                                                                <form action="../classes/controle/SerasaControle.php" method="post">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-3">
                                                                            <label>Codigo</label>           
                                                                            <input type="hidden" name="id" value="<?= $ve->getId() ?>">
                                                                            <input type="text" id="nome" name="codigo" value="<?= $ve->getCodigo() ?>" class="form-control"   >
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-md-6">
                                                                            <label>Nome</label>           
                                                                            <input type="text" id="nome" name="nome" value="<?= $ve->getNome() ?>" class="form-control"   >
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-md-6">
                                                                            <label>Empresa</label>           
                                                                            <input type="text" id="nome" name="empresa" value="<?= $ve->getEmpresa() ?>" class="form-control"   >
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
                                </table>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>

</body>
</html>