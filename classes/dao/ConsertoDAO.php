<?php

include_once '../../../conexao/ConexaoPDO.php';
include_once '../modelo/Conserto.php';

class ConsertoDAO {

    public function Inserir(Conserto $conserto) {
        try {
            $sql = "INSERT INTO conserto (    
                  data,
                  prateleira,
                  local,
                  descricao,
                  cliente_id,
                  saida,
                  status,
                  observacao)
                  VALUES (
                  :data,
                  :prateleira,
                  :local,
                  :descricao,
                  :cliente_id,
                  :saida,
                  :status,
                  :observacao)";

            $p_sql = ConexaoPDO::getInstance()->prepare($sql);

            $p_sql->bindValue(":data", $conserto->getData());
            $p_sql->bindValue(":prateleira", $conserto->getPrateleira());
            $p_sql->bindValue(":local", $conserto->getLocal());
            $p_sql->bindValue(":descricao", $conserto->getDescricao());
            $p_sql->bindValue(":cliente_id", $conserto->getCliente());
            $p_sql->bindValue(":saida", $conserto->getSaida());
            $p_sql->bindValue(":status", $conserto->getStatus());
            $p_sql->bindValue(":observacao", $conserto->getObservacao());


            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Inserir o representante" . $e;
        }
    }

    public function BuscarTodosParaSair() {
        try {
            $sql = "SELECT c.id as id,c.data as data,c.prateleira as prateleira,c.local as local ,
                    c.descricao as descricao,
                    c.cliente_id as cliente_id, c.saida as saida, c.status as status, 
                    c.observacao as observacao,cli.nome as nome
                    FROM conserto c
                    inner join cliente as cli on c.cliente_id=cli.id
                    Where c.status = 'PENDENTE'
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

    public function BuscarSaida($data) {
        try {
            $sql = "SELECT c.id as id,c.data as data,c.prateleira as prateleira,c.local as local ,
                    c.descricao as descricao,
                    c.cliente_id as cliente_id, c.saida as saida, c.status as status, 
                    c.observacao as observacao,cli.nome as nome
                    FROM conserto c
                    inner join cliente as cli on c.cliente_id=cli.id
                    Where c.saida = '$data'   
                    group by cli.nome asc";
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
            $sql = "SELECT c.id as id,c.data as data,c.prateleira as prateleira,c.local as local ,
                    c.descricao as descricao,
                    c.cliente_id as cliente_id, c.saida as saida, c.status as status, 
                    c.observacao as observacao,cli.nome as nome
                    FROM conserto c
                    inner join cliente as cli on c.cliente_id=cli.id
                    Where cli.nome LIKE '%$nome%'   
                    group by cli.nome asc";
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
            $sql = "SELECT c.id as id,c.data as data,c.prateleira as prateleira,c.local as local ,
                    c.descricao as descricao,
                    c.cliente_id as cliente_id, c.saida as saida, c.status as status, 
                    c.observacao as observacao,cli.nome as nome
                    FROM conserto c
                    inner join cliente as cli on c.cliente_id=cli.id
                    Where c.status = '$status'   
                    group by cli.nome asc";
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
        $post = new Conserto();

        $post->setId($row['id']);
        $post->setData($row['data']);
        $post->setPrateleira($row['prateleira']);
        $post->setLocal($row['local']);
        $post->setDescricao($row['descricao']);
        $post->setCliente($row['nome']);
        $post->setId_cliente($row['cliente_id']);
        $post->setSaida($row['saida']);
        $post->setStatus($row['status']);
        $post->setObservacao($row['observacao']);

        return $post;
    }

    public function PegaIdConserto() {
        try {
            $sql = "SELECT * FROM conserto order by id desc limit 1";
            $p_sql = ConexaoPDO::getInstance()->query($sql);
            $p_sql->execute();
            return $this->listaIdConserto($p_sql->fetch(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar buscar.";
        }
    }
    
    private function listaIdConserto($row) {
        $cliente = new Conserto();
        $cliente->setId($row['id']);

        return $cliente;
    }
    
    public function Deletar($cod) {
        try {
            $sql = "DELETE FROM conserto WHERE id = :cod";
            $p_sql = ConexaoPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":cod", $cod);

            return $p_sql->execute();
        } catch (Exception $e) {
            echo $e;
            ;
        }
    }

    public function Excluir(Conserto $conserto) {
        try {
            $sql = "UPDATE conserto set             

                  status=:status
                                                    
                  WHERE id = :id";
            $p_sql = ConexaoPDO::getInstance()->prepare($sql);

            $p_sql->bindValue(":status", $conserto->getStatus());
            $p_sql->bindValue(":id", $conserto->getId());

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar fazer Update<br>" . $e;
        }
    }

    public function Editar(Conserto $conserto) {
        try {
            $sql = "UPDATE conserto set             

                  prateleira=:prateleira,
                  local=:local,
                  descricao=:descricao,
                  cliente_id=:cliente_id,
                  saida=:saida,
                  status=:status,
                  observacao=:observacao
                                   
                  WHERE id = :id";


            $p_sql = ConexaoPDO::getInstance()->prepare($sql);

            $p_sql->bindValue(":prateleira", $conserto->getPrateleira());
            $p_sql->bindValue(":local", $conserto->getLocal());
            $p_sql->bindValue(":descricao", $conserto->getDescricao());
            $p_sql->bindValue(":cliente_id", $conserto->getId_cliente());
            $p_sql->bindValue(":saida", $conserto->getSaida());
            $p_sql->bindValue(":status", $conserto->getStatus());
            $p_sql->bindValue(":observacao", $conserto->getObservacao());

            $p_sql->bindValue(":id", $conserto->getId());

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar fazer Update<br>" . $e;
        }
    }

    public function EditarEnviar(Conserto $conserto) {
        try {
            $sql = "UPDATE conserto set             

                  saida=:saida,
                  status=:status
                                                     
                  WHERE id = :id";


            $p_sql = ConexaoPDO::getInstance()->prepare($sql);

            $p_sql->bindValue(":saida", $conserto->getSaida());
            $p_sql->bindValue(":status", $conserto->getStatus());


            $p_sql->bindValue(":id", $conserto->getId());

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar fazer Update<br>" . $e;
        }
    }

}
