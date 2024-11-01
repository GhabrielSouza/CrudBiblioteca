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
    <link rel="stylesheet" href="../styles/styleAutor.css" />
    <title>FormAutor</title>
</head>

<body>
    <?php
    $tipo = isset($_GET['tipo']) ? $_GET['tipo'] : null; 
    $id = isset($_GET['id']) ? $_GET['id'] : null; 

    if($tipo == "update"){
      echo '
      <form action="src/update.php?tipo=autor&id='.$id.'" method="post">
          <div class="div_nome">
              <label for="nome">Nome do autor:</label>
              <input
                  type="text"
                  id="nomeAutor"
                  name="nomeAutor"
                  placeholder="Insira o nome completo do autor..."
              />
          </div>
  
          <div class="div_nacionalidade">
              <label for="nacionalidade">Nacionalidade do autor:</label>
              <input type="text" id="nacionalidade" name="nacionalidade" />
          </div>
  
          <div class="div_botao_autor">
              <button type="submit">Enviar</button>
          </div>
      </form>
      ';

    }

    else{
      echo '
      <form action="src/create.php?tipo=autor" method="post">
          <div class="div_nome">
              <label for="nome">Nome do autor:</label>
              <input
                  type="text"
                  id="nomeAutor"
                  name="nomeAutor"
                  placeholder="Insira o nome completo do autor..."
              />
          </div>
  
          <div class="div_nacionalidade">
              <label for="nacionalidade">Nacionalidade do autor:</label>
              <input type="text" id="nacionalidade" name="nacionalidade" />
          </div>
  
          <div class="div_botao_autor">
              <button type="submit">Enviar</button>
          </div>
      </form>
      ';
    }
   
    ?>
</body>
</html>
