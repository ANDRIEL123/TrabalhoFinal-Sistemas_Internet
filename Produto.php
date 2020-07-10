<?php
class Produto
{
    var $idProduto;
    var $nome;
    var $precoUnitario;

    function __construct()
    {
    }

    function getIdProduto()
    {
        return $this->idProduto;
    }
    function setIdProduto($_idProduto)
    {
        $this->idProduto = $_idProduto;
    }
    function getNome()
    {
        return $this->nome;
    }
    function setNome($_nome)
    {
        $this->nome = $_nome;
    }
    function getPrecoUnitario()
    {
        return $this->precoUnitario;
    }
    function setPrecoUnitario($_PrecoUnitario)
    {
        $this->precoUnitario = $_PrecoUnitario;
    }
}
