<?php


class HistoricoConserto {

    private $id;
    private $data;
    private $conserto_id;
    private $usuario;
    private $operacao;
    
    function getId() {
        return $this->id;
    }

    function getData() {
        return $this->data;
    }

    function getConserto_id() {
        return $this->conserto_id;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getOperacao() {
        return $this->operacao;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setConserto_id($conserto_id) {
        $this->conserto_id = $conserto_id;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setOperacao($operacao) {
        $this->operacao = $operacao;
    }


    
}
