<?php

include_once '../../conexao/ConexaoPDO.php';
include_once '../modelo/Produto.php';

class ProdutoDAO {

    public function BuscarTodos() {
        try {
            $sql = "SELECT * FROM produtos order by nome asc";
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
        $post = new Produto();

        $post->setId($row['id']);
        $post->setNome($row['nome']);

        return $post;
    }

}
