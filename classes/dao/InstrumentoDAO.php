<?php

include_once '../../conexao/ConexaoPDO.php';
include_once '../modelo/Instrumento.php';

class InstrumentoDAO {

    public function Inserir(Instrumento $inst) {
        try {
            $sql = "INSERT INTO instrumento (    
                  nome,
                  numero)
                  VALUES (
                  :nome,
                  :numero)";

            $p_sql = ConexaoPDO::getInstance()->prepare($sql);

            $p_sql->bindValue(":nome", $inst->getNome());
            $p_sql->bindValue(":numero", $inst->getNumero());

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Inserir o representante" . $e;
        }
    }

    public function Deletar($cod) {
        try {
            $sql = "DELETE FROM instrumento WHERE id = :cod";
            $p_sql = ConexaoPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":cod", $cod);

            return $p_sql->execute();
        } catch (Exception $e) {
            echo $e;
            ;
        }
    }

    public function Editar(Instrumento $serasa) {
        try {
            $sql = "UPDATE instrumento set
                
                  nome=:nome,
                  numero=:empresa
                                   
                  WHERE id = :id";


            $p_sql = ConexaoPDO::getInstance()->prepare($sql);

            $p_sql->bindValue(":nome", $serasa->getNome());
            $p_sql->bindValue(":empresa", $serasa->getNumero()  );

            $p_sql->bindValue(":id", $serasa->getId());

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar fazer Update<br>" . $e;
        }
    }

    public function BuscarTodos() {
        try {
            $sql = "SELECT * FROM instrumento order by nome asc";
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
        $post = new Instrumento();

        $post->setId($row['id']);
        $post->setNome($row['nome']);
        $post->setNumero($row['numero']);

        return $post;
    }

}
