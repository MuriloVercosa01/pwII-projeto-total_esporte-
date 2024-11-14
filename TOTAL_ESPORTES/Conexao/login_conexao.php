<?php
    print_r($_REQUEST);
    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']) )
    {
        print_r("tá funcionando");
        include_once("conexao.php");
        if($conexao->connect_error){
            die("Conexão falhou:" . $conexao->connect_error);
        }
        $_email = $_POST['email'];
        $_senha = $_POST['senha'];

        $sql = "SELECT * FROM cadastros WHERE email = ? AND senha = ?";

        $stmt = $conexao->prepare($sql);

        if($stmt === false){
            echo("erro na preparação da consulta:" . $conexao->error);
        }
        $stmt->bind_param("ss", $email,$senha);

        $execute_result = $stmt->get_result();

        if($execute_result === false){
            die("erro ao obter a pesquisa:" . $stmt->error);
        }
        $result = $stmt->get_result();
        
        if($result === false){
            die("erro ao obter resultado". $stmt->error);
        }
        print_r($result);
        if(mysqli_num_rows($result = "0"))
        {
            echo("não há correspondência");
        } else{
            echo("há correspondência");
            echo '<srcipt>alert("cadastro realizado com sucesso");</script>;'
        }
    } else{
        echo("<h1> não tá tudo certo ai chefe</h1>");
    }
?>