<?php

class Login {

    private $id;
    private $login;
    private $senha;
    private $usuario;
    private $acesso;
    
    function getId() {
        return $this->id;
    }

    function getLogin() {
        return $this->login;
    }

    function getSenha() {
        return $this->senha;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getAcesso() {
        return $this->acesso;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setAcesso($acesso) {
        $this->acesso = $acesso;
    }


}
