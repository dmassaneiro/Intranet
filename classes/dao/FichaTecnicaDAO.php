<?php

include_once '../../../conexao/ConexaoPDO.php';
include_once '../modelo/FichaTecnica.php';

class FichaTecnicaDAO {

    public function Inserir(FichaTecnica $ficha) {
        try {
            $sql = "INSERT INTO fichatecnica (    
                lote,
                loteimportacao,
                ordemproducao,
                datainicio,
                datafim,
                quantidade,
                obs,
                montagem,
                pente,
                fonte,
                alavanca,
                lamina,
                motor,
                velocidade,
                onoff,
                suporte,
                conteudo,
                led,
                cabo,
                final,
                superior,
                circuito1,
                circuito2,
                teste,
                polimento,
                embalagem,
                produtos_id,
                instrumento_id,
                situacao)
                VALUES (
                :lote,
                :loteimportacao,
                :ordemproducao,
                :datainicio,
                :datafim,
                :quantidade,
                :obs,
                :montagem,
                :pente,
                :fonte,
                :alavanca,
                :lamina,
                :motor,
                :velocidade,
                :onoff,
                :suporte,
                :conteudo,
                :led,
                :cabo,
                :final,
                :superior,
                :circuito1,
                :circuito2,
                :teste,
                :polimento,
                :embalagem,
                :produtos_id,
                :instrumento_id,
                :situacao)";

            $p_sql = ConexaoPDO::getInstance()->prepare($sql);

            $p_sql->bindValue(":lote", $ficha->getLote());
            $p_sql->bindValue(":loteimportacao", $ficha->getLoteimportacao());
            $p_sql->bindValue(":ordemproducao", $ficha->getOrdemproducao());
            $p_sql->bindValue(":datainicio", $ficha->getDatainicio());
            $p_sql->bindValue(":datafim", $ficha->getDatafim());
            $p_sql->bindValue(":quantidade", $ficha->getQuantidade());
            $p_sql->bindValue(":obs", $ficha->getObs());
            $p_sql->bindValue(":montagem", $ficha->getMontagem());
            $p_sql->bindValue(":pente", $ficha->getPente());
            $p_sql->bindValue(":fonte", $ficha->getFonte());
            $p_sql->bindValue(":alavanca", $ficha->getAlavanca());
            $p_sql->bindValue(":lamina", $ficha->getLamina());
            $p_sql->bindValue(":motor", $ficha->getMotor());
            $p_sql->bindValue(":velocidade", $ficha->getVelocidade());
            $p_sql->bindValue(":onoff", $ficha->getOnoff());
            $p_sql->bindValue(":suporte", $ficha->getSuporte());
            $p_sql->bindValue(":conteudo", $ficha->getConteudo());
            $p_sql->bindValue(":led", $ficha->getLed());
            $p_sql->bindValue(":cabo", $ficha->getCabo());
            $p_sql->bindValue(":final", $ficha->getFinal());
            $p_sql->bindValue(":superior", $ficha->getSuperior());
            $p_sql->bindValue(":circuito1", $ficha->getCircuito1());
            $p_sql->bindValue(":circuito2", $ficha->getCircuito2());
            $p_sql->bindValue(":teste", $ficha->getTeste());
            $p_sql->bindValue(":polimento", $ficha->getPolimento());
            $p_sql->bindValue(":embalagem", $ficha->getEmbalagem());
            $p_sql->bindValue(":produtos_id", $ficha->getProdutos_id());
            $p_sql->bindValue(":instrumento_id", $ficha->getInstrumento_id());
            $p_sql->bindValue(":situacao", $ficha->getSituacao());


            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Inserir o representante" . $e;
        }
    }

    public function BuscarTodos() {
        try {
            $sql = "SELECT 
f.id as id, f.lote as lote, f.loteimportacao as importacao, f.ordemproducao as op, f.datainicio as inicio,
f.datafim as fim, f.quantidade as qtd, f.obs as obs, f.pente as pente, f.fonte as fonte, f.alavanca as alavanca,
f.lamina as lamina, f.motor as motor, f.velocidade as velocidade, f.onoff as onoff, f.suporte as suporte,
f.conteudo as conteudo, f.led as led, f.cabo as cabo, f.final as final, f.circuito1 as circuito1,
f.circuito2 as circuito2,
f.teste as teste, f.polimento as polimento, f.embalagem as embalagem, f.produtos_id as produto_id,
f.instrumento_id as intrumento_id, p.nome as produto_nome, f.superior as superior, f.montagem as montagem, 
f.situacao as situacao
FROM fichatecnica f
inner join produtos as p on f.produtos_id = p.id
order by f.id desc";
            $result = ConexaoPDO::getInstance()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->Lista($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }
    public function BuscarTodosLote($lote) {
        try {
            $sql = "SELECT 
f.id as id, f.lote as lote, f.loteimportacao as importacao, f.ordemproducao as op, f.datainicio as inicio,
f.datafim as fim, f.quantidade as qtd, f.obs as obs, f.pente as pente, f.fonte as fonte, f.alavanca as alavanca,
f.lamina as lamina, f.motor as motor, f.velocidade as velocidade, f.onoff as onoff, f.suporte as suporte,
f.conteudo as conteudo, f.led as led, f.cabo as cabo, f.final as final, f.circuito1 as circuito1,
f.circuito2 as circuito2,
f.teste as teste, f.polimento as polimento, f.embalagem as embalagem, f.produtos_id as produto_id,
f.instrumento_id as intrumento_id, p.nome as produto_nome, f.superior as superior, f.montagem as montagem, 
f.situacao as situacao
FROM fichatecnica f
inner join produtos as p on f.produtos_id = p.id
WHERE f.lote = '$lote'
order by f.id desc";
            $result = ConexaoPDO::getInstance()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->Lista($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }
    public function BuscarTodosOp($op) {
        try {
            $sql = "SELECT 
f.id as id, f.lote as lote, f.loteimportacao as importacao, f.ordemproducao as op, f.datainicio as inicio,
f.datafim as fim, f.quantidade as qtd, f.obs as obs, f.pente as pente, f.fonte as fonte, f.alavanca as alavanca,
f.lamina as lamina, f.motor as motor, f.velocidade as velocidade, f.onoff as onoff, f.suporte as suporte,
f.conteudo as conteudo, f.led as led, f.cabo as cabo, f.final as final, f.circuito1 as circuito1,
f.circuito2 as circuito2,
f.teste as teste, f.polimento as polimento, f.embalagem as embalagem, f.produtos_id as produto_id,
f.instrumento_id as intrumento_id, p.nome as produto_nome, f.superior as superior, f.montagem as montagem, 
f.situacao as situacao
FROM fichatecnica f
inner join produtos as p on f.produtos_id = p.id
WHERE f.ordemproducao = '$op'
order by f.id desc";
            $result = ConexaoPDO::getInstance()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->Lista($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }
    public function BuscarTodosNome($nome) {
        try {
            $sql = "SELECT 
f.id as id, f.lote as lote, f.loteimportacao as importacao, f.ordemproducao as op, f.datainicio as inicio,
f.datafim as fim, f.quantidade as qtd, f.obs as obs, f.pente as pente, f.fonte as fonte, f.alavanca as alavanca,
f.lamina as lamina, f.motor as motor, f.velocidade as velocidade, f.onoff as onoff, f.suporte as suporte,
f.conteudo as conteudo, f.led as led, f.cabo as cabo, f.final as final, f.circuito1 as circuito1,
f.circuito2 as circuito2,
f.teste as teste, f.polimento as polimento, f.embalagem as embalagem, f.produtos_id as produto_id,
f.instrumento_id as intrumento_id, p.nome as produto_nome, f.superior as superior, f.montagem as montagem, 
f.situacao as situacao
FROM fichatecnica f
inner join produtos as p on f.produtos_id = p.id
WHERE p.nome LIKE  '%$nome%'
order by f.id desc";
            $result = ConexaoPDO::getInstance()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->Lista($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }
    public function BuscarTodosData($data) {
        try {
            $sql = "SELECT 
f.id as id, f.lote as lote, f.loteimportacao as importacao, f.ordemproducao as op, f.datainicio as inicio,
f.datafim as fim, f.quantidade as qtd, f.obs as obs, f.pente as pente, f.fonte as fonte, f.alavanca as alavanca,
f.lamina as lamina, f.motor as motor, f.velocidade as velocidade, f.onoff as onoff, f.suporte as suporte,
f.conteudo as conteudo, f.led as led, f.cabo as cabo, f.final as final, f.circuito1 as circuito1,
f.circuito2 as circuito2,
f.teste as teste, f.polimento as polimento, f.embalagem as embalagem, f.produtos_id as produto_id,
f.instrumento_id as intrumento_id, p.nome as produto_nome, f.superior as superior, f.montagem as montagem, 
f.situacao as situacao
FROM fichatecnica f
inner join produtos as p on f.produtos_id = p.id
WHERE f.datainicio =  '$data'
order by f.id desc";
            $result = ConexaoPDO::getInstance()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->Lista($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }

    public function BuscarFicha($ficha) {
        try {
            $sql = "SELECT 
f.id as id, f.lote as lote, f.loteimportacao as importacao, f.ordemproducao as op, f.datainicio as inicio,
f.datafim as fim, f.quantidade as qtd, f.obs as obs, f.pente as pente, f.fonte as fonte, f.alavanca as alavanca,
f.lamina as lamina, f.motor as motor, f.velocidade as velocidade, f.onoff as onoff, f.suporte as suporte,
f.conteudo as conteudo, f.led as led, f.cabo as cabo, f.final as final, f.circuito1 as circuito1,
f.circuito2 as circuito2,
f.teste as teste, f.polimento as polimento, f.embalagem as embalagem, f.produtos_id as produto_id,
f.instrumento_id as intrumento_id, p.nome as produto_nome, f.superior as superior, f.montagem as montagem,
f.situacao as situacao,
i.nome as instrumento_nome, i.numero as instrumento_numero
FROM fichatecnica f
inner join produtos as p on f.produtos_id = p.id
inner join instrumento as i on f.instrumento_id = i.id
WHERE f.id = '$ficha'
order by f.id desc";
            $p_sql = ConexaoPDO::getInstance()->query($sql);
            $p_sql->execute();
            return $this->Lista($p_sql->fetch(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar buscar." . $e;
        }
    }

    private function Lista($row) {
        $post = new FichaTecnica();

        $post->setId($row['id']);
        $post->setLote($row['lote']);
        $post->setLoteimportacao($row['importacao']);
        $post->setOrdemproducao($row['op']);
        $post->setDatainicio($row['inicio']);
        $post->setDatafim($row['fim']);
        $post->setQuantidade($row['qtd']);
        $post->setObs($row['obs']);
        $post->setPente($row['pente']);
        $post->setFonte($row['fonte']);
        $post->setAlavanca($row['alavanca']);
        $post->setLamina($row['lamina']);
        $post->setMotor($row['motor']);
        $post->setVelocidade($row['velocidade']);
        $post->setOnoff($row['onoff']);
        $post->setSuporte($row['suporte']);
        $post->setConteudo($row['conteudo']);
        $post->setLed($row['led']);
        $post->setCabo($row['cabo']);
        $post->setFinal($row['final']);
        $post->setCircuito1($row['circuito1']);
        $post->setCircuito2($row['circuito2']);
        $post->setTeste($row['teste']);
        $post->setPolimento($row['polimento']);
        $post->setEmbalagem($row['embalagem']);
        $post->setProdutos_id($row['produto_id']);
        $post->setInstrumento_id($row['intrumento_id']);
        $post->setInstrumento_nome($row['instrumento_nome']);
        $post->setInstrumento_numero($row['instrumento_numero']);
        $post->setProdutos_nome($row['produto_nome']);
        $post->setSuperior($row['superior']);
        $post->setMontagem($row['montagem']);
        $post->setSituacao($row['situacao']);

        return $post;
    }

    public function Deletar($cod) {
        try {
            $sql = "DELETE FROM fichatecnica WHERE id = :cod";
            $p_sql = ConexaoPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":cod", $cod);

            return $p_sql->execute();
        } catch (Exception $e) {
            echo "<script language= 'JavaScript'>
                    location.href='http://192.168.1.252:1000/server/intranet/producao/view/inicioficha.php?msg=4'
                    </script>";
        }
    }

    public function Editar(FichaTecnica $ficha) {
        try {
            $sql = "UPDATE fichatecnica set
                
                lote=:lote,
                loteimportacao=:loteimportacao,
                ordemproducao=:ordemproducao,
                datainicio=:datainicio,
                datafim=:datafim,
                quantidade=:quantidade,
                obs=:obs,
                montagem=:montagem,
                pente=:pente,
                fonte=:fonte,
                alavanca=:alavanca,
                lamina=:lamina,
                motor=:motor,
                velocidade=:velocidade,
                onoff=:onoff,
                suporte=:suporte,
                conteudo=:conteudo,
                led=:led,
                cabo=:cabo,
                final=:final,
                superior=:superior,
                circuito1=:circuito1,
                circuito2=:circuito2,
                teste=:teste,
                polimento=:polimento,
                embalagem=:embalagem,
                instrumento_id=:instrumento_id
                      
                  WHERE id = :id";


            $p_sql = ConexaoPDO::getInstance()->prepare($sql);

            $p_sql->bindValue(":lote", $ficha->getLote());
            $p_sql->bindValue(":loteimportacao", $ficha->getLoteimportacao());
            $p_sql->bindValue(":ordemproducao", $ficha->getOrdemproducao());
            $p_sql->bindValue(":datainicio", $ficha->getDatainicio());
            $p_sql->bindValue(":datafim", $ficha->getDatafim());
            $p_sql->bindValue(":quantidade", $ficha->getQuantidade());
            $p_sql->bindValue(":obs", $ficha->getObs());
            $p_sql->bindValue(":montagem", $ficha->getMontagem());
            $p_sql->bindValue(":pente", $ficha->getPente());
            $p_sql->bindValue(":fonte", $ficha->getFonte());
            $p_sql->bindValue(":alavanca", $ficha->getAlavanca());
            $p_sql->bindValue(":lamina", $ficha->getLamina());
            $p_sql->bindValue(":motor", $ficha->getMotor());
            $p_sql->bindValue(":velocidade", $ficha->getVelocidade());
            $p_sql->bindValue(":onoff", $ficha->getOnoff());
            $p_sql->bindValue(":suporte", $ficha->getSuporte());
            $p_sql->bindValue(":conteudo", $ficha->getConteudo());
            $p_sql->bindValue(":led", $ficha->getLed());
            $p_sql->bindValue(":cabo", $ficha->getCabo());
            $p_sql->bindValue(":final", $ficha->getFinal());
            $p_sql->bindValue(":superior", $ficha->getSuperior());
            $p_sql->bindValue(":circuito1", $ficha->getCircuito1());
            $p_sql->bindValue(":circuito2", $ficha->getCircuito2());
            $p_sql->bindValue(":teste", $ficha->getTeste());
            $p_sql->bindValue(":polimento", $ficha->getPolimento());
            $p_sql->bindValue(":embalagem", $ficha->getEmbalagem());
            $p_sql->bindValue(":instrumento_id", $ficha->getInstrumento_id());

            $p_sql->bindValue(":id", $ficha->getId());

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar fazer Update<br>" . $e;
        }
    }

    public function EditarFechar(FichaTecnica $ficha) {
        try {
            $sql = "UPDATE fichatecnica set
                
                  situacao=:situcacao
                      
                  WHERE id = :id";


            $p_sql = ConexaoPDO::getInstance()->prepare($sql);

            $p_sql->bindValue(":situcacao", $ficha->getSituacao());

            $p_sql->bindValue(":id", $ficha->getId());

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar fazer Update<br>" . $e;
        }
    }

}
