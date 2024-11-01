<?php
require("src/conexao.php");

$sql = "SELECT *
from livro";
$result = $conn->query($sql);


if ($result->num_rows > 0) {

  while ($row = $result->fetch_assoc()) {

    echo   '<div class="card-body d-flex justify-content-around ">
                <p>'.$row['titulo'].'</p>
                <ul class="card_body_ul d-flex gap-4 align-items-center p-0 m-0">
                    <li> <a href="formLivro.php?tipo=update&id=' . $row['id_livro'] . '" class="card-link-upd"><img src="./assets/edit.svg" alt="Atualizar" class="px-1"></a></li>
                    <li> <a href="src/delete.php?tipo=livro&id=' . $row['id_livro'] . '" class="card-link-del"><img src="./assets/delete.svg" alt="Deletar" class="px-1"></a></li>

                </ul>
            </div>';
    }
}

    echo "<a href='formLivro.php'>nao existem livros cadastrados</a>";

$conn->close();

?>