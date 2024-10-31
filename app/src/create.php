<?php
require("../src/conexao.php");

$tipo = $_GET['tipo'];

//cria um livro na tabela.

if ($tipo == "livro") {

    $titulo = $_POST['titulo'];
    $ano_de_publicacao = $_POST['ano_de_publicacao'];
    $id_categoria = trim($_POST['categoria']);
    $id_autor = trim($_POST['autor']);
    $descricao = $_POST['descricao'];

    //insere os dados
    $sql = "INSERT INTO livro (titulo, ano_publicacao,  descricao, id_autor, id_categoria)
  VALUES ('$titulo', '$ano_de_publicacao' , '$descricao' , '$id_autor', '$id_categoria');";

    if ($conn->query($sql) === TRUE) {
        header("location:../../index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}

//cria um usuario na tabela.
if ($tipo == "usuario") {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $bairro = $_POST['bairro'];



    $sql = "INSERT INTO usuario (nome, email, telefone, bairro)
  VALUES ('$nome', '$email', '$telefone', '$bairro')";

    if ($conn->query($sql) === TRUE) {
        echo "New records created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

//cria uma categoria na tabela.
if ($tipo == "autor") {

    $autor = $_POST['nomeAutor'];
    $nacionalidade = $_POST['nacionalidade'];


    $sql = "INSERT INTO autor (nome, nacionalidade)
  VALUES ('$autor', '$nacionalidade')";

    if ($conn->query($sql) === TRUE) {
        echo "New records created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

//cria uma categoria na tabela.
if ($tipo == "categoria") {

    $descricao = $_POST['descricao'];


    $sql = "INSERT INTO categoria (genero)
  VALUES ('$descricao')";

    if ($conn->query($sql) === TRUE) {
        header("location:../modules/formLivro.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

//cria um emprestimo na tabela.
if ($tipo == "emprestimo") {
    //id;livro_id;usuario_id;data_emprestimo;data_devolucao;valor
    $livro = $_POST['livro'];
    $usuario = $_POST['usuario'];
    $data_emprestimo = $_POST['data_emprestimo'];
    $data_devolucao = $_POST['data_devolucao'];
    $valor = $_POST['valor'];


    //pesquisa o id do usuario escolhida;
    $sql = "SELECT id_usuarios FROM usuarios where nome = '$usuario'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $id_usuarios = $row["id_usuarios"];

    //pesquisa o id do livro escolhida;
    $sql = "SELECT id_livros FROM livros where nome = '$livro'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $id_livros = $row["id_livros"];


    //insere os dados na tabela emprestimo
    $sql = "INSERT INTO emprestimo (livro_id, usuario_id, data_emprestimo, data_devolucao, valor)
    VALUES ('$id_livros', '$id_usuarios', '$data_emprestimo', '$data_devolucao', '$valor')";


    if ($conn->query($sql) === TRUE) {
        echo "New records created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>