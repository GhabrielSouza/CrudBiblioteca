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

//cria uma variavel para verificar se todos os dados estão preenchidos corretamente se nao tiver ele desativa o botao de envio
$disabled = isset($_GET['disabled']) ? $_GET['disabled'] : null;
$disabled = true;

//verifica o tipo de operação
if($tipo == "update"){
    echo '
<body class="container">
    <div class="container_form">
        <form action="src/update.php?tipo=livro&id='.$id.'" method="post" id="form_livro">

            <div class="div_titulo_livro">
                <label for="titulo">Titulo:</label><br>
                <input type="text" id="titulo" name="titulo" required>
            </div>

            <div class="div_ano_de_publicacao_livro">
                <label for="ano_de_publicacao">Ano de Publicação:</label><br>
                <input type="date" id="ano_de_publicacao" name="ano_de_publicacao" required>
            </div>

            <div class="div_descricao_livro">
                <label for="descricao">Descrição:</label><br>
                <textarea class="div_descricao_livro_textarea" id="descricao" name="descricao" rows="6"
                    placeholder="Digite a descrição do livro..."></textarea>
            </div>

            <label for="categoria_id">Selecione a categoria:</label>';

            // Conexão com o banco de dados
            require("src/conexao.php");

            $sql = "SELECT * FROM categoria";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<select name='categoria' class='categoria_id' id='categoria_id' required>";
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["id_categoria"] . "'>" . $row["genero"] . "</option>";
                }
                echo "</select>";
            } else {
                echo "<a href='./formCategoria.php'>Não existe categoria! favor criar</a>";
                $disabled = false;
            }

            echo '
            <label for="autor_id" class="autor_id_label">Selecione o autor:</label>';

            $sql = "SELECT * FROM autor";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<select name='autor' class='autor_id' id='autor_id' required>";
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["id_autor"] . "'>" . $row["nome"] . "</option>";
                }
                echo "</select>";
            } else {
                echo "<a href='./formAutor.php'>Não existe autor! favor criar</a>";
                $disabled = false;

            }

            if ($disabled){
                echo "<button type='submit'>Enviar</button>";
            }

            else{
                echo "<button type='submit' disabled>Enviar</button>";
            }

            $conn->close();

echo '

        </form>
    </div>
</body>
';
}

else{
    echo '
<body class="container">
    <div class="container_form">
        <form action="src/create.php?tipo=livro" method="post" id="form_livro">

            <div class="div_titulo_livro">
                <label for="titulo">Titulo:</label><br>
                <input type="text" id="titulo" name="titulo" required>
            </div>

            <div class="div_ano_de_publicacao_livro">
                <label for="ano_de_publicacao">Ano de Publicação:</label><br>
                <input type="date" id="ano_de_publicacao" name="ano_de_publicacao" required>
            </div>

            <div class="div_descricao_livro">
                <label for="descricao">Descrição:</label><br>
                <textarea class="div_descricao_livro_textarea" id="descricao" name="descricao" rows="6"
                    placeholder="Digite a descrição do livro..."></textarea>
            </div>

            <label for="categoria_id">Selecione a categoria:</label>';

            // Conexão com o banco de dados
            require("src/conexao.php");

            $sql = "SELECT * FROM categoria";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<select name='categoria' class='categoria_id' id='categoria_id' required>";
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["id_categoria"] . "'>" . $row["genero"] . "</option>";
                    
                }
                echo "</select>";
            } else {
                echo "<a href='./formCategoria.php'>Não existe categoria! favor criar</a>";
                $disabled = false;

            }

            echo '
            <label for="autor_id" class="autor_id_label">Selecione o autor:</label>';

            $sql = "SELECT * FROM autor";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<select name='autor' class='autor_id' id='autor_id' required>";
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["id_autor"] . "'>" . $row["nome"] . "</option>";
                }
                echo "</select>";
            } else {
                echo "<a href='./formAutor.php'>Não existe autor! favor criar</a>";
                $disabled = false;

            }

            $conn->close();


            if ($disabled){
                echo "<button type='submit'>Enviar</button>";
            }

            else{
                echo "<button type='submit' disabled>Enviar</button>";
            }
echo '
        </form>
    </div>
</body>
';
}

?>

</html>
