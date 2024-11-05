<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Biblioteca Scriptorium</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Krona+One&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Exibindo usuarios</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg  header_container">
            <div class="container-fluid">
                <a class="navbar-brand header_container_link_logo" href="#">Scriptorium</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link header_container_link" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link header_container_link" href="#">Cadastrados</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle header_container_link" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Funções
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item " href="/modules/exibirLivros.php">Exibir livros</a></li>
                                <li><a class="dropdown-item " href="/modules/exibirCategorias.php">Exibir categorias</a>
                                </li>
                                <li><a class="dropdown-item " href="/modules/exibirAutores.php">Exibir autores</a></li>
                                <li><a class="dropdown-item " href="/modules/exibirEmprestimos.php">Exibir
                                        Emprestimos</a></li>
                            </ul>
                        </li>
                    </ul>
                    <a class="link-offset-2 link-underline link-underline-opacity-0 link_cadastrar_usuario d-flex align-items-center header_container_link_user"
                        href="/modules/exibirUsuarios.php">Exibir Usuarios <img class="ps-3 header_container_link_logo"
                            src="../assets/account_circle_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.svg"
                            alt="Cadastrar Usuário"></a>
                </div>
            </div>
        </nav>
    </header>
    <main class="container_main">
        <h1 class="p-3">Livros:</h1>
        <?php
        require("src/conexao.php");

        $sql = "SELECT *
        FROM livro l
        JOIN autor a ON a.id_autor = l.id_autor";
        $result = $conn->query($sql);


        if ($result->num_rows > 0) {
            echo '<div class="d-flex gap-3 flex-wrap w-50">';
            while ($row = $result->fetch_assoc()) {
                echo '
               <div class="card-body p-3 border border-white  m-3">
                    <h5>' . $row['titulo'] . '</h5>
                    <p>' . $row['descricao'] . '</p>
                    <ul class="py-1">
                        <li class="py-1">' . $row['nome'] . '</li>
                    </ul>
                    <ul class="card_body_ul d-flex gap-4 align-items-center p-0 m-0">
                        <li> <a href="formUsuario.php?tipo=update&id=' . $row['id_livro'] . '" class="card-link-upd"><img src="../assets/edit.svg" alt="Atualizar" class="px-1"></a></li>
                        <li> <a href="src/delete.php?tipo=livro&id=' . $row['id_livro'] . '" class="card-link-del"><img src="../assets/delete.svg" alt="Deletar" class="px-1"></a></li>
                    </ul>
                </div> 
            ';
            }
            echo ' </div>';
        } else {
            echo '
            
          <div class="container_main_vazio d-flex flex-column align-items-center pt-5">
            <img class="w-25" src="../assets/livro-removebg-preview.png" alt="Nenhum livro cadastrado">
            <a class="text-center" href="formLivro.php">
                <p class="container_main_vazio_paragrafo">Nenhum livro cadastrado...</p>
            </a>
          </div>';
        }

        $conn->close();

        ?>
    </main>
    <footer>
        <div class="footer_container_principal d-flex p-4 justify-content-around">
            <div class="footer_container_principal_links">
                <ul class="footer_container_principal_links_list">
                    <li><a class="link-offset-2 link-underline link-underline-opacity-0 footer_container_principal_links_list_link"
                            href="">Mostrar livros cadastrados</a></li>
                </ul>
            </div>
            <div class="footer_container_principal_redes">
                <ul class="footer_container_principal_redes_list">
                    <li><a class="link-offset-2 link-underline link-underline-opacity-0 footer_container_principal_redes_list_item"
                            href="">Instragram</a></li>
                    <li><a class="link-offset-2 link-underline link-underline-opacity-0 footer_container_principal_redes_list_item"
                            href="">Facebook</a></li>
                    <li><a class="link-offset-2 link-underline link-underline-opacity-0 footer_container_principal_redes_list_item"
                            href="">Twitter</a></li>
                </ul>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>