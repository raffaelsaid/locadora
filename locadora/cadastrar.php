<?php

require_once('./Controller/LocadorasController.php');

session_start();

$locadoraController = new LocadorasController();
$tipos = $locadoraController->listarTipos();

if ($_POST) {

    $dados = $_POST;

    $retorno = $locadoraController->cadastrar($dados);

    if (isset($retorno['erro'])) {
        $_SESSION['error'] = $retorno['erro'];
    } else {
        $_SESSION['sucesso'] = 'Os dados foram cadastrados com sucesso';
    }
}
?>

<!doctype html>
<html lang="pt-Br">

<?php include('./header.php'); ?>

<body>

    <?php include('./menu.php'); ?>

    <div class="container">

        <?php include('./alerta.php'); ?>

        <div class="row">
            <div class="col-12 text-left">

                <form action="./cadastrar.php" method="post">

                    <div class="form-group">
                        <input type="text" name="descricao" id="descricao" class="form-control" placeholder="Descrição" required>
                    </div>

                    <div class="input-group mb-3">
                        <select class="custom-select" name="tipo_id" id="tipo_id">
                            <?php
                            foreach ($tipos as $key => $tipo) {
                                $selected = null;
                                if ($dadosImovel['tipo_id'] == $key) {
                                    $selected = 'selected';
                                }
                                echo "<option value='{$key}' {$selected}>{$tipo}</option>";
                            }
                            ?>
                        </select>
                    </div>


                    <div class="form-group">
                        <input type="text" name="cep" id="cep" class="form-control" placeholder="CEP" required>
                    </div>

                    <div class="form-group">
                        <input type="text" name="endereco" id="endereco" class="form-control" placeholder="Endereço" readonly required>
                    </div>

                    <div class="form-group">
                        <input type="text" name="numero" id="numero" class="form-control" placeholder="Número" required>
                    </div>

                    <div class="form-group">
                        <input type="text" name="bairro" id="bairro" class="form-control" placeholder="Bairro" readonly required>
                    </div>

                    <div class="form-group">
                        <input type="text" name="uf" id="uf" class="form-control" placeholder="UF" readonly required>
                    </div>

                    <div class="form-group">
                        <input type="text" name="municipio" id="municipio" class="form-control" placeholder="Municipio" readonly required>
                    </div>

                    <div class="form-group">
                        <input type="text" name="valor" id="valor" class="form-control" placeholder="Valor Aluguel" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>

            </div>
        </div>

        <?php include('./footer.php'); ?>
</body>

<script src="./webroot/js/consultaCep.js"></script>

</html>