

<!DOCTYPE html>
<html>
    <head>
        <script type='text/javascript'
        src='http://code.jquery.com/jquery-git2.js'></script>
        <script type='text/javascript'
        src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.1.0/bootstrap.min.js"></script>
        <script type='text/javascript'
        src="http://eternicode.github.io/bootstrap-datepicker/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type='text/javascript'>
            $(window).load(function () {
                $('.input-daterange').datepicker({});
            });
        </script>
    </head>
    <body>
        <br>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Informações</h3>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST">
                                <div class="form-group">
                                    <div class="col-md-5">
                                        <label >Cep Destino</label>
                                        <input type="text" class="form-control" name="cep" placeholder="CEP Destino" />
                                    </div>

                                    <div class="col-sm-7">
                                        <label>Tipo de Caixa</label>
                                        <select class="form-control" name="caixa">
                                            <option>Caixa PP</option>
                                            <option>Caixa P</option>
                                            <option>Caixa M</option>
                                            <option>Caixa G</option>
                                            <option>Caixa GG</option>
                                            <option>OUTRAS</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <br>
                                        <label>Altura</label>
                                        <input type="text" class="form-control" name="altura" placeholder="Altura" />
                                    </div>
                                    <div class="col-md-4">
                                        <br>
                                        <label>Largura</label>
                                        <input type="text" class="form-control" name="largura" placeholder="Largura" />
                                    </div>
                                    <div class="col-md-4">
                                        <br>
                                        <label>Comprimento</label>
                                        <input type="text" class="form-control" name="comprimento" placeholder="Comprimento" />
                                    </div>
                                    <div class="col-md-5">
                                        <br>
                                        <label>Peso</label>
                                        <input type="text" class="form-control" name="peso" placeholder="Peso" />
                                    </div>
                                    <div class="col-md-5">
                                        <br>
                                        <label>Volume</label>
                                        <input type="text" class="form-control" name="volume" placeholder="Volume" />
                                    </div>
                                    <div class="col-md-6">
                                        <br>
                                        <label>Cnpj Destino</label>
                                        <input type="text" class="form-control" name="cnpjdestino" placeholder="Cnpj" />
                                    </div>
                                    <div class="col-md-4">
                                        <br>
                                        <label>Valor da Nota</label>
                                        <input type="text" class="form-control" name="valornota" placeholder="Volume" />
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-md-10">
                                        <button type="submit" class="btn btn-primary">Calcular</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="panel panel-primary">
                        <div class="panel-heading clearfix">
                            <h3 class="panel-title pull-left">Valores</h3>

                            <div class="clearfix"></div>
                        </div>
                        <?php
                        $cepdestino = $_POST['cep'];
                        $caixa = $_POST['caixa'];
                        $altura = $_POST['altura'];
                        $largura = $_POST['largura'];
                        $comprimento = $_POST['comprimento'];
                        $peso = $_POST['peso'];


                        if ($cepdestino != null) {
                            

                            $data['nCdEmpresa'] = '';
                            $data['sDsSenha'] = '';
                            $data['sCepOrigem'] = '87309220';
                            $data['sCepDestino'] = $cepdestino;
                            $data['nVlPeso'] = $peso;
                            $data['nCdFormato'] = '1';
                            $data['nVlComprimento'] = $comprimento;
                            $data['nVlAltura'] = $altura;
                            $data['nVlLargura'] = $largura;
                            $data['nVlDiametro'] = '0';
                            $data['sCdMaoPropria'] = 'n';
                            $data['nVlValorDeclarado'] = '0';
                            $data['sCdAvisoRecebimento'] = 'n';
                            $data['StrRetorno'] = 'xml';
                            $data['nCdServico'] = '40010,41106';
                            $data = http_build_query($data);

                            $url = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx';

                            $curl = curl_init($url . '?' . $data);
                            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);


                            $result = curl_exec($curl);
                            $result = simplexml_load_string($result);
                            foreach ($result->cServico as $row) {
                                //Os dados de cada serviço estará aqui
                                if ($row->Erro == 0) {
                                    if ($row->Codigo == '40010') {
                                        ?>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src="img/sedex.gif" class="img-rounded" alt="Cinque Terre" width="125" height="121">
                                            </div>
                                            <div class="col-md-4">

                                                <label>Prazo</label><br>
                                                <label><h3><?= $row->PrazoEntrega ?> Dia(s)</h3></label>
                                            </div>
                                            <div class="col-md-4">
                                                <br>
                                                <label>Valor</label><br>
                                                <label><h3>R$ <?= $row->Valor ?></h3></label>

                                            </div>
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <br>
                                                <img src="img/pac1.gif" class="img-rounded" alt="Cinque Terre" width="140" height="80">
                                            </div>
                                            <div class="col-md-4">
                                                <br>
                                                <label>Prazo</label><br>
                                                <label><h3><?= $row->PrazoEntrega ?> Dia(s)</h3></label>
                                            </div>
                                            <div class="col-md-4">
                                                <br>
                                                <label>Valor</label><br>
                                                <label><h3>R$ <?= $row->Valor ?></h3></label>

                                            </div>
                                        </div>
                                        <?php
                                    }
                                } else {
                                    echo $row->MsgErro;
                                }
                                echo '<hr>';?>
                        <div class="row">
                                <div class="col-md-4">
                                    <img src="img/sedex.gif" class="img-rounded" alt="Cinque Terre" width="125" height="121">
                                </div>
                                <div class="col-md-4">

                                    <label>Prazo</label><br>
                                    <label><h3> Dia(s)</h3></label>
                                </div>
                                <div class="col-md-4">
                                    <br>
                                    <label>Valor</label><br>
                                    <label><h3>R$ </h3></label>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <br>
                                    <img src="img/pac1.gif" class="img-rounded" alt="Cinque Terre" width="140" height="80">
                                </div>
                                <div class="col-md-4">
                                    <br>
                                    <label>Prazo</label><br>
                                    <label><h3> Dia(s)</h3></label>
                                </div>
                                <div class="col-md-4">
                                    <br>
                                    <label>Valor</label><br>
                                    <label><h3>R$ </h3></label>

                                </div>
                            </div>
                            <?php }?>
                            
                       <?php }else{
     echo 'rytryfgdfmgdjgdj';
                       }
                        $cnpj = '09356580000129';
                        $ceporigem = '87309220';
                        $cepdestino = $_POST['cep'];
                        //$cnpjremetente =$_POST['09356580000129'];
                        $cnpjdestinatario = $_POST['cnpjdestino'];
                        $tipofrete = '1';
                        $peso = $_POST['peso'];
                        $valornf = $_POST['valornota'];
                        $volume = $_POST['volume'];

//                        echo $cnpjremetente.'<br>';
//                        echo $cnpjdestinatario.'<br>';
//                        echo $valornf.'<br>';

                        $braspres = 'http://www.braspress.com.br/cotacaoXml?param=' . $cnpj . ',2,' . $ceporigem . ',' . $cepdestino . ',09356580000129,' . $cnpjdestinatario . ',1,' . $peso . ',' . $valornf . ',' . $volume . ',R';

                        $xml = simplexml_load_file($braspres);
                        ?>
                        <div class="row">
                            <div class="col-md-4">
                                <br>
                                <img src="img/braspress.png" class="img-rounded" alt="Cinque Terre" width="140" height="80">
                            </div>
                            <div class="col-md-4">
                                <br>
                                <label>Prazo</label><br>
                                <label><h3><?= $xml->PRAZO ?> Dia(s)</h3></label>
                            </div>
                            <div class="col-md-4">
                                <br>
                                <label>Valor</label><br>
                                <label><h3>R$ <?= $xml->TOTALFRETE ?></h3></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>


