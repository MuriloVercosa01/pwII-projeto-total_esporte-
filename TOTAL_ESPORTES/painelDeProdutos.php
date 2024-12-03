<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/449a3898b7.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel De Controle</title>
    <link rel="stylesheet" href="Estilos/painelDeProdutos.css">
</head>
<body>
    <header>

        <div class="container">
            <div class="logo"><img src="imagens/Logo.png"></div>
            <div class="menu">
                <nav>
                    <a href="Home.php">home</a>
                    <a href="produtos.php">produtos</a>
                    <a href="#">sobre</a>
                    <a href="#">contatos</a>
                </nav>

            </div>
            <div class="btn-menu">
                
                <button><i class="fa-solid fa-user-plus"></i> <Br> <a href="cadastro.php">  Cadastre-se  </a>  </button>
                <button><i class="fa-solid fa-right-to-bracket"></i> <Br> <a href="login.php">  Entrar  </a>  </button>

            </div>
        </div>
        

    </header>
    <main>
        <h1>Painel de gerenciamento</h1>

        <div class="adiconar" >
            <h2>adicionar</h2>
            <button href="addprodutos.html" >Adicionar produto</button>
            <button href="" >Adiconar categoria/subcategoria</button>
        </div>
        <div class="painel" >
            <h1>gerenciamento de categorias,sub-categorias e produtos cadastrados</h1>
            <div class="container-lista" > <!-- listagem de categorias -->
                <table> <h3>Categorias</h3>
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Categoria</th>
                            <th>Editar</th>
                            <th>Deletar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('Conexao/conexao.php');

                        $sql = "SELECT id_categoria, nome_categoria from categoria;";

                        $result = $conexao->query($sql);
                        
                        //verifica se está tudo certo com a conexão
                        if ($conexao->connect_error) {
                            die("Conexão falhou: " . $conexao->connect_error);
                        }
                        
                        if ($result->num_rows > 0){
                        //caso haja resultados
                            while($row = $result->fetch_assoc()){
                                echo "<tr>";

                                echo "<td>" . $row['id_categoria'] . "</td><td>" . $row['nome_categoria'] . "</td><td><button class='edit-btn'>Editar</button></td><td><button class='delete-btn'>Deletar</button></td>" ; 

                                echo "</tr>";
                            }
                        }else{
                        //caso não haja resultados
                            echo ('sem resultados');
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="container-lista" > <!-- listagem de sub-categorias -->
                <table> <h3>Sub-Categorias</h3>
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>categoria</th>
                            <th>sub-Categoria</th>
                            <th>Editar</th>
                            <th>Deletar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('Conexao/conexao.php');

                        $sql = "SELECT id_sub_categoria,sub_categoria.s_categoria, categoria.nome_categoria FROM sub_categoria JOIN categoria ON sub_categoria.id_categoria = categoria.id_categoria;";

                        $result = $conexao->query($sql);
                        
                        //verifica se está tudo certo com a conexão
                        if ($conexao->connect_error) {
                            die("Conexão falhou: " . $conexao->connect_error);
                        }
                        
                        if ($result->num_rows > 0){
                        //caso haja resultados
                            while($row = $result->fetch_assoc()){
                                echo "<tr>";

                                echo "<td>" . $row['id_sub_categoria'] . "</td><td>" . $row['nome_categoria'] . "</td><td>" . $row['s_categoria'] . "</td><td><button class='edit-btn'>Editar</button></td><td><button class='delete-btn'>Deletar</button></td>" ; 

                                echo "</tr>";
                            }
                        }else{
                        //caso não haja resultados
                            echo ('sem resultados');
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="container-lista" >  <!-- listagem de produtos cadastrados -->
                <table> <h3>produtos</h3>
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Modelo</th>
                            <th>Categoria</th>
                            <th>subcategoria</th>
                            <th>Editar</th>
                            <th>Deletar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('Conexao/conexao.php');

                        $sql = "SELECT produto.id_produto,categoria.nome_categoria ,sub_categoria.s_categoria,produto.modelo FROM produto INNER JOIN sub_categoria ON produto.id_categoria = sub_categoria.id_sub_categoria INNER JOIN categoria ON produto.id_categoria = categoria.id_categoria;";

                        $result = $conexao->query($sql);
                        
                        //verifica se está tudo certo com a conexão
                        if ($conexao->connect_error) {
                            die("Conexão falhou: " . $conexao->connect_error);
                        }
                        
                        if ($result->num_rows > 0){
                        //caso haja resultados
                            while($row = $result->fetch_assoc()){
                                echo "<tr>";

                                echo "<td>" . $row['id_produto'] . "</td><td>" . $row['nome_categoria'] . "</td><td>" . $row['s_categoria'] . "</td><td>" . $row['modelo'] . "</td><td><button class='edit-btn'>Editar</button></td><td><button class='delete-btn'>Deletar</button></td>" ; 

                                echo "</tr>";
                            }
                        }else{
                        //caso não haja resultados
                            echo ('sem resultados');
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>
</html>