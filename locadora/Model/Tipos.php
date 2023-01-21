<?php

require_once('./Config/Database.php');

class Tipos extends Database
{
    function __construct()
    {
        // inicializa o construtor da classe pai e abre a conexão com o banco
        parent::__construct();
    }

    /**
     * Consulta todos os imóveis cadastrados
     */
    function listar()
    {
        try {

            $sql = "SELECT * FROM TB_TIPO";

            $retorno = [];
            $consulta = $this->connection->query($sql);
            $tipos =  $consulta->fetchAll(PDO::FETCH_ASSOC);

            foreach ($tipos as $value) {
                $retorno[$value['id']] = $value['descricao'];
            }

            return $retorno;
        } catch (Exception $e) {
            echo 'Erro Imoveis: ' . $e->getMessage();
        }
    }
}
