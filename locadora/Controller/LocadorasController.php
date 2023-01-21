<?php

require_once('./Model/Imoveis.php');
require_once('./Model/Tipos.php');

class LocadorasController
{
    protected $Imoveis;
    protected $Tipos;

    function __construct()
    {
        $this->Imoveis = new Imoveis();
        $this->Tipos = new Tipos();
    }

    /**
     * Lista de imoveis cadastrados
     */
    function index()
    {
        try {
            return $this->Imoveis->consultarListaImoveis();
        } catch (Exception $e) {
            echo 'Erro LocadorasController: ' . $e->getMessage();
        }
    }

    /**
     * Cadastra um novo imóvel
     */
    function cadastrar($dados)
    {
        try {
            $this->Imoveis->salvar($dados);
        } catch (Exception $e) {
            $retorno['erro'] = $e->getMessage();
            return $retorno;
        }
    }

    /**
     * Edita um imóvel
     */
    function editar($dados)
    {
        try {
            $this->Imoveis->editar($dados);
        } catch (Exception $e) {
            $retorno['erro'] = $e->getMessage();
            return $retorno;
        }
    }

    /**
     * Visualiza os dados de um imóvel
     */
    function visualizar($id)
    {
        try {
            return $this->Imoveis->consultarImovelPorId($id);
        } catch (Exception $e) {
            echo 'Erro LocadorasController: ' . $e->getMessage();
        }
    }

    /**
     * Visualiza os dados de um imóvel
     */
    function excluir($id)
    {
        try {
            return $this->Imoveis->excluir($id);
        } catch (Exception $e) {
            echo 'Erro LocadorasController: ' . $e->getMessage();
        }
    }

    function listarTipos()
    {
        return $this->Tipos->listar();
    }
}
