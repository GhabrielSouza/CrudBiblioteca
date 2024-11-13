<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Krona+One&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../styles/styleUsuario.css" />
    <title>FormUsuario</title>
</head>

<body>
    <?php
     //pega os dados tipo e id se existirem na url para serem usados 
    $tipo = isset($_GET['tipo']) ? $_GET['tipo'] : null; 
    $id = isset($_GET['id']) ? $_GET['id'] : null; 

    //verifica se um erro foi passado pela url
    $erro = isset($_GET['erro']) ? $_GET['erro'] : null; 

    //se houver mostra na tela de acordo com o tipo do erro
    if($erro == "duplicidade"){
        echo "<script>alert('Ja existe este item');</script>";

    }

    if($erro == "padrao"){
        echo "<script>alert('ocorreu um erro, tente novamente.');</script>";

    }


    //verifica o tipo de operação
    if($tipo == "update"){
      echo '
    <form action="src/update.php?tipo=usuario&id='.$id.'" method="post">
        <div class="div_nome_usuario">
            <label for="nome">Nome:</label>
            <input
                type="text"
                id="nome"
                name="nome"
                placeholder="Insira seu nome completo."
            />
        </div>

        <div class="div_email">
            <label for="email">Email:</label>
            <input
                type="email"
                id="email"
                name="email"
                placeholder="seuEmail@gmail.com"
            />
        </div>

        <div class="div_telefone">
            <label for="telefone">Telefone:</label>
            <input
                type="telefone"
                id="telefone"
                name="telefone"
                placeholder="Seu telefone"
            />
        </div>

        <div class="div_bairro">
            <label for="bairro">Bairro:</label>
            <input
                type="bairro"
                id="bairro"
                name="bairro"
                placeholder="Seu bairro"
            />
        </div>

        <div class="div_botao_usuario">
            <button type="submit">Enviar</button>
        </div>
    </form>
    ';
    }else{

   
    echo '
    <form action="src/create.php?tipo=usuario" method="post">
        <div class="div_nome_usuario">
            <label for="nome">Nome:</label>
            <input
                type="text"
                id="nome"
                name="nome"
                placeholder="Insira seu nome completo."
            />
        </div>

        <div class="div_email">
            <label for="email">Email:</label>
            <input
                type="email"
                id="email"
                name="email"
                placeholder="seuEmail@gmail.com"
            />
        </div>

        <div class="div_telefone">
            <label for="telefone">Telefone:</label>
            <input
                type="telefone"
                id="telefone"
                name="telefone"
                placeholder="Seu telefone"
            />
        </div>

        <div class="div_bairro">
            <label for="bairro">Bairro:</label>
            <input
                type="bairro"
                id="bairro"
                name="bairro"
                placeholder="Seu bairro"
            />
        </div>

        <div class="div_botao_usuario">
            <button type="submit">Enviar</button>
        </div>
    </form>
    ';
  }
    ?>
</body>
</html>
