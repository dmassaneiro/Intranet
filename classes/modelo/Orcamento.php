<?php


class Orcamento {
    
    private $id;
    private $data;
    private $cliente_id;
    private $cliente;
    private $numeroserie;
    private $descricao;
    private $ocorrencia;
    private $situacao;
    private $status;
    private $saida;
    private $obsercacao;
    
    function getId() {
        return $this->id;
    }

    function getData() {
        return $this->data;
    }

    function getCliente_id() {
        return $this->cliente_id;
    }

    function getCliente() {
        return $this->cliente;
    }

    function getNumeroserie() {
        return $this->numeroserie;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getOcorrencia() {
        return $this->ocorrencia;
    }

    function getSituacao() {
        return $this->situacao;
    }

    function getStatus() {
        return $this->status;
    }

    function getSaida() {
        return $this->saida;
    }

    function getObsercacao() {
        return $this->obsercacao;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setCliente_id($cliente_id) {
        $this->cliente_id = $cliente_id;
    }

    function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    function setNumeroserie($numeroserie) {
        $this->numeroserie = $numeroserie;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setOcorrencia($ocorrencia) {
        $this->ocorrencia = $ocorrencia;
    }

    function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setSaida($saida) {
        $this->saida = $saida;
    }

    function setObsercacao($obsercacao) {
        $this->obsercacao = $obsercacao;
    }


}
