<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/449a3898b7.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilos/addprodutos.css">
    <title>Adicionar Produtos</title>
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

                </nav>
    
            </div> type='text'
            <div class="btn-menu">
                
                <button><i class="fa-solid fa-user-plus"></i> <Br> <a href="cadastro.php">  Cadastre-se  </a>  </button>
                <button><i class="fa-solid fa-right-to-bracket"></i> <Br> <a href="login.php">  Entrar  </a>  </button>
    
            </div>
        </div>
        
    
    </header>

    <main>
        <form class="formulario" method="POST" action="Conexao/cadastrarProdutos.php">
            <h1 id="titulo">Adicionar Produto</h1>
            <h2 id="subtitulo" >Preencha o formulário</h2>
            <div  class="form">
                <label for="img">Imagem do produto (url)</label>
                <input name="img" type='text' class="input" id="img" oninput="alterarPreview( 'img' , 'preview_img' )" >
            </div>
            <div  class="form">
                <label for="modelo">Modelo do produto</label>
                <input name="modelo" type='text' class="input" id="modelo" oninput="alterarPreview( 'modelo' , 'preview_modelo' )">
            </div>
            <div  class="form">
                <label for="categoria">categoria</label>
                <select name="categoria"  class="input" id="categoria" oninput="alterarPreview( 'categoria' , 'preview_categoria' )" >
                  <?php
                    include("Conexao/conexao.php");

                    $sql = "SELECT * FROM `categoria`;";

                    $result = $conexao->query($sql);

                    if ($result->num_rows > 0){
                      while($row  = $result->fetch_assoc()){
                        echo "<option value='" . $row['id_categoria'] .  "'>" . $row['nome_categoria'] . "</option>";
                      }
                    }else{
                      echo "nenhuma categoria encontrada";
                    }

                  ?>
                </select>
            </div>
            <div  class="form">
              <label for="subcategoria">subcategoria</label>
              <select name="subcategoria"  class="input" id="subcategoria" oninput="alterarPreview( 'subcategoria' , 'preview_subcategoria' )" >
              <?php
                    include("Conexao/conexao.php");

                    $sql = "SELECT categoria.nome_categoria, sub_categoria.s_categoria, id_sub_categoria  FROM sub_categoria JOIN categoria ON sub_categoria.id_categoria = categoria.id_categoria;";

                    $result = $conexao->query($sql);

                    if ($result->num_rows > 0){
                      while($srow  = $result->fetch_assoc()){
                        echo "<option value='" . $srow['id_sub_categoria'] . "'>" . $srow['nome_categoria'] . " - " . $srow['s_categoria'] . "</option>";
                      }
                    }else{
                      echo "<option>" . $result->error . "nenhuma subcategoria encontrada</option>";
                    }

                  ?>
              </select>
          </div>
            <div  class="form">
                <label for="desc_breve">breve descrição do produto</label>
                <input name="desc_breve" type='text' class="input" id="desc" oninput="alterarPreview( 'desc' , 'preview_desc' )">
            </div>
            <div  class="form">
                <label for="valor">valor do produto</label>
                <input name="valor" type='text' class="input" id="valor"oninput="alterarPreview( 'valor' , 'preview_valor' )">
            </div>
            <div class="form" >
                <button type="submit" >Adicionar</button>
            </div>
        </form>

        <div class="preview" >
            <img src="img/placeholder.jpg"  id="preview_img" >
            <h3 id="preview_modelo" >nome do modelo</h3>
            <p id="preview_subcategoria" >categoria - subcategoria</p>
            <p id="preview_desc" >descrição breve teste teste teste teste teste teste</p>
            <h3>valor $ <style> h3{display: inline-block;} </style><h3 id="preview_valor" >000,00</h3></h3>
        </div>
    </main>

    <footer>
        <!-- Container principal -->
        <div id="conteudo-rodape">
          <!-- Contatos e redes sociais -->
          <div id="contatos-rodape">
            <img src="imagens/Logo.png" alt="Logo Total Esporte">
            <p>Nossas redes sociais</p>
            <div id="redes-sociais-rodape">
              <a href="#" class="footer-link" id="instagram">
                <i class="fa-brands fa-instagram"></i>
              </a>
              <a href="#" class="footer-link" id="facebook">
                <i class="fa-brands fa-facebook-f"></i>
              </a>
              <a href="#" class="footer-link" id="whatsapp">
                <i class="fa-brands fa-whatsapp"></i>
              </a>
            </div>
          </div>
      
          <!-- Listas de serviços e produtos -->
          <ul class="lista-rodape">
            <li><h3>Serviços</h3></li>
            <li><p>Entrega grátis a partir de R$ 200,00</p></li>
            <li><p>30 dias para trocas e devoluções</p></li>
            <li><p>Atendimento online 24 horas</p></li>
          </ul>
          <ul class="lista-rodape">
            <li><h3>Produtos</h3></li>
            <li><p>Chuteira Futsal</p></li>
            <li><p>Chuteira Society</p></li>
            <li><p>Chuteira Campo</p></li>
          </ul>
      
          <!-- Suporte online -->
          <div id="suporte-rodape">
            <h3>Suporte Online</h3>
            <p>
              A Total Esporte oferece suporte online pelo e-mail suporte@totalesporte.com.
              Nossa equipe está pronta para ajudá-lo!
            </p>
            <div id="email-suporte">
              <a>
                <i class="fa-regular fa-envelope"></i>
              </a>
              <h1>suporte@totalesporte.com</h1>
            </div>
          </div>
        </div>
      
        <!-- Direitos autorais -->
        <div id="direitos-autorais-rodape">
          &#169; 2024 Total Esporte
        </div>
    </footer>

    <script src="JS/addprodutos.js" ></script>
</body>
</html>