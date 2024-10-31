<?php
require("conexao.php");

$tipo = $_GET['tipo'];

//cria um livro na tabela.

if (tipo == "livro") {

  $titulo = $_POST['titulo'];
  $titulo = $_POST['ano_de_publicacao'];
  $categoria = $_POST['categoria'];


  $sql = "INSERT INTO MyGuests (firstname, lastname, email)
  VALUES ('John', 'Doe', 'john@example.com');";

  if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

}

//cria um usuario na tabela.
if (tipo == "usuario") {

  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $telefone = $_POST['telefone'];
  $bairro = $_POST['bairro'];



  $sql = "INSERT INTO MyGuests (firstname, lastname, email)
  VALUES ('John', 'Doe', 'john@example.com');";

  if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

//cria uma categoria na tabela.
if (tipo == "categoria") {

  $descricao = $_POST['descricao'];


  $sql = "INSERT INTO MyGuests (firstname, lastname, email)
  VALUES ('John', 'Doe', 'john@example.com');";

  if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

//cria um emprestimo na tabela.
if (tipo == "emprestimo") {
  $sql = "INSERT INTO MyGuests (firstname, lastname, email)
  VALUES ('John', 'Doe', 'john@example.com');";

  if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>