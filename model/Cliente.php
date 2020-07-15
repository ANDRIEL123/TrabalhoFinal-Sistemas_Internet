<?php
class Cliente
{
    var $idCliente;
    var $nome;
    var $idade;
    var $sexo;
    var $bairro;
    var $estado;
    var $cidade;
    var $endereco;
    var $numero;
    var $complemento;
    var $cep;

    function __construct($_nome, $_idade, $_sexo, $_endereco, $_bairro, $_estado, $_numero, $_complemento, $_cep, $_cidade)
    {
        $this->nome = $_nome;
        $this->endereco = $_endereco;
        $this->numero = $_numero;
        $this->complemento = $_complemento;
        $this->estado = $_estado;
        $this->bairro = $_bairro;
        $this->cep = $_cep;
        $this->cidade = $_cidade;
        $this->idade = $_idade;
        $this->sexo = $_sexo;
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
    function getBairro()
    {
        return $this->bairro;
    }
    function setBairro($_bairro)
    {
        $this->bairro = $_bairro;
    }
    function getEstado()
    {
        return $this->estado;
    }
    function setEstado($_estado)
    {
        $this->estado = $_estado;
    }
    function getCep()
    {
        return $this->cep;
    }
    function setCep($_cep)
    {
        $this->cep = $_cep;
    }
    function getCidade()
    {
        return $this->cidade;
    }
    function setCidade($_cidade)
    {
        $this->cidade = $_cidade;
    }
}
