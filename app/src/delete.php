<?php
require("conexao.php");

$tipo = $_GET['tipo'];
$id = $_GET['id'];

//cria um livro na tabela.

if ($tipo == "livro") {

  // sql to delete a record
  $sql = "DELETE FROM livro WHERE id_livro=$id";

  if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $conn->error;
  }
}

$conn->close();
?>