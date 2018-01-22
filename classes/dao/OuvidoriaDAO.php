<?php

class OuvidoriaDAO {
  
    public function Inserir(Ouvidoria $ouvi) {
        try {
            $sql = "INSERT INTO ouvidoria (    
                  nome,
                  descricao,
                  data)
                  VALUES (
                  :nome,
                  :descricao,
                  :data)";

            $p_sql = ConexaoPDO::getInstance()->prepare($sql);

            $p_sql->bindValue(":nome", $ouvi->getNome());
            $p_sql->bindValue(":descricao", $ouvi->getDescricao());
            $p_sql->bindValue(":data", $ouvi->getData());


            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Inserir o representante" . $e;
        }
    }

    public function BuscarTodos() {
        try {
            $sql = "SELECT * FROM ouvidoria order by id desc";
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

    private function Lista($row) {
        $post = new Ouvidoria();

        $post->setId($row['id']);
        $post->setNome($row['nome']);
        $post->setDescricao($row['descricao']);
        $post->setData($row['data']);

        return $post;
    }
    
}
