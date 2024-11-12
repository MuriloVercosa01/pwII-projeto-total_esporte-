<!DOCTYPE html>
<html lang="pt-br">
<head>
    <script src="https://kit.fontawesome.com/449a3898b7.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilos/Estilo.css">
    <link rel="stylesheet" href="Estilos/Slide.css">
    <script src="slide.js" defer></script>
    <title>Total Esporte</title>
</head>
<?php 
    //session_start(); 
    include("Conexao/conexao.php");
?>
<body>

    <header>

        <div class="container">
            <div class="logo"><img src="imagens/Logo.png"></div>
            <div class="menu">
                <nav>
                    <a href="#">home</a>
                    <a href="#">produtos</a>
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

    <form action="inserirCheck.php" method="post">  
        <main>
            <div>
                <label for="text"  >Teste inserir</label>
                <input type="text" name="teste" ></input>
            </div>
        </main>
    </form>

    
</body>
</html>