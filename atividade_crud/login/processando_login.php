<?php

session_start();
require("../database/conexao.php");

switch ($_POST["acao"]) 
{
    
    case 'login':

        $inserirUsuario= $_POST["txt_usuario"];
        $inserirSenha= $_POST["txt_senha"];
        
        fazLogin($inserirUsuario, $inserirSenha, $conexao);
    
        break;
    
    case 'sair':
        
        session_destroy();
        header("location: index.php");
        break;

    default:
        # code...
        break;
}

function fazLogin($usuario, $senha, $conexao)
{
    $Sql = "SELECT * FROM tbl_login WHERE usuario = '$usuario'";

    $resultado = mysqli_query($conexao, $Sql);

    $dadosUsuario = mysqli_fetch_array($resultado);

    if ((isset($dadosUsuario["usuario"]) && $dadosUsuario["usuario"] == $usuario) && (isset($dadosUsuario["senha"]) && $dadosUsuario["senha"] == $senha))
    {

        $_SESSION["usuarioId"] = $dadosUsuario["usuarioId"];
        $_SESSION["usuario"] = $dadosUsuario["usuario"];
        $_SESSION["senha"] = session_id();     

        header("location: ../index.php");
        exit;
    }

    else 
    {
        header("location: ./index.php");
    }
}



?>