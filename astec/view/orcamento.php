<?php
include_once '../../conexao/ConexaoPDO.php';
include_once '../../classes/dao/OrcamentoDAO.php';
include_once '../../classes/modelo/Orcamento.php';
include_once '../../classes/dao/HistoricoOrcamentoDAO.php';
include_once '../../classes/modelo/HistoricoOrcamento.php';


$pesquisarNome = $_POST['pesquisanome'];
$pesquisarSaida = $_POST['pesquisadata'];
$pesquisarSituacao = $_POST['situacao'];

$msg = filter_input(INPUT_GET, 'msg');
?>
<!DOCTYPE html>
<html>
    <?php include '../estrutura/head.php'; ?>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <title>Área - Orçamentos</title>

    <body>
        <?php include '../estrutura/menu.php'; ?>
        <div class="w3-container w3-card-4 w3-light-grey  w3-margin">
            <h2 class="w3-center"><b><i class="fa fa-check-square-o" style="font-size:34px"></i> Orçamento</b></h2>
            <br>
            <div class="w3-row">
                <div class="w3-col m8">   
                    <button onclick="document.getElementById('id01').style.display = 'block'" class="w3-button w3-green"><i class="fa fa-plus"></i> Cadastrar</button>
                </div>  
                <div id="id01" class="w3-modal">
                    <div class="w3-modal-content">
                        <div class="w3-container">
                            <span onclick="document.getElementById('id01').style.display = 'none'" class="w3-button w3-display-topright">&times;</span>
                            <br>
                            <h2><center>Cadastro de Orçamento</center></h2>
                            <br>
                            <?php //include ''; ?>
                            <form action="../../classes/controle/orcamentoControle.php" method="POST">
                                <div class="w3-row-padding">
                                    <div class="w3-third">
                                        <script>
                                            $(function () {
                                                $("#skills").autocomplete({
                                                    source: 'ajax.php'
                                                });
                                            });
                                        </script>
                                        <label><b>Nome Cliente</b></label>
                                        <input id="skills" class="w3-input w3-border" type="text" placeholder="Cliente" name="cliente">
                                        <input  type="hidden"  name="usuario" value="<?= $nome_user ?>">
                                    </div>
                                    <div class="w3-third">
                                        <label><strong>N° de Série</strong></label>
                                        <input  class="w3-input w3-border" type="text" placeholder="Número de Serie" name="numero">
                                    </div>
                                    <div class="w3-third">
                                        <label><strong>N° Ocorrência</strong></label>
                                        <input  class="w3-input w3-border" type="text" placeholder="Ocorrência" name="ocorrencia">
                                    </div>
                                    <br>
                                    <div class="w3-col s9">   
                                        <br>
                                        <label><strong>Descrição</strong></label>
                                        <input class="w3-input w3-border" type="text" placeholder="Descrição/Produto" name="descricao">
                                    </div>  
                                    <div class="w3-col s3">
                                        <br>
                                        <label><strong>Status</strong></label>
                                        <select class="w3-select w3-border"  name="status">
                                            <option value="A CONSERTAR">ESPERANDO</option>
                                            <option value="CONSERTADO">PAGO</option>
                                        </select>
                                        <br>
                                    </div>
                                    <div class="w3-col s12">   
                                        <br>
                                        <label><strong>Observação</strong></label>
                                        <textarea class="w3-input w3-border" rows="3" type="text" placeholder="Descrição/Produto" name="observacao"></textarea>
                                    </div>  
                                </div>  
                                <br>
                                <div class="w3-row-padding">
                                    <button  class="w3-button w3-green w3-right" name="gravar"><i class="fa fa-plus"></i> Gravar</button>
                                </div>
                                <br>
                                <br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <div class="w3-row">
                <form action="" method="POST">
                    <div class="w3-col s3">     
                        <label>Nome do Cliente</label>
                        <input class="w3-input w3-border" type="text" placeholder="Pesquisa por Nome" name="pesquisanome">
                    </div>               
                    <div class="w3-col s1">
                        <br>
                        <button class="w3-button w3-blue-grey"><i class="fa fa-search"></i></button>
                    </div>
                    <div class="w3-col s3">  
                        <label>Data de Saida</label>
                        <input class="w3-input w3-border" type="date" placeholder="Pesquisar por Data de Saida" name="pesquisadata">
                    </div>               
                    <div class="w3-col s1">
                        <br>
                        <button class="w3-button w3-blue-grey"><i class="fa fa-search"></i></button>
                    </div>
                    <div class="w3-col s3">  
                        <label>Situação</label>
                        <select class="w3-select w3-border"  name="situacao">
                            <option value="" disabled selected>Selecione...</option>
                            <option value="ENVIADO">ENVIADO</option>
                            <option value="PENDENTE">PENDENTE</option>
                            <option value="EXCLUIDO">EXCLUIDO</option>
                        </select>
                    </div>               
                    <div class="w3-col s1">
                        <br>
                        <button class="w3-button w3-blue-grey"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
            <br>
            <br>
            <div class="w3-row">
                <table class="w3-table-all w3-xmedium w3-houver">
                    <tr>
                        <th>Cliente</th>
                        <th>N° Série</th>
                        <th>N° Ocorrência</th>
                        <th>Entrada</th>
                        <th>Saida</th>
                        <th>Status</th>
                        <th>Situação</th>

                        <th></th>
                    </tr>
                    <?php
                    $q = new OrcamentoDAO();
                    $resultado = $q->BuscarTodosParaSair();
                    if ($pesquisarNome != null) {
                        $resultado = $q->BuscarNome($pesquisarNome);
                    } elseif ($pesquisarSaida != null) {
                        $resultado = $q->BuscarSaida($pesquisarSaida);
                    } elseif ($pesquisarSituacao != null) {
                        $resultado = $q->BuscarSituacao($pesquisarSituacao);
                    } else {
//                            $resultado = $q->BuscarTodos();
                    }
                    foreach ($resultado as $ve) {
                        ?>
                        <tr>
                            <td><?= $ve->getCliente() ?></td>
                            <td><?= $ve->getNumeroserie() ?></td>
                            <td><?= $ve->getOcorrencia() ?></td>
                            <td><?= date("d/m/Y", strtotime($ve->getData())) ?></td>
                            <?php if ($ve->getSaida() == '0000-00-00') { ?>
                                <td></td> 
                            <?php } else { ?>
                                <td><?= date("d/m/Y", strtotime($ve->getSaida())); ?></td>
                            <?php } ?>
                            <td><?= $ve->getStatus() ?></td>
                            <td><?= $ve->getSituacao() ?></td>

                            <td>
                                <a href="../../classes/controle/orcamentoControle.php?id=<?= $ve->getId() ?>&user=<?= $nome_user ?>"><button class="w3-button w3-teal" title="Enviar" type="submit" name="enviar"><i class="fa fa-send"></i></button></a>
                                <button onclick="document.getElementById('id<?= $ve->getId() ?>').style.display = 'block'" title="Editar"class="w3-button w3-blue"><i class="fa fa-edit"></i></button>
                                <div id="id<?= $ve->getId() ?>" class="w3-modal">
                                    <div class="w3-modal-content w3-card-2 w3-animate-zoom" style="max-width:800px">

                                        <div class="w3-center"><br>
                                            <span onclick="document.getElementById('id<?= $ve->getId() ?>').style.display = 'none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                                        </div>
                                        <h2><center>Editar Orcamento</center></h2>
                                        <br>
                                        <form action="../../classes/controle/orcamentoControle.php" method="POST">
                                            <div class="w3-row-padding">
                                                <div class="w3-row-padding">
                                                    <div class="w3-third">
                                                        <script>
                                                            $(function () {
                                                                $("#skills").autocomplete({
                                                                    source: 'ajax.php'
                                                                });
                                                            });
                                                        </script>
                                                        <label><b>Nome Cliente</b></label>
                                                        <input id="skills" class="w3-input w3-border" type="text" placeholder="Cliente" name="cliente" value="<?= $ve->getCliente() ?>">
                                                        <input  type="hidden"  name="usuario" value="<?= $nome_user ?>">
                                                        <input  type="hidden"  name="idcliente" value="<?= $ve->getCliente_id() ?>">
                                                        <input  type="hidden"  name="idocamento" value="<?= $ve->getId() ?>">
                                                    </div>
                                                    <div class="w3-third">
                                                        <label><strong>N° de Série</strong></label>
                                                        <input  class="w3-input w3-border" type="text" placeholder="Número de Serie" name="numero" value="<?=$ve->getNumeroserie() ?>">
                                                    </div>
                                                    <div class="w3-third">
                                                        <label><strong>N° Ocorrência</strong></label>
                                                        <input  class="w3-input w3-border" type="text" placeholder="Ocorrência" name="ocorrencia" value="<?= $ve->getOcorrencia() ?>">
                                                    </div>
                                                    <br>
                                                    <div class="w3-col s9">   
                                                        <br>
                                                        <label><strong>Descrição</strong></label>
                                                        <input class="w3-input w3-border" type="text" placeholder="Descrição/Produto" name="descricao" value="<?= $ve->getDescricao() ?>">
                                                    </div>  
                                                    <div class="w3-col s3">
                                                        <br>
                                                        <label><strong>Status</strong></label>
                                                        <select class="w3-select w3-border"  name="status">
                                                            <option value="<?= $ve->getStatus() ?>"><?= $ve->getStatus() ?></option>
                                                            <option value="A CONSERTAR">A CONSERTAR</option>
                                                            <option value="CONSERTADO">CONSERTADO</option>
                                                        </select>
                                                        <br>
                                                    </div>
                                                    <div class="w3-col s12">   
                                                        <br>
                                                        <label><strong>Observação</strong></label>
                                                        <textarea class="w3-input w3-border" rows="3" type="text" placeholder="Descrição/Produto" name="observacao"><?= $ve->getObsercacao() ?></textarea>
                                                    </div>  
                                                    <div class="w3-col s4">
                                                        <br>
                                                        <label><strong>Situacao</strong></label>
                                                        <select class="w3-select w3-border"  name="situacao">
                                                            <option value="<?= $ve->getSituacao() ?>"><?= $ve->getSituacao() ?></option>
                                                            <option value="PENDENTE">PENDENTE</option>
                                                            <option value="ENVIADO">ENVIADO</option>
                                                            <option value="EXCLUIDO">EXCLUIDO</option>
                                                        </select>
                                                        <br>
                                                    </div>
                                                    <div class="w3-col s4">
                                                        <br>
                                                        <label><strong>Saida</strong></label>
                                                        <input class="w3-input w3-border" type="data" placeholder="Descrição/Produto" name="saida" value="<?= date("d/m/Y", strtotime($ve->getSaida())) ?>">
                                                        <br>
                                                    </div>
                                                    <div class="w3-col s4">
                                                        <br>
                                                        <br>
                                                        <button  class="w3-button w3-blue w3-right" name="editar"><i class="fa fa-plus"></i> Editar</button>
                                                    </div>
                                                </div>


                                            </div>  
                                            <br>
                                        </form>
                                    </div>
                                </div>
                                <a href="../../classes/controle/orcamentoControle.php?delete=<?= $ve->getId() ?>&user=<?= $nome_user ?>"><button class="w3-button w3-red" title="Excluir"><i class="fa fa-trash"></i></button></a>
                                <button onclick="document.getElementById('idm<?= $ve->getId() ?>').style.display = 'block'" class="w3-button w3-yellow" title="Historico"><i class="fa fa-eye"></i></button>
                                <div id="idm<?= $ve->getId() ?>" class="w3-modal">
                                    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

                                        <div class="w3-center"><br>
                                            <span onclick="document.getElementById('idm<?= $ve->getId() ?>').style.display = 'none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                                        </div>
                                        <h2><center>Historico de Operações</center></h2>
                                        <br>
                                        <form action="../../classes/controle/orcamentoControle.php" method="POST">
                                            <div class="w3-row-padding">
                                                <center><table class="w3-table-all">
                                                        <tr>
                                                            <th>Usuário</th>
                                                            <th>Data</th>
                                                            <th>Operação</th>
                                                        </tr>
                                                        <?php
                                                        $q2 = new HistoricoOrcamentoDAO();
                                                        $resultado2 = $q2->BuscarTodos($ve->getId());
                                                        foreach ($resultado2 as $ve2) {
                                                            ?>
                                                            <tr>
                                                                <td><?= $ve2->getUsuario() ?></td>
                                                                <td><?= date("d/m/Y", strtotime($ve2->getData())) ?></td>
                                                                <td><?= $ve2->getOperacao() ?></td>

                                                            </tr>
                                                        <?php } ?>
                                                    </table></center>  
                                            </div>  
                                            <br>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
                </form>
            </div>
            <br>
        </div>
        <?php include '../estrutura/footer.php'; ?>
    </body>
</html>