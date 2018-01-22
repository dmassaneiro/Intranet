<?php

class ClienteDAO {

    public function Inserir(Cliente $cliente) {
        try {
            $sql = "INSERT INTO cliente (    
                  nome)
                  VALUES (
                  :nome)";

            $p_sql = ConexaoPDO::getInstance()->prepare($sql);

            $p_sql->bindValue(":nome", $cliente->getNome());

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Inserir o representante" . $e;
        }
    }

    public function BuscarTodos() {
        try {
            $sql = "SELECT * FROM cliente order by nome asc";
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

    public function PegaId() {
        try {
            $sql = "SELECT * FROM cliente order by id desc limit 1";
            $p_sql = ConexaoPDO::getInstance()->query($sql);
            $p_sql->execute();
            return $this->listaId($p_sql->fetch(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar buscar.";
        }
    }

    private function listaId($row) {
        $cliente = new Cliente();
        $cliente->setId($row['id']);

        return $cliente;
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
        $post = new Cliente();

        $post->setId($row['id']);
        $post->setNome($row['nome']);

        return $post;
    }

    public function Deletar($cod) {
        try {
            $sql = "DELETE FROM cliente WHERE id = :cod";
            $p_sql = ConexaoPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":cod", $cod);

            return $p_sql->execute();
        } catch (Exception $e) {
            echo $e;
            ;
        }
    }

    public function Editar(Cliente $cliente) {
        try {
            $sql = "UPDATE cliente set
                  nome=:nome,
              
                  WHERE id = :id";


            $p_sql = ConexaoPDO::getInstance()->prepare($sql);

            $p_sql->bindValue(":nome", $cliente->getNome());
            $p_sql->bindValue(":id", $cliente->getId());

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar fazer Update<br>" . $e;
        }
    }

}
