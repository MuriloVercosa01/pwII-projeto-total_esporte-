<?php
    include('conexao.php');

    $id = $_POST['id_categoria']
    $id_sub = $_POST['id_subcategoria']

    if(isset($id)){
        //se $id não estiver vázia
        $stmt = $conexao->prepare("DELETE FROM categoria WHERE id_categoria = ?");

    
        $stmt->bind_param("i", $id);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "deletado com sucesso";
        } else {
            echo "nenhuma linha corresponde";
        }

        // Close the statement
        $stmt->close();
    } else{
        $stmt = $conexao->prepare("DELETE FROM sub_categoria WHERE id_sub_categoria = ?");

    
        $stmt->bind_param("i", $id_sub);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "deletado com sucesso";
        } else {
            echo "nenhuma linha corresponde";
        }

        // Close the statement
        $stmt->close();
    }
?>