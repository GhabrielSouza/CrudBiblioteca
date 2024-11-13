<?php
//arquivo que insere os dados nas tabelas do banco de dados.

//abre a conexão por meio do require do arquivo com os metodos pra criar conexão.
require("conexao.php");


//recebe os tipos via get e verifica para inserir em cada tabela.
$tipo = $_GET['tipo'];

//cria um livro na tabela.
if ($tipo == "livro") {

    try{ //tenta criar 
        $titulo = $_POST['titulo'];
        $ano_de_publicacao = $_POST['ano_de_publicacao'];
        $id_categoria = trim($_POST['categoria']);
        $id_autor = trim($_POST['autor']);
        $descricao = $_POST['descricao'];
    
        //insere os dados na tabela livro
        $sql = "INSERT INTO livro (titulo, ano_publicacao,  descricao, id_autor, id_categoria)
      VALUES ('$titulo', '$ano_de_publicacao' , '$descricao' , '$id_autor', '$id_categoria');";
    
        if ($conn->query($sql) === TRUE) {
            //esse if serve para redirecionar o usuario pra pagina certa, ja que pra autor o redirect tem ser pra uma pagina com sufixo "es" e nao apenas "s"
            if($tipo == "autor"){
                header("location:../../../modules/exibir".$tipo."es.php");
            }
            else{
                header("location:../../../modules/exibir".$tipo."s.php");
            }
        } 
        
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        } 

    } catch (mysqli_sql_exception $e) {
        // Trata a exceção
        if ($e->getCode() == 1062) {
            header("location:../../../modules/form".$tipo.".php?erro=duplicidade");
        } else {
            header("location:../../../modules/form".$tipo.".php?erro=padrao");
        }
    } finally {
        // Fecha a conexão
        $conn->close();
    }


}

//cria um usuario na tabela.
if ($tipo == "usuario") {

    try{ //tenta criar 
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $bairro = $_POST['bairro'];


        //insere os dados na tabela usuario
        $sql = "INSERT INTO usuario (nome, email, telefone, bairro)
    VALUES ('$nome', '$email', '$telefone', '$bairro')";


        
        if ($conn->query($sql) === TRUE) {
            //esse if serve para redirecionar o usuario pra pagina certa, ja que pra autor o redirect tem ser pra uma pagina com sufixo "es" e nao apenas "s"
            if($tipo == "autor"){
                header("location:../../../modules/exibir".$tipo."es.php");
            }
            else{
                header("location:../../../modules/exibir".$tipo."s.php");
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        } 

    } catch (mysqli_sql_exception $e) {
        // Trata a exceção
        if ($e->getCode() == 1062) {
            header("location:../../../modules/form".$tipo.".php?erro=duplicidade");
        } else {
            header("location:../../../modules/form".$tipo.".php?erro=padrao");
        }
    } finally {
        // Fecha a conexão
        $conn->close();
    }
}

//cria uma autor na tabela.
if ($tipo == "autor") {

    try{ //tenta criar 
        $autor = $_POST['nomeAutor'];
        $nacionalidade = $_POST['nacionalidade'];

        //insere os dados na tabela autor
        $sql = "INSERT INTO autor (nome, nacionalidade)
    VALUES ('$autor', '$nacionalidade')";

        if ($conn->query($sql) === TRUE) {
            //esse if serve para redirecionar o usuario pra pagina certa, ja que pra autor o redirect tem ser pra uma pagina com sufixo "es" e nao apenas "s"
            if($tipo == "autor"){
                header("location:../../../modules/exibir".$tipo."es.php");
            }
            else{
                header("location:../../../modules/exibir".$tipo."s.php");
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        } 

    } catch (mysqli_sql_exception $e) {
        // Trata a exceção
        if ($e->getCode() == 1062) {
            header("location:../../../modules/form".$tipo.".php?erro=duplicidade");
        } else {
            header("location:../../../modules/form".$tipo.".php?erro=padrao");
        }
    } finally {
        // Fecha a conexão
        $conn->close();
    }

}

//cria uma categoria na tabela.
if ($tipo == "categoria") {

    try{ //tenta criar 

        $genero = $_POST['genero'];

        //insere os dados na tabela categoria
        $sql = "INSERT INTO categoria (genero)
    VALUES ('$genero')";

        if ($conn->query($sql) === TRUE) {
            if($tipo == "autor"){
            //esse if serve para redirecionar o usuario pra pagina certa, ja que pra autor o redirect tem ser pra uma pagina com sufixo "es" e nao apenas "s"
                
                header("location:../../../modules/exibir".$tipo."es.php");
            }
            else{
                header("location:../../../modules/exibir".$tipo."s.php");
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }   

    } catch (mysqli_sql_exception $e) {
        // Trata a exceção
        if ($e->getCode() == 1062) {
            header("location:../../../modules/form".$tipo.".php?erro=duplicidade");
        } else {
            header("location:../../../modules/form".$tipo.".php?erro=padrao");
        }
    } finally {
        // Fecha a conexão
        $conn->close();
    }

}

//cria um emprestimo na tabela.
if ($tipo == "emprestimo") {

    try{ //tenta criar 
        //id;livro_id;usuario_id;data_emprestimo;data_devolucao;valor
        $id_usuarios = $_POST["id_usuario"];
        $id_livros = $_POST["id_livro"];
        $data_emprestimo = $_POST['data_emprestimo'];
        $data_devolucao = $_POST['data_devolucao'];
        


        //insere os dados na tabela emprestimo
        $sql = "INSERT INTO emprestimo (id_livro, id_usuario, data_emprestimo, data_devolucao)
        VALUES ('$id_livros', '$id_usuarios', '$data_emprestimo', '$data_devolucao')";


        if ($conn->query($sql) === TRUE) {
            //esse if serve para redirecionar o usuario pra pagina certa, ja que pra autor o redirect tem ser pra uma pagina com sufixo "es" e nao apenas "s"
            if($tipo == "autor"){
                header("location:../../../modules/exibir".$tipo."es.php");
            }
            else{
                header("location:../../../modules/exibir".$tipo."s.php");
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        } 
    } catch (mysqli_sql_exception $e) {
        // Trata a exceção
        if ($e->getCode() == 1062) {
            header("location:../../../modules/form".$tipo.".php?erro=duplicidade");
        } else {
            header("location:../../../modules/form".$tipo.".php?erro=padrao");
        }
    } finally {
        // Fecha a conexão
        $conn->close();
    }
}

//garante que vai fechar a conexão se nao tiver tipo;
else{
    $conn->close();
}
?>


