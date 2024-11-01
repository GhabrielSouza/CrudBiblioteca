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
    <link rel="stylesheet" href="../styles/styleCategoria.css" />
    <title>FormCategoria</title>
</head>
<body>

    <?php
    $tipo = isset($_GET['tipo']) ? $_GET['tipo'] : null; 
    $id = isset($_GET['id']) ? $_GET['id'] : null; 

    if($tipo == "update"){
      echo '
      <form action="src/update.php?tipo=categoria&id='.$id.'" method="post">
          <div class="div_descricao_categoria">
              <label for="descricao">Categoria:</label>
              <input
                  type="text"
                  id="descricao"
                  name="genero"
                  required
                  placeholder="Digite a descrição do livro..."
              />
          </div>
  
          <div class="div_botao_categoria">
              <button type="submit">Enviar</button>
          </div>
      </form>
      ';
    }

    else{
      echo '
      <form action="src/create.php?tipo=categoria" method="post">
          <div class="div_descricao_categoria">
              <label for="descricao">Categoria:</label>
              <input
                  type="text"
                  id="descricao"
                  name="genero"
                  required
                  placeholder="Digite a descrição do livro..."
              />
          </div>
  
          <div class="div_botao_categoria">
              <button type="submit">Enviar</button>
          </div>
      </form>
      ';
    }
    
    ?>
</body>
</html>