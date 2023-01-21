<?php

require_once('./Controller/LocadorasController.php');

session_start();

$locadoraController = new LocadorasController();


if (isset($_GET['id'])) {
    $idImovel = $_GET['id'];

    $dadosImovel = $locadoraController->visualizar($idImovel);
    $tipos = $locadoraController->listarTipos();
} else {
    $_SESSION['error'] = 'Não foi encontrado o imóvel informado.';
    header('Location: ./index.php');
}

if ($_POST) {

    $dados = $_POST;

    $retorno = $locadoraController->editar($dados);

    if (isset($retorno['erro'])) {
        $_SESSION['error'] = $retorno['erro'];
    } else {
        $_SESSION['sucesso'] = 'Os dados foram Editados com sucesso';
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

                <form action="./editar.php?id=<?= $idImovel ?>" method="post">

                    <input type="hidden" name="id" value="<?= $dadosImovel['id'] ?>">

                    <div class="form-group">
                        <input type="text" name="descricao" id="descricao" class="form-control" placeholder="Descrição" value="<?= $dadosImovel['descricao'] ?>" required>
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
                        <input type="text" name="cep" id="cep" class="form-control" placeholder="CEP" value="<?= $dadosImovel['cep'] ?>" required>
                    </div>

                    <div class="form-group">
                        <input type="text" name="endereco" id="endereco" class="form-control" placeholder="Endereço" value="<?= $dadosImovel['endereco'] ?>" readonly required>
                    </div>

                    <div class="form-group">
                        <input type="text" name="numero" id="numero" class="form-control" placeholder="Número" value="<?= $dadosImovel['numero'] ?>" required>
                    </div>

                    <div class="form-group">
                        <input type="text" name="bairro" id="bairro" class="form-control" placeholder="Bairro" value="<?= $dadosImovel['bairro'] ?>" readonly required>
                    </div>

                    <div class="form-group">
                        <input type="text" name="uf" id="uf" class="form-control" placeholder="UF" value="<?= $dadosImovel['uf'] ?>" readonly required>
                    </div>

                    <div class="form-group">
                        <input type="text" name="municipio" id="municipio" class="form-control" placeholder="Municipio" value="<?= $dadosImovel['municipio'] ?>" readonly required>
                    </div>

                    <div class="form-group">
                        <input type="text" name="valor" id="valor" class="form-control" placeholder="Valor Aluguel" value="<?= $dadosImovel['valor'] ?>" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>

            </div>
        </div>

        <?php include('./footer.php'); ?>
</body>

<script src="./webroot/js/consultaCep.js"></script>

</html>