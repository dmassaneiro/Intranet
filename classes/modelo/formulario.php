<?php

class formulario {
   
    private $id;
    private $descricao;
    private $caminho;

    function getId() {
        return $this->id;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getCaminho() {
        return $this->caminho;
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


}
