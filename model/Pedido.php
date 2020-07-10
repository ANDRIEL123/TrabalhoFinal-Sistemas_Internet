<?php
include("Produto.php");

class Pedido extends Cliente
{
    var $idPedido;
    var $produto = new Produto();
    //INSTANCIANDO $this->produto->getNome();

    function getIdPedido()
    {
        return $this->idPedido;
    }

    function setIdPedido($_idPedido)
    {
        $this->idPedido = $_idPedido;
    }
}
