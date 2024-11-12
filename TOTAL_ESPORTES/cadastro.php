<!DOCTYPE html>
<html lang="pt-br">
<head>
    <script src="https://kit.fontawesome.com/449a3898b7.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilos/cadastro.css">
    <title>Cadastro</title>
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
    <main>
        <form class="cadastro" action="Conexao/cadastro_conexao.php" method="POST" >
            <br>
            <h1 id="titulo">Cadastro</h1>
            <br>
            <!--aqui começam os formulários-->
            <div class="form" id="primeiro"> 
                <label for="email" >E-mail</label>
                <input type="text" name="email" id="email" >
            </div>
            <div class="form"  >
                <label for="nome" >Nome</label>
                <input type="text" name="nome" id="nome" >
            </div>
            <div class="form" id="senha">
                <label for="senha" >Senha</label>
                <input type="password" name="senha" id="senha">
            </div>
            <div class="form" id="ultimo">
                <label for="csenha" >Confirme a senha</label>
                <input type="password" name="csenha" >
            </div>
            <button type="submit" name="submit" value="Enviar" >Cadastre-se</button>
            <p  id="possui_login">já possui conta? <a href="login.php" >Faça login</a></p>         
</form>
    </main>


    
</body>
</html>