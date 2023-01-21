<?php

require_once('./Controller/LocadorasController.php');

session_start();

$locadoraController = new LocadorasController();

if (isset($_GET['id'])) {
    $idImovel = $_GET['id'];

    $dadosImovel = $locadoraController->visualizar($idImovel);
} else {

    $_SESSION['error'] = 'Não foi encontrado o imóvel informado.';
    header('Location: ./index.php');
}
?>

<!doctype html>
<html lang="pt-Br">

<?php include('./header.php'); ?>

<body>

    <?php include('./menu.php'); ?>

    <div class="container p-2">

        <div class="alert alert-primary" role="alert">
            Visualizar dados do Imóvel
        </div>

        <dl class="row">
            <dt class="col-sm-3">Descrição:</dt>
            <dd class="col-sm-9"><?= $dadosImovel['descricao'] ?></dd>
           
            <dt class="col-sm-3">Tipo do Imóvel:</dt>
            <dd class="col-sm-9"><?= $dadosImovel['desc_tipo'] ?></dd>

            <dt class="col-sm-3">Endereço:</dt>
            <dd class="col-sm-9"><?= $dadosImovel['endereco'] ?></dd>

            <dt class="col-sm-3">Número:</dt>
            <dd class="col-sm-9"><?= $dadosImovel['numero'] ?></dd>

            <dt class="col-sm-3">CEP:</dt>
            <dd class="col-sm-9"><?= $dadosImovel['cep'] ?></dd>

            <dt class="col-sm-3">Bairro:</dt>
            <dd class="col-sm-9"><?= $dadosImovel['bairro'] ?></dd>

            <dt class="col-sm-3">Município:</dt>
            <dd class="col-sm-9"><?= $dadosImovel['municipio'] ?></dd>

            <dt class="col-sm-3">UF:</dt>
            <dd class="col-sm-9"><?= $dadosImovel['uf'] ?></dd>

            <dt class="col-sm-3">Valor Aluguel:</dt>
            <dd class="col-sm-9"><?= $dadosImovel['valor'] ?></dd>

        </dl>



    </div>



    <?php include('./footer.php'); ?>
</body>

</html>