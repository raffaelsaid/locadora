<?php

require_once('./Controller/LocadorasController.php');

session_start();

$locadoraController = new LocadorasController();

$dados = $locadoraController->index();

?>

<!doctype html>
<html lang="pt-Br">

<?php include('./header.php'); ?>

<body>
    <?php
    include('./menu.php');
    ?>

    <div class="container">
        <?php include('./alerta.php'); ?>

        <div class="row mt-2">
            <div class="col-12 text-right">
                <a href="./cadastrar.php" class="btn btn-success btn-sm mx-1" role="button" aria-pressed="true">Cadastrar</a>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table  table-striped">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Descrição</td>
                                <td>Tipo</td>
                                <td>CEP</td>
                                <td>Município</td>
                                <td>Valor</td>
                                <td width="260">Ações</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dados as $dado) { ?>
                                <tr>
                                    <td><?= $dado['id'] ?></td>
                                    <td><?= $dado['descricao'] ?></td>
                                    <td><?= $dado['desc_tipo'] ?></td>
                                    <td><?= $dado['cep'] ?></td>
                                    <td><?= $dado['municipio'] ?></td>
                                    <td><?= $dado['valor'] ?></td>
                                    <td><?php

                                        echo "<a href='./visualizar.php?id={$dado['id']}' class='btn btn-primary btn-sm mx-1' role='button' aria-pressed='true'>Visualizar</a>";
                                        echo "<a href='./editar.php?id={$dado['id']}' class='btn btn-success btn-sm mx-1' role='button' aria-pressed='true'>Editar</a>";
                                        echo "<a href='./excluir.php?id={$dado['id']}' class='btn btn-danger btn-sm mx-1' role='button' aria-pressed='true'>Deletar</a>";
                                        ?></td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php include('./footer.php'); ?>
</body>

</html>