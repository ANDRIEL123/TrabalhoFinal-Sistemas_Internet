<?php
include("Produto.php");





class Pedido extends Cliente
{
    var $idPedido;
    var $produto;
    function getIdPedido()
    {
        return $this->idPedido;
    }

    function setIdPedido($_idPedido)
    {
        $this->idPedido = $_idPedido;
    }
}
