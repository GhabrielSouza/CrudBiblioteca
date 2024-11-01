<?php
require("../../../src/conexao.php");

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
        header("location:../../../index.php");
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
        header("location:../../../index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

//cria uma autor na tabela.
if ($tipo == "autor") {

    $autor = $_POST['nomeAutor'];
    $nacionalidade = $_POST['nacionalidade'];


    $sql = "INSERT INTO autor (nome, nacionalidade)
  VALUES ('$autor', '$nacionalidade')";

    if ($conn->query($sql) === TRUE) {
        header("location:../../../modules/formLivro.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

//cria uma categoria na tabela.
if ($tipo == "categoria") {

    $genero = $_POST['genero'];


    $sql = "INSERT INTO categoria (genero)
  VALUES ('$genero')";

    if ($conn->query($sql) === TRUE) {
        header("location:../../../modules/formLivro.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

//cria um emprestimo na tabela.
if ($tipo == "emprestimo") {
    //id;livro_id;usuario_id;data_emprestimo;data_devolucao;valor
    $id_usuarios = $_POST["id_usuario"];
    $id_livros = $_POST["id_livro"];
    $data_emprestimo = $_POST['data_emprestimo'];
    $data_devolucao = $_POST['data_devolucao'];
    


    //insere os dados na tabela emprestimo
    $sql = "INSERT INTO emprestimo (id_livro, id_usuario, data_emprestimo, data_devolucao)
    VALUES ('$id_livros', '$id_usuarios', '$data_emprestimo', '$data_devolucao')";


    if ($conn->query($sql) === TRUE) {
        header("location:../../../index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>