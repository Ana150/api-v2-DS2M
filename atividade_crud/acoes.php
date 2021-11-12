<?php
require('database/conexao.php');

if (isset($_POST['acao'])) 
    {
        switch ($_POST["acao"]) 
        {
            case 'cadastrar':
                //RECEBENDO OS DADOS
                    $nome = $_POST["nome"];
                    $sobrenome = $_POST["sobrenome"];
                    $email = $_POST["email"];
                    $celular = $_POST["celular"];

                //COLOCANDO OS DADOS NO BANCO
                        $intrucaoSql = "INSERT INTO tbl_pessoa (nome, sobrenome, email, celular) VALUES ('$nome', '$sobrenome', '$email', '$celular');";

                        $resultado = mysqli_query($conexao, $instrucaoSql);
                        
                        header("location: index.php");

                break;

            case 'excluir':
                //RECEBENDO OS DADOS
                    $exclusao = null;

                    if (isset($_POST["id"])) 
                    {$exclusao = $_POST["id"];
                    }

                //EXCLUINDO OS DADOS NO BANCO
                        $instrucaoSql = "DELETE FROM tbl_pessoa WHERE (cod_pessoa = $exclusao);";

                        $resultado = mysqli_query($conexao, $instrucaoSql);
                        
                        header("location: index.php");

                break;

            case 'editar' :

                //DADOS PÓS EDIÇÃO
                    $idEditado = $_POST['id'];
                    $nomeEditado = $_POST['nome'];
                    $sobrenomeEditado = $_POST['sobrenome'];
                    $emailEditado = $_POST['email'];
                    $celularEditado = $_POST['celular'];

                //ATUALIZANDO NO BANCO 
                        $instrucaoSql = "UPDATE tbl_pessoa SET nome = '$nomeEditado', sobrenome = '$sobrenomeEditado', email = '$emailEditado', celular = '$celularEditado' WHERE cod_pessoa = $idEditado;";

                        $resultado = mysqli_query($conexao, $instrucaoSql);
                        
                    #redirecionamento
                        header("location: index.php");

                break;

            default:
                # code...
                break;
        }
    }

    function motrarAsPessoas ($conexao)
    {
            $instrucaoSql = "SELECT * FROM tbl_pessoa;";
        
            $resultado = mysqli_query($conexao,$instrucaoSql);

            return $resultado;
    }

    function mostrarAsPessoasPeloId ($conexao, $idPessoa)
    {
            $instrucaoSql = "SELECT * FROM tbl_pessoa WHERE cod_pessoa = $idPessoa;";
        
            $resultado = mysqli_query($conexao,$instrucaoSql);

            return $resultado;
    }

?>