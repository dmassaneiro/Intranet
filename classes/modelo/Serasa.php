<?php

class Serasa {
    
    private $id;
    private $codigo;
    private $nome;
    private $empresa;
    
    function getId() {
        return $this->id;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getNome() {
        return $this->nome;
    }

    function getEmpresa() {
        return $this->empresa;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEmpresa($empresa) {
        $this->empresa = $empresa;
    }


}
