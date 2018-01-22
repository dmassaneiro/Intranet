<?php

include_once '../../conexao/ConexaoPDO.php';
include_once '../modelo/Ideias.php';

class SerasaDAO {

    public function Inserir(Serasa $serasa) {
        try {
            $sql = "INSERT INTO serasa (    
                  codigo,
                  nome,
                  empresa)
                  VALUES (
                  :codigo,
                  :nome,
                  :empresa)";

            $p_sql = ConexaoPDO::getInstance()->prepare($sql);

            $p_sql->bindValue(":codigo", $serasa->getCodigo());
            $p_sql->bindValue(":nome", $serasa->getNome());
            $p_sql->bindValue(":empresa", $serasa->getEmpresa());


            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Inserir o representante" . $e;
        }
    }

    public function BuscarTodos() {
        try {
            $sql = "SELECT * FROM serasa order by nome asc";
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
    public function BuscarCodigo($codigo) {
        try {
            $sql = "SELECT * FROM serasa WHERE codigo = '$codigo' order by nome asc";
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
            $sql = "SELECT * FROM serasa WHERE nome LIKE '%$nome%' order by nome asc";
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
    public function BuscarEmpresa($empresa) {
        try {
            $sql = "SELECT * FROM serasa WHERE empresa LIKE '%$empresa%' order by nome asc";
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
        $post = new Serasa();

        $post->setId($row['id']);
        $post->setCodigo($row['codigo']);
        $post->setNome($row['nome']);
        $post->setEmpresa($row['empresa']);

        return $post;
    }

    public function Deletar($cod) {
        try {
            $sql = "DELETE FROM serasa WHERE id = :cod";
            $p_sql = ConexaoPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":cod", $cod);

            return $p_sql->execute();
        } catch (Exception $e) {
            echo $e;;
        }
    }

    public function Editar(Serasa $serasa) {
        try {
            $sql = "UPDATE serasa set
                  codigo=:codigo,
                  nome=:nome,
                  empresa=:empresa
                                   
                  WHERE id = :id";


            $p_sql = ConexaoPDO::getInstance()->prepare($sql);

            $p_sql->bindValue(":codigo", $serasa->getCodigo());
            $p_sql->bindValue(":nome", $serasa->getNome());
            $p_sql->bindValue(":empresa", $serasa->getEmpresa());

            $p_sql->bindValue(":id", $serasa->getId());

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar fazer Update<br>" . $e;
        }
    }
    
    
    
    
    
    
    
    
    
    

    public function BuscarPorNome($repre) {
        try {
            $sql = "SELECT * FROM auto
                    WHERE fantasia  LIKE '%$repre%'
                    ORDER BY fantasia desc";

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

    public function BuscarPorCnpj($representante) {
        try {
            $sql = "SELECT * FROM auto
                    WHERE cnpj = '$representante'
                    ORDER BY id desc";

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

}
