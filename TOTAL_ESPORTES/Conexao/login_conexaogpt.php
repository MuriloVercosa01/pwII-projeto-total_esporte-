<?php
if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    print_r("<br>tá funcionando<br>");

    include_once("conexao.php");

    if ($conexao->connect_error) {
        die("Conexão falhou: " . $conexao->connect_error);
    }

    // Definindo as variáveis para o email e senha
    $_email = $_POST['email'];
    $_senha = $_POST['senha'];

    // Consulta SQL com placeholders para evitar SQL Injection
    $sql = "SELECT * FROM cadastros WHERE email = ? AND senha = ?";

    // Preparando a consulta
    $stmt = $conexao->prepare($sql);

    if ($stmt === false) {
        echo("Erro na preparação da consulta: " . $conexao->error);
        exit; // Caso haja erro, saia do script
    }

    // Vinculando os parâmetros
    $stmt->bind_param("ss", $_email, $_senha);

    // Executando a consulta
    $stmt->execute();

    // Obtendo o resultado
    $result = $stmt->get_result();

    if ($result === false) {
        die("Erro ao obter o resultado: " . $stmt->error);
    }

    // Verificando o número de resultados
    if (mysqli_num_rows($result) < 1) {
        echo ('<script>
                alert("dados inválidos");

                redirecionar("http://localhost/pwII-projeto-total_esporte-/TOTAL_ESPORTES/login.php");

                function redirecionar(url){
                    window.location.href = url;
                } 
            </script>');
    } else {
        echo 
            ('<script>
                alert("login realizado com sucesso");

                redirecionar("http://localhost/pwII-projeto-total_esporte-/TOTAL_ESPORTES/");

                function redirecionar(url){
                    window.location.href = url;
                } 
            </script>');
    }

    // Fechar a declaração e a conexão
    $stmt->close();
    $conexao->close();

} else {
    echo "<h1>Não está tudo certo aí, chefe!</h1>";
}
?>
