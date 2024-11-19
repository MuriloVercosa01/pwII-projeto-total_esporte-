<!DOCTYPE html>
<html lang="pt-br">
<head>
    <script src="https://kit.fontawesome.com/449a3898b7.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>produtos</title>
    <link  rel="stylesheet" href="Estilos/produtos.css" >
</head>
<body>
    <header>

        <div class="container">
            <div class="logo"><img src="imagens/Logo.png"></div>
            <div class="menu">
                <nav>
                    <a href="Home.html">Home</a>
                    <a href="produtos.php">Produtos</a>
                    <a href="#">Sobre</a>
                    <a href="#">Contatos</a>
                </nav>

            </div>
            <div class="btn-menu">
                
                <button><i class="fa-solid fa-user-plus"></i> <Br> <a href="cadastro.php">  Cadastre-se  </a>  </button>
                <button><i class="fa-solid fa-right-to-bracket"></i> <Br> <a href="login.php">  Entrar  </a>  </button>

            </div>
        </div>
        

    </header>
    <div class="nav-bar" >
        <div class="divMenuPesquisa" >
            <input type="text" id="pesquisa" placeholder="Buscar.." >
            <img src="https://cdn-icons-png.flaticon.com/512/3183/3183361.png" >
        </div>
    </div>
    <section><h1 class="destaque" >Produtos em destaque</h1></section>
    <main>
        <div class="sidebar" >
            <div class="lista" >
                <h1>Chuteiras</h1>
                <ul>
                    <li><h2>Society</h2></li>
                    <li><h2>Campo</h2></li>
                    <li><h2>Quadra</h2></li>
                    <li><h2>Colecionaveis</h2></li>
                </ul>
            </div>
        </div>
        <div class="card-box" >
        <?php
            include('Conexao/conexao.php');
            if ($conexao->connect_error) {
                die("Conexão falhou: " . $conexao->connect_error);
            }
            $sql= "SELECT 	produto.img,produto.modelo,categoria.categoria_prod,produto.desc_breve,produto.valor FROM produto JOIN categoria ON produto.categoria = categoria.id_cate;";

            $result = $conexao->query($sql);

            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo ("
                        <div class='card' >
                            <img src='{$row['img']}'>
                            <h3>{$row['modelo']}</h3>
                            <p>{$row['categoria_prod']}</p>
                            <p>{$row['desc_breve']}</p>
                            <h3>{$row['valor']}</h3>
                        </div>
                    ");
                }
            }else{
                echo('nenhum produto encontrado');
            }
        ?>
            <div class="card" ><img src="img/placeholder.jpg" ><h3>nome do modelo</h3><p>categoria</p><p>descrição breve teste teste teste teste teste teste</p><h3>valor $000,00</h3></div>
        </div>
    </main>
</body>
</html>