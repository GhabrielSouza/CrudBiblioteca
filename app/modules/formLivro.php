<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/formLivro.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Krona+One&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <title>Cadastro de livro</title>
</head>

<body class="container">
    <div class="container_form">
        <form action="../src/create.php?tipo=livro" method="post" id="form_livro">

            <div class="div_titulo_livro">
                <label for="titulo">Titulo:</label><br>
                <input type="titulo" id="titulo" name="titulo" require>
            </div>

            <div class="div_ano_de_publicacao_livro">
                <label for="ano_de_publicacao">Ano de Publicação:</label><br>
                <input type="date" id="ano_de_publicacao" name="ano_de_publicacao" require>
            </div>

            <div class="div_descricao_livro">
                <label for="descricao">Descrição:</label><br>
                <textarea class="div_descricao_livro_textarea" id="descricao" name="descricao" rows="6"
                    placeholder="Digite a descrição do livro..."></textarea>
            </div>

            <label for="categoria_id">Selecione a categoria:</label>

            <?php
            require("../src/conexao.php");

            $sql = "SELECT * FROM categoria";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<select name='categoria' class='categoria_id' id='categoria_id' require>";
                while ($row = $result->fetch_assoc()) {
                    echo "  <option value=" . $row["id_categoria"] . ">" . $row["genero"] . "</option>";
                }
                echo "</select>";
            } else {
                echo "<a href='./formCategoria.html'>Não existe categoria! favor criar</a>";
            }
            ?>


            <label for="autor_id" class="autor_id_label">Selecione o autor:</label>
            <?php

            $sql = "SELECT * FROM autor";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<select name='autor' class='autor_id' id='autor_id' require>";
                while ($row = $result->fetch_assoc()) {
                    echo "<option value=" . $row["id_autor"] . ">" . $row["nome"] . "</option>";
                }
                echo "</select>";
            } else {
                echo "<a href='./formAutor.html'>Não existe categoria! favor criar</a>";
            }

            $conn->close();
            ?>

            <button type="submit">Enviar</button>

        </form>
    </div>
</body>

</html>