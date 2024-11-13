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
        <!--Inicio da barra de navegação + inicio do menu da barra de navegação  -->
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
                            <a class="nav-link header_container_link" aria-current="page" href="../../../index.php">Home</a>
                        </li>
                        <!-- Lista dropdown do menu de cadastros-->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle header_container_link" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Cadastrar
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item " href="/modules/formLivro.php">Cadastrar livros</a></li>
                                <li><a class="dropdown-item " href="/modules/formCategoria.php">Cadastrar categorias</a>
                                </li>
                                <li><a class="dropdown-item " href="/modules/formAutor.php">Cadastrar autores</a></li>
                                <li><a class="dropdown-item " href="/modules/formEmprestimo.php?tipo=create">Cadastrar
                                        Emprestimos</a></li>
                                <li><a class="dropdown-item " href="/modules/formUsuario.php">Cadastrar Usuario</a></li>
                            </ul>
                        </li>
                        <!-- Lista dropdown do menu de exibições-->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle header_container_link" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Exibições
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
                </div>
            </div>
        </nav>
    </header>
    <main class="container_main">
        <h1 class="p-3">Usuarios:</h1>
        <div class="mx-5">
            <?php
            //cria conexão;
            require("src/conexao.php");

            //verifica se um erro foi passado pela url
            $erro = isset($_GET['erro']) ? $_GET['erro'] : null; 

            //se houver mostra na tela de acordo com o tipo do erro
            if($erro == "padrao"){
            echo "<script>alert('ocorreu um erro, tente novamente.');</script>";
            }

            if($erro == "fk"){
            echo "<script>alert('Não é possível excluir o autor pois ele está associado a um livro.');</script>";
            }

            //seleciona todos os dados de usuario para mostra-los
            $sql = "SELECT * from usuario";
            $result = $conn->query($sql);


            if ($result->num_rows > 0) {
                echo '<div class="d-flex justify-content-around flex-wrap">';
                while ($row = $result->fetch_assoc()) {
                    echo '
               <div class="card-body-exibir p-3 border border-white  m-3">
                    <h5>' . $row['nome'] . '</h5>
                    <ul class="py-1">
                        <li class="py-1">' . $row['email'] . '</li>
                        <li class="py-1">' . $row['telefone'] . '</li>
                        <li class="py-1">' . $row['bairro'] . '</li>
                    </ul>
                    <ul class="card_body_ul d-flex gap-4 align-items-center p-0 m-0">
                        <li> <a href="formUsuario.php?tipo=update&id=' . $row['id_usuario'] . '" class="card-link-upd"><img src="../assets/edit.svg" alt="Atualizar" class="px-1"></a></li>
                        <li> <a href="src/delete.php?tipo=usuario&id=' . $row['id_usuario'] . '" class="card-link-del" onclick="return confirmDelete();"><img src="../assets/delete.svg" alt="Deletar" class="px-1"></a></li>

                    </ul>
                </div> 
            ';
                }
                echo ' </div>';
            } else {
                echo '
            
                    <div class="container_main_vazio d-flex flex-column align-items-center pt-5">
                        <img class="w-25" src="../assets/user.svg" alt="Nenhum emprestimo cadastrado...">
                        <a href="formEmprestimo.php?tipo=create">
                            <p class="container_main_vazio_paragrafo">Nenhum usuário cadastrado...</p>
                        </a>
                    </div>';
            }
            $conn->close();

            ?>
        </div>
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

<script>
  function confirmDelete() {
    //função para confirmar o delete
    return confirm("Tem certeza de que deseja excluir este item?");
  }
</script>

</html>