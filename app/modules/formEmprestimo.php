<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Krona+One&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="../styles/styleEmprestimo.css" />
  <title>FormEmprestimo</title>
</head>

<body>
  <div>
    <?php

    // //pega os dados tipo,id,id_livro,titulo,id_usuarioe nome se existirem na url para serem usados 
    $tipo = isset($_GET['tipo']) ? $_GET['tipo'] : null;
    $id = isset($_GET['id_emprestimo']) ? $_GET['id_emprestimo'] : null;

    $id_livro = isset($_GET['id_livro']) ? $_GET['id_livro'] : null;
    $titulo = isset($_GET['titulo']) ? $_GET['titulo'] : null;

    $id_usuario = isset($_GET['id_usuario']) ? $_GET['id_usuario'] : null;
    $nome = isset($_GET['nome']) ? $_GET['nome'] : null;

    //verifica se um erro foi passado pela url
    $erro = isset($_GET['erro']) ? $_GET['erro'] : null;


    //se houver mostra na tela de acordo com o tipo do erro
    if ($erro == "duplicidade") {
      echo "<script>alert('Ja existe este item');</script>";

    }

    if ($erro == "padrao") {
      echo "<script>alert('ocorreu um erro, tente novamente.');</script>";

    }


    //verifica o tipo de operação
    //Essa verificação acontece de acordo  com a interação com o usuário, dependendo do que o usuário for fazer 
    //é carregado um formulário específico
    
    if ($tipo == "update") {
      echo '
      <form action="src/update.php?tipo=emprestimo&id=' . $id . '" method="post">
  
        <label for="categoria_id">Selecione o usuario:</label>
      ';

      require("src/conexao.php");

      //Busca os dados e insere no select/option
      $sql = "SELECT * FROM usuario";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        echo "<select name='id_usuario' class='id_usuario' id='id_usuario' require disabled>";
        while ($row = $result->fetch_assoc()) {
          echo "  <option value=" . $id_usuario . ">" . $nome . "</option>";
        }
        echo "</select>";
      } else {
        echo "<a href='./formUsuario.php'>Não existe usuario cadastrado! favor criar</a>";
      }


      echo '
        <label for="autor_id" class="autor_id_label">Selecione o livro:</label>
        ';

      $sql = "SELECT * FROM livro";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        echo "<select name='id_livro' class='id_livro' id='id_livro' require disabled>";
        while ($row = $result->fetch_assoc()) {
          echo "<option value=" . $id_livro . ">" . $titulo . "</option>";
        }
        echo "</select>";
      } else {
        echo "<a href='./formLivro.html'>Não existe livro cadastrado! favor criar</a>";
      }

      $conn->close();


      echo '
        <div class="div_data_emprestimo">
          <label for="data_emprestimo">Data de Empréstimo:</label>
          <input type="date" id="data_emprestimo" name="data_emprestimo" required />
        </div>
  
        <div class="div_data_devolucao">
          <label for="data_devolucao">Data de Devolução:</label>
          <input type="date" id="data_devolucao" name="data_devolucao" required />
        </div>
  
        <div class="div_botao_emprestimo">
          <button type="submit">Enviar</button>
        </div>
      </form>';
    }

    if ($tipo == "createIndex") {
      echo '
      <form action="src/create.php?tipo=emprestimo" method="post">
  
        <label for="categoria_id">Selecione o usuario:</label>
      ';

      require("src/conexao.php");

      $sql = "SELECT * FROM usuario";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        echo "<select name='id_usuario' class='id_usuario' id='id_usuario' require >";
        while ($row = $result->fetch_assoc()) {
          echo "  <option value=" . $row["id_usuario"] . ">" . $row["nome"] . "</option>";
        }
        echo "</select>";
      } else {
        echo "<a href='./formUsuario.php'>Não existe usuario cadastrado! favor criar</a>";
      }


      echo '
        <label for="autor_id" class="autor_id_label">Selecione o livro:</label>
        ';

      $sql = "SELECT * FROM livro";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        echo "<select name='id_livro' class='id_livro' id='id_livro' require >";
        while ($row = $result->fetch_assoc()) {
          if ($row["id_livro"] == $id_livro) {
            echo "<option value=" . $row["id_livro"] . " selected>" . $row["titulo"] . "</option> ";
          } else {
            echo "<option value=" . $row["id_livro"] . ">" . $row["titulo"] . "</option>";
          }

        }
        echo "</select>";
      } else {
        echo "<a href='./formLivro.php'>Não existe livro cadastrado! favor criar</a>";
      }

      $conn->close();


      echo '
        <div class="div_data_emprestimo">
          <label for="data_emprestimo">Data de Empréstimo:</label>
          <input type="date" id="data_emprestimo" name="data_emprestimo" required />
        </div>
  
        <div class="div_data_devolucao">
          <label for="data_devolucao">Data de Devolução:</label>
          <input type="date" id="data_devolucao" name="data_devolucao" required />
        </div>
  
        <div class="div_botao_emprestimo">
          <button type="submit">Enviar</button>
        </div>
      </form>';
    }

    if ($tipo == "create") {

      echo '
    <form action="src/create.php?tipo=emprestimo" method="post">

      <label for="categoria_id">Selecione o usuario:</label>
    ';

      require("src/conexao.php");

      $sql = "SELECT * FROM usuario";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        echo "<select name='id_usuario' class='id_usuario' id='id_usuario' require>";
        while ($row = $result->fetch_assoc()) {
          echo "  <option value=" . $row["id_usuario"] . ">" . $row["nome"] . "</option>";
        }
        echo "</select>";
      } else {
        echo "<a href='./formUsuario.php'>Não existe usuario cadastrado! favor criar</a>";
      }


      echo '
      <label for="autor_id" class="autor_id_label">Selecione o livro:</label>
      ';

      $sql = "SELECT * FROM livro";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        echo "<select name='id_livro' class='id_livro' id='id_livro' require>";
        while ($row = $result->fetch_assoc()) {
          echo "<option value=" . $row["id_livro"] . ">" . $row["titulo"] . "</option>";
        }
        echo "</select>";
      } else {
        echo "<a href='./formLivro.php'>Não existe livro cadastrado! favor criar</a>";
      }

      $conn->close();


      echo '
      <div class="div_data_emprestimo">
        <label for="data_emprestimo">Data de Empréstimo:</label>
        <input type="date" id="data_emprestimo" name="data_emprestimo" required />
      </div>

      <div class="div_data_devolucao">
        <label for="data_devolucao">Data de Devolução:</label>
        <input type="date" id="data_devolucao" name="data_devolucao" required />
      </div>

      <div class="div_botao_emprestimo">
        <button type="submit">Enviar</button>
      </div>
    </form>';
    }
    ?>
  </div>
</body>

</html>