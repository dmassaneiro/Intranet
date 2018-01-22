<?php

include_once '../../../conexao/ConexaoPDO.php';
include_once '../modelo/Orcamento.php';

class OrcamentoDAO {

    public function Inserir(Orcamento $orcamento) {
        try {
            $sql = "INSERT INTO orcamento (    
                  data,
                  cliente_id,
                  numeroserie,
                  descricao,
                  ocorrencia,
                  situacao,
                  saida,
                  status,
                  observacao)
                  VALUES (
                  :data,
                  :cliente_id,
                  :numeroserie,
                  :descricao,
                  :ocorrencia,
                  :situacao,
                  :saida,
                  :status,
                  :observacao)";

            $p_sql = ConexaoPDO::getInstance()->prepare($sql);

            $p_sql->bindValue(":data", $orcamento->getData());
            $p_sql->bindValue(":cliente_id", $orcamento->getCliente_id());
            $p_sql->bindValue(":numeroserie", $orcamento->getNumeroserie());
            $p_sql->bindValue(":descricao", $orcamento->getDescricao());
            $p_sql->bindValue(":ocorrencia", $orcamento->getOcorrencia());
            $p_sql->bindValue(":situacao", $orcamento->getSituacao());
            $p_sql->bindValue(":saida", $orcamento->getSaida());
            $p_sql->bindValue(":status", $orcamento->getStatus());
            $p_sql->bindValue(":observacao", $orcamento->getObsercacao());


            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Inserir o representante" . $e;
        }
    }

    public function BuscarTodosParaSair() {
        try {
            $sql = "SELECT c.id as id,c.data as data,c.numeroserie as numeroserie,c.ocorrencia as ocorrencia ,
                    c.descricao as descricao,
                    c.cliente_id as cliente_id, c.saida as saida, c.status as status, c.situacao as situacao,
                    c.observacao as observacao,cli.nome as nome
                    FROM orcamento c
                    inner join cliente as cli on c.cliente_id=cli.id
                    Where c.situacao = 'PENDENTE'
                    group by cli.nome asc ";
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

    private function Lista($row) {
        $post = new Orcamento();

        $post->setId($row['id']);
        $post->setData($row['data']);
        $post->setNumeroserie($row['numeroserie']);
        $post->setOcorrencia($row['ocorrencia']);
        $post->setDescricao($row['descricao']);
        $post->setCliente($row['nome']);
        $post->setCliente_id($row['cliente_id']);
        $post->setSaida($row['saida']);
        $post->setStatus($row['status']);
        $post->setSituacao($row['situacao']);
        $post->setObsercacao($row['observacao']);

        return $post;
    }

    public function BuscarSaida($data) {
        try {
            $sql = "SELECT c.id as id,c.data as data,c.numeroserie as numeroserie,c.ocorrencia as ocorrencia ,
                    c.descricao as descricao,
                    c.cliente_id as cliente_id, c.saida as saida, c.status as status, c.situacao as situacao,
                    c.observacao as observacao,cli.nome as nome
                    FROM orcamento c
                    inner join cliente as cli on c.cliente_id=cli.id
                    Where c.saida = '$data'
                    group by cli.nome asc ";
            $result = ConexaoPDO::getInstance()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->lista($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }

    public function BuscarNome($nome) {
        try {
            $sql = "SELECT c.id as id,c.data as data,c.numeroserie as numeroserie,c.ocorrencia as ocorrencia ,
                    c.descricao as descricao,
                    c.cliente_id as cliente_id, c.saida as saida, c.status as status, c.situacao as situacao,
                    c.observacao as observacao,cli.nome as nome
                    FROM orcamento c
                    inner join cliente as cli on c.cliente_id=cli.id
                    Where cli.nome LIKE '%$nome%'
                    group by cli.nome asc ";
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

    public function BuscarSituacao($status) {
        try {
            $sql = "SELECT c.id as id,c.data as data,c.numeroserie as numeroserie,c.ocorrencia as ocorrencia,
                    c.descricao as descricao,
                    c.cliente_id as cliente_id, c.saida as saida, c.status as status, c.situacao as situacao,
                    c.observacao as observacao,cli.nome as nome
                    FROM orcamento c
                    inner join cliente as cli on c.cliente_id=cli.id
                    Where c.situacao = '$status'
                    group by cli.nome asc ";
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

    public function PegaIdOrcamento() {
        try {
            $sql = "SELECT * FROM orcamento order by id desc limit 1";
            $p_sql = ConexaoPDO::getInstance()->query($sql);
            $p_sql->execute();
            return $this->listaIdConserto($p_sql->fetch(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar buscar.";
        }
    }

    private function listaIdConserto($row) {
        $cliente = new Orcamento();
        $cliente->setId($row['id']);

        return $cliente;
    }

    public function Deletar($cod) {
        try {
            $sql = "DELETE FROM orcamento WHERE id = :cod";
            $p_sql = ConexaoPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":cod", $cod);

            return $p_sql->execute();
        } catch (Exception $e) {
            echo $e;
            ;
        }
    }

    public function Excluir(Orcamento $conserto) {
        try {
            $sql = "UPDATE orcamento set             

                  situacao=:status
                                                    
                  WHERE id = :id";
            $p_sql = ConexaoPDO::getInstance()->prepare($sql);

            $p_sql->bindValue(":status", $conserto->getSituacao());
            $p_sql->bindValue(":id", $conserto->getId());

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar fazer Update<br>" . $e;
        }
    }

    public function Editar(Orcamento $conserto) {
        try {
            $sql = "UPDATE orcamento set             

                  
                  cliente_id=:cliente_id,
                  numeroserie=:numeroserie,
                  descricao=:descricao,
                  ocorrencia=:ocorrencia,
                  situacao=:situacao,
                  saida=:saida,
                  status=:status,
                  observacao=:observacao
                                   
                  WHERE id = :id";


            $p_sql = ConexaoPDO::getInstance()->prepare($sql);

            $p_sql->bindValue(":cliente_id", $conserto->getCliente_id());
            $p_sql->bindValue(":numeroserie", $conserto->getNumeroserie());
            $p_sql->bindValue(":descricao", $conserto->getDescricao());
            $p_sql->bindValue(":ocorrencia", $conserto->getOcorrencia());
            $p_sql->bindValue(":situacao", $conserto->getSituacao());
            $p_sql->bindValue(":saida", $conserto->getSaida());
            $p_sql->bindValue(":status", $conserto->getStatus());
            $p_sql->bindValue(":observacao", $conserto->getObsercacao());

            $p_sql->bindValue(":id", $conserto->getId());

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar fazer Update<br>" . $e;
        }
    }

    public function EditarEnviar(Orcamento $conserto) {
        try {
            $sql = "UPDATE orcamento set             

                  saida=:saida,
                  situacao=:situacao
                                                     
                  WHERE id = :id";

            $p_sql = ConexaoPDO::getInstance()->prepare($sql);

            $p_sql->bindValue(":saida", $conserto->getSaida());
            $p_sql->bindValue(":situacao", $conserto->getSituacao());

            $p_sql->bindValue(":id", $conserto->getId());

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar fazer Update<br>" . $e;
        }
    }

}
