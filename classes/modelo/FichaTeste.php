<?php

class FichaTeste {

    private $id;
    private $numero;
    private $fichatecnica_id;
    private $produto_id;
    private $valor;
    private $nc;
    private $acao;
    private $outro;

    function getNumero() {
        return $this->numero;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function getId() {
        return $this->id;
    }

    function getFichatecnica_id() {
        return $this->fichatecnica_id;
    }

    function getProduto_id() {
        return $this->produto_id;
    }

    function getValor() {
        return $this->valor;
    }

    function getNc() {
        return $this->nc;
    }

    function getAcao() {
        return $this->acao;
    }

    function getOutro() {
        return $this->outro;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setFichatecnica_id($fichatecnica_id) {
        $this->fichatecnica_id = $fichatecnica_id;
    }

    function setProduto_id($produto_id) {
        $this->produto_id = $produto_id;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function setNc($nc) {
        $this->nc = $nc;
    }

    function setAcao($acao) {
        $this->acao = $acao;
    }

    function setOutro($outro) {
        $this->outro = $outro;
    }

}
