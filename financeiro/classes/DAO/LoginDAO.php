<?php

require_once './../../../conexao/Conexao.php';

class LoginDAO2 {

   public function BuscarLogin($login,$senha) {
        try {
            $sql = "SELECT * FROM Usuarios WHERE login = '$login' AND senha= '$senha'";
            $result = ConexaoPDO::getInstance()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->lista($l);
            }
            return true;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }
     private function Lista($row) {
        $post = new Login();

        $post->setId($row['id']);
        $post->setLogin($row['login']);
        $post->setSenha($row['senha']);
        $post->setUsuario($row['nome']);
        $post->setAcesso($row['acesso']);

        return $post;
    }
}
