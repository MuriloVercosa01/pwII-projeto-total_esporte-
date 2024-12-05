<?php

include("conexao.php");
// salvarEdit.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : '';
    $id_categoria = isset($_POST['id_categoria']) ? $_POST['id_categoria'] : '';

    // Exibe os dados recebidos
    var_dump($categoria);
    var_dump($id_categoria);

    // Ou você pode enviar uma resposta JSON para o JavaScript
    header('Content-Type: application/json');
    echo json_encode(['success' => true, 'message' => 'Dados recebidos com sucesso']);

    exit;
}
?>