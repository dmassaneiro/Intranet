<?php
include_once '../../conexao/ConexaoPDO.php';
include_once '../../classes/dao/ImobilizadoDAO.php';
include_once '../../classes/modelo/Imobilizado.php';

$pesquisarNome = $_POST['pesquisanome'];
$pesquisarSaida = $_POST['pesquisadata'];
$pesquisarSituacao = $_POST['situacao'];

$msg = filter_input(INPUT_GET, 'msg');
?>
<!DOCTYPE html>
<html>
    <?php include '../estrutura/head.php'; ?>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <title>TI - Imobilizados</title>
   
        <?php
        $cr = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $max = strlen($cr) - 1;
        $gera = null;
        for ($i = 0; $i < 16; $i++) {
            $gera .= $cr{mt_rand(0, $max)};
        }
        $gera = str_split($gera, 4);
        ?>
    
    <body>
        <?php include '../estrutura/menu.php'; ?>
        <div class="w3-container w3-card-4 w3-light-grey  w3-margin">
            <h2 class="w3-center"><b><i class="fa fa-folder" style="font-size:36px"></i> Imobilizados</b></h2>
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
                            <h2><center>Cadastro de Imobilizados</center></h2>
                            <br>
                            <?php //include ''; ?>
                            <form action="../../classes/controle/ImobilizadoControle.php" method="POST">
                                <div class="w3-row-padding">
                                    <div class="w3-third">
                                        <label><strong>Tipo Imobilizado</strong></label>
                                        <select class="w3-select w3-border" name="tipo" id="tipo" onclick="adicionatotal(this)">
                                            <option value="1">PC- GABINETE</option>
                                            <option value="2">MONITOR</option>
                                            <option value="3">TECLADO</option>
                                            <option value="4">MOUSE</option>
                                            <option value="5">CX. DE SOM</option>
                                            <option value="6">TELEFONE</option>
                                            <option value="7">FONE TELEFONE</option>
                                            <option value="8">IMPRESSORA</option>
                                            <option value="9">REDE</option>
                                            <option value="10">COMPONENTES- PC</option>
                                            <option value="11">MAQUINAS</option>
                                            <option value="12">CAMERA</option>
                                            <option value="13">CELULAR</option>
                                            <option value="14">OUTROS</option>
                                        </select>
                                    </div>
                                    <script>
                                        //adiciona ao total
                                        function adicionatotal(t) {
                                            var $custo2 = document.getElementById('codigo');
                                            var $t = t;
                                            if ($t.value === "1") {
                                                $custo2.value = "PC-<?=$gera[0]?>";
                                            }
                                            if ($t.value === "2") {
                                                $custo2.value = "MONIT-<?=$gera[0]?>";
                                            }
                                            if ($t.value === "3") {
                                                $custo2.value = "TECLA-<?=$gera[0]?>";
                                            }
                                            if ($t.value === "4") {
                                                $custo2.value = "MOUSE-<?=$gera[0]?>";
                                            }
                                            if ($t.value === "5") {
                                                $custo2.value = "SOM-<?=$gera[0]?>";
                                            }
                                            if ($t.value === "6") {
                                                $custo2.value = "TELEF-<?=$gera[0]?>";
                                            }
                                            if ($t.value === "7") {
                                                $custo2.value = "FONE-<?=$gera[0]?>";
                                            }
                                            if ($t.value === "8") {
                                                $custo2.value = "IMPRE-<?=$gera[0]?>";
                                            }
                                            if ($t.value === "9") {
                                                $custo2.value = "REDE-<?=$gera[0]?>";
                                            }
                                            if ($t.value === "10") {
                                                $custo2.value = "COMPO-<?=$gera[0]?>";
                                            }
                                            if ($t.value === "11") {
                                                $custo2.value = "MAQUI-<?=$gera[0]?>";
                                            }
                                            if ($t.value === "12") {
                                                $custo2.value = "CAMER-<?=$gera[0]?>";
                                            }
                                            if ($t.value === "13") {
                                                $custo2.value = "CELUL-<?=$gera[0]?>";
                                            }
                                            if ($t.value === "14") {
                                                $custo2.value = "OUTRO-<?=$gera[0]?>";
                                            }
                                        }
                                    </script>
                                    <div class="w3-third">
                                        <label><b>Código</b></label>
                                        <input  class="w3-input w3-border" id="codigo" type="text" name="codigo" value="">
                                        <input  type="hidden"  name="usuario" value="<?= $nome_user ?>">
                                    </div>
                                    <div class="w3-third">
                                        <label><b>Setor</b></label>
                                        <input id="skills" class="w3-input w3-border" type="text" placeholder="Setor" name="setor">
                                        <input  type="hidden"  name="usuario" value="<?= $nome_user ?>">
                                    </div>
                                    <br>
                                    <div class="w3-col s9">   
                                        <br>
                                        <label><strong>Usuário</strong></label>
                                        <input class="w3-input w3-border" type="text" placeholder="Usuário" name="usuario">
                                    </div>  
                                    <div class="w3-col s12">   
                                        <br>
                                        <label><strong>Descrição</strong></label>
                                        <textarea class="w3-input w3-border" rows="3" type="text" placeholder="Descrição Imobilizado" name="descricao"></textarea>
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
                        <label>Descrição</label>
                        <input class="w3-input w3-border" type="text" placeholder="Pesquisar por Descrição" name="pesquisanome">
                    </div>               
                    <div class="w3-col s1">
                        <br>
                        <button class="w3-button w3-blue-grey"><i class="fa fa-search"></i></button>
                    </div>
                    <div class="w3-col s3">  
                        <label>Setor</label>
                        <input class="w3-input w3-border" type="text" placeholder="Setor" name="pesquisadata">
                    </div>               
                    <div class="w3-col s1">
                        <br>
                        <button class="w3-button w3-blue-grey"><i class="fa fa-search"></i></button>
                    </div>
                    <div class="w3-col s3">  
                        <label>Tipo Imobilizado</label>
                        <select class="w3-select w3-border"  name="situacao">
                            <option value="" disabled selected>Selecione...</option>
                            <option value="1">PC- GABINETE</option>
                            <option value="2">MONITOR</option>
                            <option value="3">TECLADO</option>
                            <option value="4">MOUSE</option>
                            <option value="5">CX. DE SOM</option>
                            <option value="6">TELEFONE</option>
                            <option value="7">FONE TELEFONE</option>
                            <option value="8">IMPRESSORA</option>
                            <option value="9">REDE</option>
                            <option value="10">COMPONENTES- PC</option>
                            <option value="11">MAQUINAS</option>
                            <option value="12">CAMERA</option>
                            <option value="13">CELULAR</option>
                            <option value="14">OUTROS</option>
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
                        <th>Código</th>
                        <th>Descrição</th>
                        <th>User</th>
                        <th>Tipo</th>
                        <th>Setor</th>
                        <th></th>
                    </tr>
                    <?php
                    $q = new ImobilizadoDAO();
                    $resultado = $q->BuscarTodos();
                    if ($pesquisarNome != null) {
                        $resultado = $q->BuscarNome($pesquisarNome);
                    } elseif ($pesquisarSaida != null) {
                        $resultado = $q->BuscarSetor($pesquisarSaida);
                    } elseif ($pesquisarSituacao != null) {
                        $resultado = $q->BuscarSituacao($pesquisarSituacao);
                    } else {
//                            $resultado = $q->BuscarTodos();
                    }
                    foreach ($resultado as $ve) {
                        ?>
                        <tr>
                            <td><?= $ve->getCodigo() ?></td>
                            <td><?= $ve->getDescricao() ?></td>
                            <td><?= $ve->getUsuario() ?></td>
                            <td><?= $ve->getTipoimobilizado_nome() ?></td>
                            <td><?= $ve->getSetor() ?></td>
                            <td>
                                <button onclick="document.getElementById('id<?= $ve->getId() ?>').style.display = 'block'" title="Editar"class="w3-button w3-blue"><i class="fa fa-edit"></i></button>
                                <div id="id<?= $ve->getId() ?>" class="w3-modal">
                                    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:800px">
                                        <div class="w3-center"><br>
                                            <span onclick="document.getElementById('id<?= $ve->getId() ?>').style.display = 'none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                                        </div>
                                        <h2><center>Edita de Imobilizado</center></h2>
                                        <br>
                                        <form action="../../classes/controle/ImobilizadoControle.php" method="POST">
                                            <div class="w3-row-padding">
                                                <div class="w3-third">
                                                    <label><b>Código</b></label>
                                                    <input id="skills" class="w3-input w3-border" type="text" value="<?= $ve->getCodigo() ?>" name="codigo">
                                                    <input  type="hidden"  name="usuario" value="<?= $nome_user ?>">
                                                    <input  type="hidden"  name="id" value="<?= $ve->getId()?>">
                                                </div>
                                                <div class="w3-third">
                                                    <label><b>Setor</b></label>
                                                    <input id="skills" class="w3-input w3-border" type="text" value="<?= $ve->getSetor() ?>" name="setor">
                                                    <input  type="hidden"  name="usuario" value="<?= $nome_user ?>">
                                                </div>
                                                <div class="w3-third">
                                                    <label><strong>Tipo Imobilizado</strong></label>
                                                    <select class="w3-select w3-border" name="tipo">
                                                        <option style="background-color: #bbb" value="<?= $ve->getTipoimobilizado_id() ?>"><?= $ve->getTipoimobilizado_nome() ?></option>
                                                        <option value="1">PC- GABINETE</option>
                                                        <option value="2">MONITOR</option>
                                                        <option value="3">TECLADO</option>
                                                        <option value="4">MOUSE</option>
                                                        <option value="5">CX. DE SOM</option>
                                                        <option value="6">TELEFONE</option>
                                                        <option value="7">FONE TELEFONE</option>
                                                        <option value="8">IMPRESSORA</option>
                                                        <option value="9">REDE</option>
                                                        <option value="10">COMPONENTES- PC</option>
                                                        <option value="11">MÁQUINAS</option>
                                                        <option value="12">CAMERA</option>
                                                        <option value="13">CELULAR</option>
                                                        <option value="14">OUTROS</option>
                                                    </select>
                                                </div>
                                                <br>
                                                <div class="w3-col s9">   
                                                    <br>
                                                    <label><strong>Usuário</strong></label>
                                                    <input class="w3-input w3-border" type="text" value="<?= $ve->getUsuario() ?>" name="usuario">
                                                </div>  
                                                <div class="w3-col s12">   
                                                    <br>
                                                    <label><strong>Descrição</strong></label>
                                                    <textarea class="w3-input w3-border" rows="3" type="text"  name="descricao"><?= strip_tags($ve->getDescricao()) ?></textarea>
                                                </div>  
                                                <div class="w3-col s6">
                                                    <br>
                                                    <br>
                                                    <button  class="w3-button w3-blue w3-right" name="editar"><i class="fa fa-plus"></i> Editar</button>
                                                </div>
                                            </div>  
                                            <br>
                                        </form>
                                    </div>
                                </div>
                                <a href="../../classes/controle/ImobilizadoControle.php?delete=<?= $ve->getId() ?>&user=<?= $nome_user ?>"><button class="w3-button w3-red" title="Excluir"><i class="fa fa-trash"></i></button></a>
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