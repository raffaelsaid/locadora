<?php

require_once('./Config/Database.php');

class Imoveis extends Database
{
    function __construct()
    {
        // inicializa o construtor da classe pai e abre a conexão com o banco
        parent::__construct();
    }

    /**
     * Consulta todos os imóveis cadastrados
     */
    function consultarListaImoveis()
    {
        try {

            $sql = "SELECT 
                        Imovel.id,
                        Imovel.descricao,
                        Imovel.cep,
                        Imovel.municipio,
                        Imovel.uf,
                        Imovel.valor,
                        Tipo.descricao as desc_tipo
                    FROM TB_IMOVEIS Imovel INNER JOIN TB_TIPO Tipo ON (Imovel.tipo_id = Tipo.id)
                    ORDER BY Imovel.id";

            $consulta = $this->connection->query($sql);
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo 'Erro Imoveis: ' . $e->getMessage();
        }
    }

    /**
     * 
     */
    function consultarImovelPorId($id)
    {
        try {

            $sql = "SELECT 
                        Imovel.id,
                        Imovel.descricao,
                        Imovel.endereco,
                        Imovel.numero,
                        Imovel.cep,
                        Imovel.bairro,
                        Imovel.municipio,
                        Imovel.uf,
                        Imovel.valor,
                        Tipo.descricao as desc_tipo
                    FROM 
                        TB_IMOVEIS Imovel INNER JOIN TB_TIPO Tipo ON (Imovel.tipo_id = Tipo.id)
                    WHERE Imovel.id = {$id}";

            $consulta = $this->connection->query($sql);
            $consulta = $consulta->fetchAll(PDO::FETCH_ASSOC);

            return isset($consulta[0]) ? $consulta[0] : [];
        } catch (Exception $e) {
            echo 'Erro Imoveis: ' . $e->getMessage();
        }
    }

    /**
     * 
     */
    function salvar($dados)
    {
        $sql = "INSERT INTO TB_IMOVEIS (tipo_id, descricao, endereco, numero, cep, bairro, municipio, uf, valor) VALUES (:tipo_id, :descricao, :endereco, :numero, :cep, :bairro, :municipio, :uf, :valor)";
        $this->_cadastrarEditar($sql, $dados);
    }

    /**
     * 
     * 
     */
    public function editar($dados)
    {
        // $sql = "INSERT INTO TB_IMOVEIS (tipo_id, descricao, endereco, numero, cep, bairro, municipio, uf, valor) VALUES (:tipo_id, :descricao, :endereco, :numero, :cep, :bairro, :municipio, :uf, :valor)";
        $sql = "UPDATE TB_IMOVEIS SET tipo_id = :tipo_id, descricao = :descricao, endereco = :endereco, numero = :numero, cep = :cep, bairro = :bairro, municipio = :municipio, uf = :uf, valor = :valor WHERE id = :id";

        $this->_cadastrarEditar($sql, $dados);
    }

    /**
     * 
     */
    function excluir($id)
    {
        try {

            $sql = "DELETE FROM TB_IMOVEIS where id = {$id}";

            $consulta = $this->connection->query($sql);
            $consulta = $consulta->fetchAll(PDO::FETCH_ASSOC);

            return isset($consulta[0]) ? $consulta[0] : [];
        } catch (Exception $e) {
            echo 'Erro Imoveis: ' . $e->getMessage();
        }
    }

    private function _cadastrarEditar($sql, $dados)
    {
        $data = [
            'tipo_id' => isset($dados['tipo_id']) ? $dados['tipo_id'] : 1,
            'descricao' => isset($dados['descricao']) ? $dados['descricao'] : null,
            'endereco' => isset($dados['endereco']) ? $dados['endereco'] : null,
            'numero' => isset($dados['numero']) ? $dados['numero'] : null,
            'cep' => isset($dados['cep']) ? $dados['cep'] : null,
            'bairro' => isset($dados['bairro']) ? $dados['bairro'] : null,
            'municipio' => isset($dados['municipio']) ? $dados['municipio'] : null,
            'uf' => isset($dados['uf']) ? $dados['uf'] : null,
            'valor' => isset($dados['valor']) ? $dados['valor'] : null,
        ];

        if (isset($dados['id'])) {
            $data['id'] = $dados['id'];
        }

        if ($data['tipo_id'] == null || $data['descricao'] == null || $data['endereco'] == null || $data['numero'] == null || $data['cep'] == null || $data['bairro'] == null || $data['municipio'] == null || $data['uf'] == null) {
            print_r('aqui');
            throw new Exception("Favor preencher todos os campos");
        }

        $stmt = $this->connection->prepare($sql);

        if (!$stmt->execute($data)) {
            throw new Exception("Error Processing Request", 1);
        }
    }
}
