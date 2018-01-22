<?php

include_once '../../conexao/ConexaoPDO.php';
include_once '../modelo/Ideias.php';

class IdeiaDAO {

    public function Inserir(Ideias $ideia) {
        try {
            $sql = "INSERT INTO ideias (    
                  funcionario,
                  ideia,
                  data)
                  VALUES (
                  :funcionario,
                  :ideia,
                  :data)";

            $p_sql = ConexaoPDO::getInstance()->prepare($sql);

            $p_sql->bindValue(":funcionario", $ideia->getFuncionario());
            $p_sql->bindValue(":ideia", $ideia->getIdeia());
            $p_sql->bindValue(":data", $ideia->getData());


            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Inserir o representante" . $e;
        }
    }

    public function BuscarTodos() {
        try {
            $sql = "SELECT * FROM ideias order by id desc";
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
        $post = new Ideias();

        $post->setId($row['id']);
        $post->setFuncionario($row['funcionario']);
        $post->setIdeia($row['ideia']);
        $post->setData($row['data']);

        return $post;
    }

     public function Deletar($cod) {
        try {
            $sql = "DELETE FROM ideias WHERE id = :cod";
            $p_sql = ConexaoPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":cod", $cod);

            return $p_sql->execute();
        } catch (Exception $e) {
            //echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../aliss/vendedor/consultaRepresentante.php?msg=3 '>";
        }
    }
    
    
    
    
    
    
    public function Editar(Autorizada $auto) {
        try {
            $sql = "UPDATE post set
                
                  razao=:razao,
                  fantasia=:fantasia,
                  datafundacao=:datafundacao,
                  cnpj=:cnpj,
                  ie=:ie,
                  cep=:cep,
                  endereco=:endereco,
                  numero=:numero,
                  bairro=:bairro,
                  cidade=:cidade,
                  estado=:estado,
                  nomesocio=:nomesocio,
                  pessoaempresa=:pessoaempresa,
                  tecnicoempresa=:tecnicoempresa,
                  empresaatendida=:empresaatendida,
                  referencia=:referencia,
                  banco=:banco,
                  telefone1=:telefone1,
                  telefone2=:telefone2,
                  email=:email,
                  senha=:senha
                  
                  WHERE id = :id";


            $p_sql = ConexaoPDO::getInstance()->prepare($sql);

            $p_sql->bindValue(":razao", $auto->getRazao());
            $p_sql->bindValue(":fantasia", $auto->getFantasia());
            $p_sql->bindValue(":datafundacao", $auto->getDatafundacao());
            $p_sql->bindValue(":cnpj", $auto->getCnpj());
            $p_sql->bindValue(":ie", $auto->getIe());
            $p_sql->bindValue(":cep", $auto->getCep());
            $p_sql->bindValue(":endereco", $auto->getEndereco());
            $p_sql->bindValue(":numero", $auto->getNumero());
            $p_sql->bindValue(":bairro", $auto->getBairro());
            $p_sql->bindValue(":cidade", $auto->getCidade());
            $p_sql->bindValue(":estado", $auto->getEstado());
            $p_sql->bindValue(":nomesocio", $auto->getNomesocio());
            $p_sql->bindValue(":pessoaempresa", $auto->getPessoaempresa());
            $p_sql->bindValue(":tecnicoempresa", $auto->getTecnicoempresa());
            $p_sql->bindValue(":empresaatendida", $auto->getEmpresa());
            $p_sql->bindValue(":referencia", $auto->getReferencia());
            $p_sql->bindValue(":banco", $auto->getBanco());
            $p_sql->bindValue(":telefone1", $auto->getTelefone1());
            $p_sql->bindValue(":telefone2", $auto->getTelefone2());
            $p_sql->bindValue(":email", $auto->getEmail());
            $p_sql->bindValue(":senha", $auto->getSenha());

            $p_sql->bindValue(":id", $auto->getId());

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
