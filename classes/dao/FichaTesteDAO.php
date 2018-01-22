<?php

include_once '../../../conexao/ConexaoPDO.php';
include_once '../modelo/FichaTeste.php';

class FichaTesteDAO {

    public function Inserir(FichaTeste $fichateste) {
        try {
            $sql = "INSERT INTO ficha_teste (    
                numero,
                fichatecnica_id,
                produto_id,
                valor,
                outro,
                nc,
                acao)
                VALUES (
                :numero,
                :fichatecnica_id,
                :produto_id,
                :valor,
                :outro,
                :nc,
                :acao)";

            $p_sql = ConexaoPDO::getInstance()->prepare($sql);

            $p_sql->bindValue(":numero", $fichateste->getNumero());
            $p_sql->bindValue(":fichatecnica_id", $fichateste->getFichatecnica_id());
            $p_sql->bindValue(":produto_id", $fichateste->getProduto_id());
            $p_sql->bindValue(":valor", $fichateste->getValor());
            $p_sql->bindValue(":outro", $fichateste->getOutro());
            $p_sql->bindValue(":nc", $fichateste->getNc());
            $p_sql->bindValue(":acao", $fichateste->getAcao());

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Inserir o representante" . $e;
        }
    }

    public function BuscarTodosFicha($ficha) {
        try {
            $sql = "SELECT * FROM ficha_teste WHERE fichatecnica_id = '$ficha' order by id desc";
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
        $post = new FichaTeste();

        $post->setId($row['id']);
        $post->setNumero($row['numero']);
        $post->setFichatecnica_id($row['fichatecnica_id']);
        $post->setProduto_id($row['produto_id']);
        $post->setValor($row['valor']);
        $post->setOutro($row['outro']);
        $post->setAcao($row['acao']);
        $post->setnc($row['nc']);

        return $post;
    }

    public function BuscarUltimoNumero($ficha) {
        try {
            $sql = "SELECT * FROM ficha_teste WHERE fichatecnica_id = $ficha"
                    . " order by numero desc limit 1";
            $p_sql = ConexaoPDO::getInstance()->query($sql);
            $p_sql->execute();
            return $this->listanumero($p_sql->fetch(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar buscar.".$e;
        }
    }

    private function listanumero($row) {
        $post = new FichaTeste();
        $post->setNumero($row['numero']);

        return $post;
    }

    public function Deletar($cod) {
        try {
            $sql = "DELETE FROM ficha_teste WHERE id = :cod";
            $p_sql = ConexaoPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":cod", $cod);

            return $p_sql->execute();
        } catch (Exception $e) {
            echo $e;
        }
    }

    public function Editar(FichaTeste $teste ){
        try {
            $sql = "UPDATE ficha_teste set
                  numero=:numero,
                  valor=:valor,
                  outro=:outro,
                  nc=:nc,
                  acao=:acao
                                   
                  WHERE id = :id";


            $p_sql = ConexaoPDO::getInstance()->prepare($sql);

            $p_sql->bindValue(":numero", $teste->getNumero());
            $p_sql->bindValue(":valor", $teste->getValor());
            $p_sql->bindValue(":outro", $teste->getOutro());
            $p_sql->bindValue(":nc", $teste->getNc());
            $p_sql->bindValue(":acao", $teste->getAcao());

            $p_sql->bindValue(":id", $teste->getId());

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar fazer Update<br>" . $e;
        }
    }
    public function EditarTeste(FichaTeste $teste ){
        try {
            $sql = "UPDATE ficha_teste set
                  numero=:numero,
                  valor=:valor,
                  outro=:outro,
                  nc=:nc
                                                     
                  WHERE id = :id";


            $p_sql = ConexaoPDO::getInstance()->prepare($sql);

            $p_sql->bindValue(":numero", $teste->getNumero());
            $p_sql->bindValue(":valor", $teste->getValor());
            $p_sql->bindValue(":outro", $teste->getOutro());
            $p_sql->bindValue(":nc", $teste->getNc());
            
            $p_sql->bindValue(":id", $teste->getId());

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar fazer Update<br>" . $e;
        }
    }
    
}
