<?php

require("conexao.php");

$tipo = $_GET['tipo'];
$id = $_GET['id'];

//cria um livro na tabela.
//if ($tipo == "livro") {
try{

  // sql to delete a record
  if($tipo == "emprestimo"){
    $sql = "DELETE FROM $tipo WHERE id=$id";
  }

  else{
    $sql = "DELETE FROM $tipo WHERE id_".$tipo."=$id";
  }

  if ($conn->query($sql) === TRUE) {
    header("location:../../index.php");
  } else {
    echo "Error deleting record: " . $conn->error;
  }
}

catch (mysqli_sql_exception $e) {
  // Verifica se o erro é devido a uma restrição de chave estrangeira
  if (strpos($e->getMessage(), 'a foreign key constraint fails') !== false) {
      echo "Não é possível excluir o autor pois ele está associado a um livro.";
  } else {
      // Trata outros erros SQL
      echo "Erro ao tentar excluir o autor: " . $e->getMessage();
  }
}

$conn->close();
?>