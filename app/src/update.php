<?php

$id = $_GET['id'];
$tipo = $_GET['tipo'];
require("conexao.php");

// Atualiza um livro na tabela.
if ($tipo == "livro") {
    $titulo = $_POST['titulo'];
    $ano_de_publicacao = $_POST['ano_de_publicacao'];
    $id_categoria = trim($_POST['categoria']);
    $id_autor = trim($_POST['autor']);
    $descricao = $_POST['descricao'];

    $sql = "UPDATE livro SET
        titulo = '$titulo',
        ano_de_publicacao = '$ano_de_publicacao',
        categoria = '$id_categoria',
        autor = '$id_autor',
        descricao = '$descricao'
        WHERE id= $id";

    if ($conn->query($sql) === TRUE) {
        header("location:../../index.php"); 
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Atualiza um usuario na tabela.
if ($tipo == "usuario") {
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $telefone = $_POST['telefone'];
  $bairro = $_POST['bairro'];

  $sql = "UPDATE usuario SET
      nome = '$nome',
      email = '$email',
      telefone = '$telefone',
      bairro = '$bairro'
      WHERE id_usuario = $id"; 

  if ($conn->query($sql) === TRUE) {
      header("location:../../index.php"); 
  } else {
      echo "Error updating record: " . $conn->error;
  }
}
// Atualiza um autor na tabela
if ($tipo == "autor") {
    $nomeAutor = $_POST['nomeAutor'];
    $nacionalidade = $_POST['nacionalidade'];

    $sql = "UPDATE autor SET
        nome = '$nomeAutor',
        nacionalidade = '$nacionalidade'
        WHERE id_autor = $id"; 

    if ($conn->query($sql) === TRUE) {
        header("location:../../index.php"); 
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Atualiza uma categoria na tabela
if ($tipo == "categoria") {
    $genero = $_POST['genero'];

    $sql = "UPDATE categoria SET
        genero = '$genero'
        WHERE id_categoria = $id"; 

    if ($conn->query($sql) === TRUE) {
        header("location:../../index.php"); 
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>