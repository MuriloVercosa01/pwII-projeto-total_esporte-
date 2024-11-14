<!DOCTYPE html>
<html lang="pt-br">
<head>
    <script src="https://kit.fontawesome.com/449a3898b7.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilos/login.css">
    <title>Cadastro</title>
</head>
<body>

    <header>

        <div class="container">
            <div class="logo"><img src="imagens/Logo.png"></div>
            <div class="menu">
                <nav>
                    <a href="#">Home</a>
                    <a href="#">Produtos</a>
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
    <main>
        <form class="cadastro" action="Conexao/login_conexao.php" method="POST" >
            <br>
            <h1 id="titulo">Login</h1>
            <br>
            <!--aqui começam os formulários-->
            <div class="form" id="primeiro"> 
               
            </div>
            <div class="form">
                <label for="email" >E-mail</label>
                <input type="text" name="email" id="email" >
            </div>
            <div class="form">
                <label for="senha" >Senha</label>
                <input type="password" name="senha" id="senha" >   
            </div>
            <button type="submit" class="btn_login" value="Enviar" name="submit" > Entrar </button>
            <p id="redc_cadastro">Ainda não possui cadastro? <a href="cadastro.php" >Cadastre-se</a></p>  
</form>
    </main>


    
</body>
</html>