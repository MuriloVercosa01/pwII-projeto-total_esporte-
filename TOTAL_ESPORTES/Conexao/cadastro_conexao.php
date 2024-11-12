<?php
    print_r($_REQUEST);
    if(!empty($_POST['email']) && !empty($_POST['nome']) && !empty($_POST['senha']) && !empty($_POST['csenha']) && isset($_POST['submit']) )
    {
        echo('todos os dados foram enviados');
        //caso todos os dados tenham sido enviados
        $_email = $_POST['email'];
        $_nome = $_POST['nome'];
        $_senha = $_POST['senha'];
        $_comSenha = $_POST['csenha'];


        if($_senha == $_comSenha){
            echo('senha comfirmada');
            include_once('conexao.php');

            if ($conexao->connect_error){
                die('a conexão falhou:' . $conexao->connect_error);
            }
            $sql = "INSERT INTO cadastros (senha,nome,email) VALUES (?,?,?)";

            $stmt = $conexao->prepare($sql);
            
            $stmt->bind_param("iss",$_senha,$_nome,$_email);

            $stmt->execute();



        }else{
            echo('senha não confere');
        }
    }
    else{
        echo('há campos não preenchidos');
    }
?>