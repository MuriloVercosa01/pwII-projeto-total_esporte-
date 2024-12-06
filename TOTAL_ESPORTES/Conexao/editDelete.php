<?php
include('conexao.php');
var_dump($_POST);
// Verifique se os parâmetros estão presentes no POST
$id_categoria = isset($_POST['id_categoria']) ? $_POST['id_categoria'] : null;
$id_subcategoria = isset($_POST['id_subcategoria']) ? $_POST['id_subcategoria'] : null;

// Verifique se o id_categoria foi passado
if ($id_categoria !== null) {
    // Deleta da tabela categoria
    $stmt = $conexao->prepare("DELETE FROM categoria WHERE id_categoria = ?");
    $stmt->bind_param("i", $id_categoria);

    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo json_encode(["success" => true, "message" => "Categoria deletada com sucesso"]);
    } else {
        echo json_encode(["success" => false, "message" => "Nenhuma categoria encontrada"]);
    }

    // Feche o statement
    $stmt->close();
} 
// Verifique se o id_subcategoria foi passado
elseif ($id_subcategoria !== null) {
    // Deleta da tabela sub_categoria
    
    $stmt = $conexao->prepare("DELETE FROM sub_categoria WHERE id_sub_categoria = ?");
    $stmt->bind_param("i", $id_subcategoria);

    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo json_encode(["success" => true, "message" => "Subcategoria deletada com sucesso"]);
    } else {
        echo json_encode(["success" => false, "message" => "Nenhuma subcategoria encontrada"]);
    }

    // Feche o statement
    $stmt->close();
} else {
    // Caso nenhum parâmetro seja passado
    echo json_encode(["success" => false, "message" => "Parâmetro inválido"]);
}
?>