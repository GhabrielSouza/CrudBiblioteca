<?php
require("src/conexao.php");

$sql = "SELECT *
from autor";
$result = $conn->query($sql);


if ($result->num_rows > 0) {

  while ($row = $result->fetch_assoc()) {

    echo   '<div class="card-body d-flex justify-content-around ">
                <p>'.$row['nome'].'</p>
                <ul class="card_body_ul d-flex gap-4 align-items-center p-0 m-0">
                    <li> <a href="" class="card-link-upd"><img src="./assets/edit.svg" alt="Atualizar" class="px-1"></a></li>
                    <li> <a href="src/delete.php?tipo=autor&id=' . $row['id_autor'] . '" class="card-link-del"><img src="./assets/delete.svg" alt="Deletar" class="px-1"></a></li>

                </ul>
            </div>';
    }
}

else{
    echo "<a href='formAutor.html'>nao existem autores cadastrados</a>";
}
$conn->close();

?>