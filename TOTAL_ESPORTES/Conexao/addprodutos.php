<?php
    print_r($_REQUEST);
    if( !empty($_POST['img']) && !empty($_POST['modelo']) && !empty($_POST['categoria']) && !empty($_POST['desc_breve']) && !empty($_POST['valor']) ){
        // caso todos os dados tenham sido enviados
        $_img = $_POST['img'];
        $_modelo = $_POST['modelo'];
        $_categoria = $_POST['categoria'];
        $_desc = $_POST['desc_breve'];
        $_valor = $_POST['valor'];

        include_once('conexao.php');
        //se der pau na conexão =)
        if ($conexao->connect_error){
            die('a conexão falhou:' . $conexao->connect_error);
        }

        $sql = 'INSERT INTO produto (img,modelo,categoria,desc_breve,valor) VALUES (?,?,?,?,?)';

        $stmt = $conexao->prepare($sql);

        $stmt->bind_param("ssisd",$_img,$_modelo,$_categoria,$_desc,$_valor);

        $stmt->execute();
        //dados inseridos no banco de dados
        echo('<script>
                alert("produto cadastrado com sucesso");

                redirecionar("http://localhost/pwII-projeto-total_esporte-/TOTAL_ESPORTES/addprodutos.html");

                function redirecionar(url){
                    window.location.href = url;
                } 
            </script>');
    } else{
        //caso algum campo não tenha sido preenchido
        echo('há campos não preenchidos');
    }
?>