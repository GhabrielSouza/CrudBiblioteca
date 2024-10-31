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
    <form action="../src/create.php?tipo=emprestimo" method="post">

      <label for="categoria_id">Selecione o usuario:</label>

      <?php
      require("../src/conexao.php");

      $sql = "SELECT * FROM usuario";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        echo "<select name='usuario' class='usuario_id' id='usuario_id' require>";
        while ($row = $result->fetch_assoc()) {
          echo "  <option value=" . $row["id_usuario"] . ">" . $row["nome"] . "</option>";
        }
        echo "</select>";
      } else {
        echo "<a href='./formUsuario.html'>Não existe usuario cadastrado! favor criar</a>";
      }
      ?>


      <label for="autor_id" class="autor_id_label">Selecione o livro:</label>
      <?php

      $sql = "SELECT * FROM livro";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        echo "<select name='livro' class='livro_id' id='livro_id' require>";
        while ($row = $result->fetch_assoc()) {
          echo "<option value=" . $row["id_livro"] . ">" . $row["titulo"] . "</option>";
        }
        echo "</select>";
      } else {
        echo "<a href='./formLivro.html'>Não existe livro cadastrado! favor criar</a>";
      }

      $conn->close();
      ?>

      <div class="div_valor">
        <label for="valor">Valor do Empréstimo:</label>
        <input type="number" id="valor" name="valor" required placeholder="Digite o valor" />
      </div>

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
    </form>
  </div>
</body>

</html>