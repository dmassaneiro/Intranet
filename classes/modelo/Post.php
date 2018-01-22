<?php


class Post {

    private $id;
    private $funcionario;
    private $descricao;
    private $data;
    private $hora;
    
    function getId() {
        return $this->id;
    }

    function getFuncionario() {
        return $this->funcionario;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getData() {
        return $this->data;
    }

    function getHora() {
        return $this->hora;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setFuncionario($funcionario) {
        $this->funcionario = $funcionario;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }


}
