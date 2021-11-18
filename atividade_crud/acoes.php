<?php
require('database/conexao.php');

if (isset($_POST['acao'])) {
    switch ($_POST["acao"]) {
        case 'cadastrar':
            //RECEBENDO OS DADOS
            $nome = $_POST["nome"];
            $sobrenome = $_POST["sobrenome"];
            $email = $_POST["email"];
            $celular = $_POST["celular"];

            //COLOCANDO OS DADOS NO BANCO
            $Sql = "INSERT INTO tbl_pessoa1 (nome, sobrenome, email, celular) VALUES ('$nome', '$sobrenome', '$email', '$celular');";

            $resultado = mysqli_query($conexao, $Sql);

            header("location: login/index.php");

            break;

        case 'editar':

            //DADOS PÓS EDIÇÃO
            $idEditado = $_POST['id'];
            $nomeEditado = $_POST['nome'];
            $sobrenomeEditado = $_POST['sobrenome'];
            $emailEditado = $_POST['email'];
            $celularEditado = $_POST['celular'];
            //ATUALIZANDO NO BANCO 
            $Sql = "UPDATE tbl_pessoa1 SET nome = '$nomeEditado', sobrenome = '$sobrenomeEditado', email = '$emailEditado', celular = '$celularEditado' WHERE cod_pessoa = $idEditado;";

            $resultado = mysqli_query($conexao, $Sql);
            //REDIRECIONAR
            header("location: login/index.php");

            break;

        default:
            # code...
            break;

        case 'excluir':
            //RECEBENDO OS DADOS
            $exclusao = null;

            if (isset($_POST["id"])) {
                $exclusao = $_POST["id"];
            }

            //EXCLUINDO OS DADOS NO BANCO
            $Sql = "DELETE FROM tbl_pessoa1 WHERE (cod_pessoa = $exclusao);";

            $resultado = mysqli_query($conexao, $Sql);

            header("location: login/index.php");

            break;
    }
}

function motrarAsPessoas($conexao)
{
    $Sql = "SELECT * FROM tbl_pessoa1;";

    $resultado = mysqli_query($conexao, $Sql);

    return $resultado;
}

function mostrarAsPessoasPeloId($conexao, $idPessoa)
{
    $Sql = "SELECT * FROM tbl_pessoa1 WHERE cod_pessoa = $idPessoa;";

    $resultado = mysqli_query($conexao, $Sql);

    return $resultado;
}
