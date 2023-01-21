<?php

require_once('./Controller/LocadorasController.php');

session_start();

$locadoraController = new LocadorasController();

if (isset($_GET['id'])) {
    $idImovel = $_GET['id'];

    $retorno = $locadoraController->excluir($idImovel);

    if (isset($retorno['erro'])) {
        $_SESSION['error'] = $retorno['erro'];
    } else {
        $_SESSION['sucesso'] = 'O Imovel foi excluido com sucesso.';
    }
} else {

    $_SESSION['error'] = 'Não foi encontrado o imóvel informado.';
}

header('Location: ./index.php');
