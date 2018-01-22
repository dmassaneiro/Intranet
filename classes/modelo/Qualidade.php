<?php

class Qualidade {
   
    private $id;
    private $descricao;
    private $caminho;
    private $data;
    
    function getId() {
        return $this->id;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getCaminho() {
        return $this->caminho;
    }

    function getData() {
        return $this->data;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setCaminho($caminho) {
        $this->caminho = $caminho;
    }

    function setData($data) {
        $this->data = $data;
    }


}
