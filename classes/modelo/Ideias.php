<?php

class Ideias {
  
    private $id;
    private $funcionario;
    private $ideia;
    private $data;
    
    function getId() {
        return $this->id;
    }

    function getFuncionario() {
        return $this->funcionario;
    }

    function getIdeia() {
        return $this->ideia;
    }

    function getData() {
        return $this->data;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setFuncionario($funcionario) {
        $this->funcionario = $funcionario;
    }

    function setIdeia($ideia) {
        $this->ideia = $ideia;
    }

    function setData($data) {
        $this->data = $data;
    }


}
