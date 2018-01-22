<?php

class HistoricoConsertoDAO {

    public function Inserir(HistoricoConserto $conserto) {
        try {
            $sql = "INSERT INTO historico_conserto (    
                  data,
                  conserto_id,
                  usuario,
                  operacao)
                  VALUES (
                  :data,
                  :conserto_id,
                  :usuario,
                  :operacao)";

            $p_sql = ConexaoPDO::getInstance()->prepare($sql);

            $p_sql->bindValue(":data", $conserto->getData());
            $p_sql->bindValue(":conserto_id", $conserto->getConserto_id());
            $p_sql->bindValue(":usuario", $conserto->getUsuario());
            $p_sql->bindValue(":operacao", $conserto->getOperacao());

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Inserir o representante" . $e;
        }
    }

    public function BuscarTodos($id) {
        try {
            $sql = "SELECT * FROM historico_conserto WHERE conserto_id = $id";
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
        $post = new HistoricoConserto();

        $post->setId($row['id']);
        $post->setData($row['data']);
        $post->setUsuario($row['usuario']);
        $post->setConserto_id($row['conserto_id']);
        $post->setOperacao($row['operacao']);
                
        return $post;
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
