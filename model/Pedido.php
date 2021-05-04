<?php
include("Produto.php");
include("Cliente.php");

class Pedido extends Cliente
{
    var $idPedido;
    var $idCliente;

    //INSTANCIANDO $this->produto->getNome();

    var $listaProdutos = array();

    function getIdCliente()
    {
        return $this->idCliente;
    }

    function setIdCliente($_idCliente)
    {
        $this->idCliente = $_idCliente;
    }

    function getIdPedido()
    {
        return $this->idPedido;
    }

    function getListaProdutos()
    {
        foreach ($this->listaProdutos as $produto) {
            echo $produto;
        }
    }

    function addProduto($_produto)
    {
        array_push($this->listaProdutos, $_produto);
    }

    function deleteProduto($_index)
    {
        array_splice($this->listaProdutos, $_index, 1);
    }
}
