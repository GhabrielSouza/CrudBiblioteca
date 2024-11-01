<?php
echo "hello";
require("conexao.php");

$tipo = $_GET['tipo'];
$id = $_GET['id'];

//cria um livro na tabela.
//if ($tipo == "livro") {

  // sql to delete a record
  $sql = "DELETE FROM $tipo WHERE id_".$tipo."=$id";

  if ($conn->query($sql) === TRUE) {
    header("location:../../index.php");
  } else {
    echo "Error deleting record: " . $conn->error;
  }
//}

$conn->close();
?>