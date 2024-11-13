<?php
//arquivo que faz o delete dos dados no banco de dados

//abre a conexão por meio do require do arquivo com os metodos pra criar conexão.
require("conexao.php");

//pega pelo get os dados tipo e id que vao ser uteis na exclusão
$tipo = $_GET['tipo'];
$id = $_GET['id'];

//cria um livro na tabela.
//if ($tipo == "livro") {
try{//tenta deletar

    // faz o delete do dado, concatenando o tipo a uma string "id_" por causa do padrao do banco de dados e usa o id como indice
    $sql = "DELETE FROM $tipo WHERE id_".$tipo."=$id";

  //esse if serve para redirecionar o usuario pra pagina certa, ja que pra autor o redirect tem ser pra uma pagina com sufixo "es" e nao apenas "s"
  if ($conn->query($sql) === TRUE) {
    if($tipo == "autor"){
      header("location:../exibir".$tipo."es.php");
    }

    else{
      header("location:../exibir".$tipo."s.php");
    }
  } else {
    echo "Error deleting record: " . $conn->error;
  }
}

catch (mysqli_sql_exception $e) {//trata a exceção
  // Verifica se o erro é devido a uma restrição de chave estrangeira
  if (strpos($e->getMessage(), 'a foreign key constraint fails') !== false) {
    if($tipo == "autor"){
      //header("location:../exibir".$tipo."es.php");
      header("location:../../../modules/exibir".$tipo."es.php?erro=fk");
    }

    else{
      //header("location:../exibir".$tipo."s.php");
      header("location:../../../modules/exibir".$tipo.".php?erro=fk");
    }
  } else { // Trata outros erros SQL
    if($tipo == "autor"){
      //header("location:../exibir".$tipo."es.php");
      header("location:../../../modules/exibir".$tipo."es.php?erro=padrao");
    }
    else{
      
      header("location:../../../modules/exibir".$tipo.".php?erro=padrao");
    }
  }
}

$conn->close();
?>