<?php

class Instrumento {
   
    private $id;
    private $nome;
    private $numero;
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getNumero() {
        return $this->numero;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }


}
