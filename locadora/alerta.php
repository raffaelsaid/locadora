<?php

if (isset($_SESSION['error'])) {
    $mensagem = $_SESSION['error'];

    echo "<div class='row mt-2'>";
    echo "<div class='col-12'>";
    echo "<div class='alert alert-danger' role='alert'>{$mensagem}</div>";
    echo "</div>";
    echo "</div>";

    unset($_SESSION['error']);
}

if (isset($_SESSION['sucesso'])) {
    $mensagem = $_SESSION['sucesso'];

    echo "<div class='row mt-2'>";
    echo "<div class='col-12'>";
    echo "<div class='alert alert-success' role='alert'>{$mensagem}</div>";
    echo "</div>";
    echo "</div>";

    unset($_SESSION['sucesso']);
}
