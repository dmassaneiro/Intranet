<?php

include_once '../../conexao/ConexaoPDO.php';
include_once '../modelo/Imobilizado.php';

class ImobilizadoDAO {

    public function Inserir(Imobilizado $imobilizado) {
        try {
            $sql = "INSERT INTO mobilizado (    
                  codigo,
                  descricao,
                  setor,
                  data,
                  user,
                  tipomobilizado_id)
                  VALUES (
                  :codigo,
                  :descricao,
                  :setor,
                  :data,
                  :user,
                  :tipomobilizado_id)";

            $p_sql = ConexaoPDO::getInstance()->prepare($sql);

            $p_sql->bindValue(":codigo", $imobilizado->getCodigo());
            $p_sql->bindValue(":descricao", $imobilizado->getDescricao());
            $p_sql->bindValue(":setor", $imobilizado->getSetor());
            $p_sql->bindValue(":data", $imobilizado->getData());
            $p_sql->bindValue(":user", $imobilizado->getUsuario());
            $p_sql->bindValue(":tipomobilizado_id", $imobilizado->getTipoimobilizado_id());


            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Inserir o representante" . $e;
        }
    }
    public function Editar(Imobilizado $imobilizado) {
        try {
            $sql = "UPDATE mobilizado set             

                  codigo=:codigo,
                  descricao=:descricao,
                  setor=:setor,
                  user=:user,
                  tipomobilizado_id=:tipomobilizado_id
                                                    
                  WHERE id = :id";

            $p_sql = ConexaoPDO::getInstance()->prepare($sql);

            $p_sql->bindValue(":codigo", $imobilizado->getCodigo());
            $p_sql->bindValue(":descricao", $imobilizado->getDescricao());
            $p_sql->bindValue(":setor", $imobilizado->getSetor());
            $p_sql->bindValue(":user", $imobilizado->getUsuario());
            $p_sql->bindValue(":tipomobilizado_id", $imobilizado->getTipoimobilizado_id());

            $p_sql->bindValue(":id", $imobilizado->getId());

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar fazer Update<br>" . $e;
        }
    }

    public function Deletar($cod) {
        try {
            $sql = "DELETE FROM mobilizado WHERE id = :cod";
            $p_sql = ConexaoPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":cod", $cod);

            return $p_sql->execute();
        } catch (Exception $e) {
            echo $e;
        }
    }

    public function BuscarTodos() {
        try {
            $sql = "SELECT
                    m.id as id, m.codigo as codigo,m.descricao as descricao, m.setor as setor, m.data as data,
                    m.user as user,m.tipomobilizado_id as tipoid, t.descricao as tiponome
                    FROM mobilizado m
                    inner join tipomobilizado as t on m.tipomobilizado_id= t.id
                    ORDER BY m.id desc ";
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

    public function BuscarSetor($setor) {
        try {
            $sql = "SELECT
                    m.id as id, m.codigo as codigo,m.descricao as descricao, m.setor as setor, m.data as data,
                    m.user as user,m.tipomobilizado_id as tipoid, t.descricao as tiponome
                    FROM mobilizado m
                    inner join tipomobilizado as t on m.tipomobilizado_id= t.id
                    WHERE m.setor LIKE '%$setor'
                    ORDER BY m.descricao asc ";
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
            $sql = "SELECT
                    m.id as id, m.codigo as codigo,m.descricao as descricao, m.setor as setor, m.data as data,
                    m.user as user,m.tipomobilizado_id as tipoid, t.descricao as tiponome
                    FROM mobilizado m
                    inner join tipomobilizado as t on m.tipomobilizado_id= t.id
                    WHERE m.descricao LIKE '%$nome%'
                    ORDER BY m.descricao asc ";
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
            $sql = "SELECT
                    m.id as id, m.codigo as codigo,m.descricao as descricao, m.setor as setor, m.data as data,
                    m.user as user,m.tipomobilizado_id as tipoid, t.descricao as tiponome
                    FROM mobilizado m
                    inner join tipomobilizado as t on m.tipomobilizado_id= t.id
                    WHERE m.tipomobilizado_id = '$status'
                    ORDER BY m.descricao asc ";
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
        $post = new Imobilizado();

        $post->setId($row['id']);
        $post->setCodigo($row['codigo']);
        $post->setDescricao($row['descricao']);
        $post->setSetor($row['setor']);
        $post->setData($row['data']);
        $post->setUsuario($row['user']);
        $post->setTipoimobilizado_id($row['tipoid']);
        $post->setTipoimobilizado_nome($row['tiponome']);

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
