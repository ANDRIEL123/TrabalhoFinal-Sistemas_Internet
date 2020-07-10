<?php
class Cliente
{
    var $idCliente;
    var $nome;
    var $idade;
    var $sexo;
    var $endereco;
    var $numero;
    var $complemento;

    function __construct($_idCliente, $_nome, $_idade, $_sexo, $_endereco, $_numero, $_complemento)
    {
        $this->idCliente = $_idCliente;
        $this->nome = $_nome;
        $this->idade = $_sexo;
        $this->endereco = $_endereco;
        $this->numero = $_numero;
        $this->complemento = $_complemento;
    }

    function getIdCliente()
    {
        return $this->idCliente;
    }
    function setIdCliente($_idCliente)
    {
        $this->idCliente = $_idCliente;
    }
    function getNome()
    {
        return $this->nome;
    }
    function setNome($_nome)
    {
        $this->nome = $_nome;
    }
    function getIdade()
    {
        return $this->idade;
    }
    function setIdade($_idade)
    {
        $this->idade = $_idade;
    }
    function getSexo()
    {
        return $this->sexo;
    }
    function setSexo($_sexo)
    {
        $this->sexo = $_sexo;
    }
    function getEndereco()
    {
        return $this->endereco;
    }
    function setEndereco($_endereco)
    {
        $this->endereco = $_endereco;
    }
    function getNumero()
    {
        return $this->numero;
    }
    function setNumero($_numero)
    {
        $this->numero = $_numero;
    }
    function getComplemento()
    {
        return $this->complemento;
    }
    function setComplemento($_complemento)
    {
        $this->complemento = $_complemento;
    }
}
