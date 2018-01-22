<?php

class Imobilizado {
    
    private $id;
    private $codigo;
    private $descricao;
    private $setor;
    private $data;
    private $usuario;
    private $tipoimobilizado_id;
    private $tipoimobilizado_nome;

    function getId() {
        return $this->id;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getSetor() {
        return $this->setor;
    }

    function getData() {
        return $this->data;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getTipoimobilizado_id() {
        return $this->tipoimobilizado_id;
    }

    function getTipoimobilizado_nome() {
        return $this->tipoimobilizado_nome;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setSetor($setor) {
        $this->setor = $setor;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setTipoimobilizado_id($tipoimobilizado_id) {
        $this->tipoimobilizado_id = $tipoimobilizado_id;
    }

    function setTipoimobilizado_nome($tipoimobilizado_nome) {
        $this->tipoimobilizado_nome = $tipoimobilizado_nome;
    }


}
