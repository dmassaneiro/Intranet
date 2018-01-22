<?php
include_once './conexao/ConexaoPDO.php';
include_once './classes/dao/PostDAO.php';
include_once './classes/modelo/Post.php';

$msg = filter_input(INPUT_GET, 'msg');
?>


<!DOCTYPE html>
<html>
    <title>Intranet Lizze Equipamentos</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="./img/ico.png">
    <!--    <meta http-equiv="refresh" content="5">-->
    <style>
        html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
        a:link 
        { 
            text-decoration:none; 
        } 
    </style>
    <body class="w3-theme-l5"s>
        <!--         SCM Music Player http://scmplayer.co 
        <script type="text/javascript" src="http://scmplayer.co/script.js" 
        data-config="{'skin':'skins/tunes/skin.css','volume':33,'autoplay':true,'shuffle':false,'repeat':1,'placement':'top','showplaylist':false,'playlist':'http://soundcloud.com/forss/sets/soulhack'}" ></script>
         SCM Music Player script end -->

        <!-- Navbar -->
        <div class="w3-top">
            <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
                <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
                <a href="http://192.168.1.252:1000/server/intranet/index.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><img src="./img/sr.png" width="110px"></a>
                <a href="https://economia.uol.com.br/cotacoes/" target="_blank" class="w3-bar-item w3-button w3-hide-small w3-padding-large " style="float:right">Cotação Dolar <i class="fa fa-dollar" ></i><?php include './cotacao.php'; ?></a>
            </div>
        </div>
        <div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
            <!-- The Grid -->
            <div class="w3-row">
                <!-- Left Column -->
                <div class="w3-col m3">
                    <!-- Profile -->
                    <div class="w3-card-2 w3-round w3-white">
                        <div class="w3-container">
                            <h4 class="w3-center"><b>Caixa de Idéias</b></h4>
                            <p> <img src="./img/cx.png"  style="width:100%"></p>
                            <button onclick="document.getElementById('id01').style.display = 'block'" class="w3-button w3-block w3-green w3-section" style="width:100%" title="Adicionar"><i class="fa fa-check"></i>Adicionar Idéia</button>
                            <div id="id01" class="w3-modal">
                                <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

                                    <div class="w3-center"><br>
                                        <span onclick="document.getElementById('id01').style.display = 'none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                                    </div>

                                    <form class="w3-container" action="./classes/controle/IdeiaControle.php" method="POST">
                                        <div class="w3-section">

                                            <h2>Digite aqui sua Idéia <i class="fa fa-lightbulb-o" style="font-size:36px"></i></h2>
                                            <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Nome" name="nome" required>
                                            <textarea class="w3-input w3-border" type="password" placeholder="Digite aqui sua Idéia :)" name="descricao" rows="4" required=""></textarea>
                                            <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit" name="ideia">Gravar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <br>

                    <!-- Accordion -->
                    <div class="w3-card-2 w3-round">
                        <div class="w3-white">
                            <button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> Sistema Interno</button>
                            <div id="Demo1" class="w3-hide w3-container">
                                <p><i class="fa fa-check-square-o"></i><a href="./sistema_lizze/index.php" target="_blank"> Sistema Lizze Interno</a></p>
                                <p><i class="fa fa-check-square-o"></i><a href="http://representantes.alisscosmeticos.com.br/aliss/" target="_blank"> Sistema Aliss Interno</a></p>
                                <p><i class="fa fa-group"></i><a href="financeiro/login.php" target="_blank"> Financeiro</a> </p>
                                <p><i class="fa fa-truck"></i><a href="http://frete.lizze.com.br/" target="_blank"> Cotação de Frete</a> </p>
                                <p><i class="fa fa-wrench"></i><a href="./astec/index.php" target="_blank"> ASTEC</a> </p>
                                <p><i class="fa fa-cogs"></i><a href="./producao/index.php" target="_blank"> Produção</a> </p>
                            </div>
                            <button onclick="myFunction('Demo2')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-file fa-fw w3-margin-right"></i>  Documentos</button>
                            <div id="Demo2" class="w3-hide w3-container">
                                <!--                                carrega os documentos-->
                                <?php include './documentos.php'; ?>
                            </div>
                            <button onclick="myFunction('Demo3')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> 
                                5 S</button>
                            <div id="Demo3" class="w3-hide w3-container">
                                <div class="w3-row-padding">

                                    <p><i class="fa fa-calendar"></i><a href="./5s/Julho.pdf" target="_blank"> Mensagem do Mês Julho</a></p>
                                    <p><i class="fa fa-calendar"></i><a href="./5s/Junho.pdf" target="_blank"> Mensagem do Mês Junho</a></p>

                                </div>
                            </div>
                            <button onclick="myFunction('Demo11')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-book fa-fw w3-margin-right"></i> 
                                Normas de Trabalho</button>
                            <div id="Demo11" class="w3-hide w3-container">
                                <div class="w3-row-padding">

                                    <p><i class="fa fa-check-circle"></i><a href="./pdf/ORGANOGRAMA.pdf" target="_blank"> Organograma da Empresa</a></p>
                                    <p><i class="fa fa-check-circle"></i><a href="./pdf/MANUAL.pdf" target="_blank"> Manual do Colaborador</a></p>

                                </div>
                            </div>
                            <button onclick="document.getElementById('id02').style.display = 'block'" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-phone fa-fw w3-margin-right"></i> 
                                Lista de Ramais</button>
                            <div id="id02" class="w3-modal">
                                <div class="w3-modal-content w3-animate-zoom" style="max-width:500px">
                                    <div class="w3-container">
                                        <span onclick="document.getElementById('id02').style.display = 'none'" class="w3-button w3-display-topright">&times;</span>
                                        <br>
                                        <br>
                                        <?php include './ramais.php'; ?>
                                        <br>
                                    </div>
                                </div>
                            </div>

                        </div>      
                    </div>
                    <br>

                    <!-- Interests --> 
                    <div class="w3-card-2 w3-round w3-white w3-hide-small">
                        <div class="w3-container">
                            <p><i class="fa fa-info-circle"></i><strong> Pesquisas</strong></p>
                            <p>
                            <p><a href="" ><i class="fa fa-plus-square"></i> Pesquisa de Avaliação de<br> Desempenho  <span class="w3-tag w3-small w3-theme-d5"> Inativa</span></p></a>
                            <p><a href="" ><i class="fa fa-plus-square"></i> Pesquisa de Satisfação dos Funcionários <span class="w3-tag w3-small w3-theme-d5"> Inativa</span></p></a>

                            </p>
                        </div>
                    </div>
                    <br>
                    <div class="w3-card-2 w3-round w3-white w3-hide-small">
                        <div class="w3-container">
                            <p><i class="fa fa-line-chart"></i><strong> Setor de Vendas</strong></p>
                            <center><p>Vendedora do Mês <i class="fa fa-calendar-check-o"></i></p>
                                <p><img src="http://lizze.com.br/images/Logopng.png" width="60px" ></p>
                                <img src="./img/girl.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
                                <p><b>Margarete</b></p>
                                <a><p style="cursor: pointer" onclick="document.getElementById('modal10').style.display = 'block'" class="w3-hover-opacity"><i class="fa fa-star"></i><i class="fa fa-star"></i>Estrelinhas<i class="fa fa-star"></i><i class="fa fa-star"></i></p></a></center>
                            <div id="modal10" class="w3-modal w3-animate-zoom" onclick="this.style.display = 'none'">
                                <?php include './estrelinhas.php';?>
                            </div>
                            </p>
                        </div>
                        <div class="w3-container">
                            <center><p><img src="https://alisscosmeticos.com.br/img/logoBlak.png" width="60px" ></p>
                                <img src="./img/vendedora/juliana.PNG" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
                                <p><b>Juliana</b></p>                                
                        </div>
                    </div>
                    <br>
                    <div class="w3-card-2 w3-round w3-white w3-hide-small">
                        <br>
                        <div class="w3-container">
                            <a><img onclick="document.getElementById('id12').style.display = 'block'" class="w3-hover-opacity" style="cursor: pointer; "src="./img/bexigas.png" width="100%" height="100px"></a>
                            <div id="id12" class="w3-modal">
                                <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:650px">

                                    <div class="w3-center"><br>
                                        <span onclick="document.getElementById('id12').style.display = 'none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                                    </div>                                
                                    <center>
                                        <?php include './aniversariantes.php'; ?>
                                    </center>  
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    <br>
                    <div class="w3-card-2 w3-round w3-white w3-hide-small">
                        <br>
                        <div class="w3-container">
                            <a onclick="document.getElementById('id17').style.display = 'block'" class="w3-hover-opacity" style="cursor: pointer; "><button class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-commenting" style="font-size:25px"></i> Ouvidoria Lizze</button></a>
                            <div id="id17" class="w3-modal">
                                <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:550px">
                                    <div class="w3-center"><br>
                                        <span onclick="document.getElementById('id17').style.display = 'none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                                    </div>                                
                                    <center>
                                        <p><strong><h2>Ouvidoria</h2></strong></p>
                                        <p>Sinta-se a vontade para expressar sua opnião ou reclamação ao setor de RH </p>
                                    </center>  
                                    <form action="./classes/controle/OuvidoriaControle.php" method="POST">
                                        <div class="w3-container">
                                            <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Nome" name="nome" >
                                            <textarea class="w3-input w3-border" type="password" placeholder="Opnião ou reclamação" name="descricao2" rows="4" required=""></textarea>
                                            <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit" name="ouvidoria">Gravar</button>
                                        </div>
                                    </form>
                                    <br>

                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
                <!-- Middle Column -->
                <div class="w3-col m7">
                    <form action="./classes/controle/PostControle.php" method="POST">
                        <div class="w3-row-padding">
                            <!--                            Mensagem de gravar-->
                            <?php include './mensagens.php'; ?>

                            <div class="w3-col m12">
                                <div class="w3-card-2 w3-round w3-white">
                                    <div class="w3-container w3-padding">
                                        <h6 class="w3-opacity"><b>Criar uma nova Postagem</b></h6>
                                        <input type="text"  class="w3-border w3-padding" style="width: 60%" placeholder="Funcionário" name="funcionarioPost" required=""><br><br>
                                        <textarea type="text" rows="4"class="w3-border w3-padding" style="width: 100%" placeholder="Assunto" name="assuntoPost" required=""></textarea><br>
                                        <button  name="postar" type="submit" class="w3-button w3-theme"><i class="fa fa-pencil"></i> Postar</button> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                    $q = new PostDAO();
                    foreach ($q->BuscarTodos() as $ve) {
                        ?>
                        <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
                            <span class="w3-right w3-opacity"><?= date("d/m/Y", strtotime($ve->getData())); ?> as <?= $ve->getHora() ?></span>
                            <h4><?= $ve->getFuncionario() ?></h4>
                            <hr class="w3-clear">
                            <p style="width: 100%"><?= $ve->getDescricao() ?></p>
                            <div class="w3-row-padding" style="margin:0 -16px">
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <!-- Right Column -->
                <div class="w3-col m2">
                    <div class="w3-card-2 w3-round w3-white w3-center">
                        <div class="w3-container">
                            <p><i class="fa fa-chain"></i><strong> Links Rápidos</strong></p>
                            <?php include './links.php'; ?>
                            <br>
                            <a onclick="document.getElementById('id16').style.display = 'block'" class="w3-hover-opacity" style="cursor: pointer; "><button class="w3-button w3-block w3-theme-l1 w3-left-align"><img src="./img/dep3.png" width="25px" style=""/> Dados Depósitos</button></a>
                            <div id="id16" class="w3-modal">
                                <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:450px">
                                    <div class="w3-center"><br>
                                        <span onclick="document.getElementById('id16').style.display = 'none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                                    </div>                                
                                    <center>
                                        <p><strong><h2>Dados para Depósitos</h2></strong></p>
                                    </center>  

                                    <div class="w3-container">
                                        <?php include './bancos.php'; ?>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                    <br>

                    <div class="w3-card-2 w3-round w3-white w3-center">
                        <br>
                        <div id="cont_706cc26373dbcfdea5f2f362a6a2c333"><script type="text/javascript" async src="https://www.tempo.com/wid_loader/706cc26373dbcfdea5f2f362a6a2c333"></script></div>
                    </div>
                    <br>
                    <div class="w3-card-2 w3-round w3-white w3-center">
                        <div class="w3-container">
                            <p><i class="fa fa-certificate"></i><strong> Gincana</strong><i class="fa fa-certificate"></i></p>
                            <center>
                                <?php include './gincana.php'; ?>
                            </center>
                            <br>
                        </div>    
                    </div>
                    <br>
                </div>
            </div>
        </div>
        <footer class="w3-container w3-theme-d5">
            <p>Desenvolvimento by <a href="./ti/index.php" target="_blank">Departamento TI <img src="./img/logoti.png" alt="Avatar" style="width:22px" class="w3-circle w3-margin-top"></a></p>
        </footer>
        <script src="./js/intranet.js"></script>
    </body>
</html> 
