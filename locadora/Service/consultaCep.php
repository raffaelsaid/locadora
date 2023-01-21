<?php

try {
    $cep = isset($_GET['cep']) ? $_GET['cep'] : null;

    if ($cep == null) {
        throw new Exception("CEP não informado.", 1);
    }

    // Remoce a mascara
    $cep = preg_replace('/[^0-9]/', '', $cep);

    $url = "https://viacep.com.br/ws/{$cep}/json/";

    // Inicia
    $curl = curl_init();

    // Configura
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $url
    ]);

    // Envio e armazenamento da resposta
    $response = curl_exec($curl);

    // Fecha e limpa recursos
    curl_close($curl);

    echo ($response);
} catch (Exception $e) {
    echo json_encode(['erro' => $e->getMessage()]);
}
