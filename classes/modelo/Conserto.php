<?php

class Conserto {

    private $id;
    private $id_cliente;
    private $cliente;
    private $prateleira;
    private $local;
    private $data;
    private $saida;
    private $descricao;
    private $status;
    private $observacao;
    
    
    function getId_cliente() {
        return $this->id_cliente;
    }

    function setId_cliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }

        function getId() {
        return $this->id;
    }

    function getCliente() {
        return $this->cliente;
    }

    function getPrateleira() {
        return $this->prateleira;
    }

    function getLocal() {
        return $this->local;
    }

    function getData() {
        return $this->data;
    }

    function getSaida() {
        return $this->saida;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getStatus() {
        return $this->status;
    }

    function getObservacao() {
        return $this->observacao;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    function setPrateleira($prateleira) {
        $this->prateleira = $prateleira;
    }

    function setLocal($local) {
        $this->local = $local;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setSaida($saida) {
        $this->saida = $saida;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setObservacao($observacao) {
        $this->observacao = $observacao;
    }


    
   
}
