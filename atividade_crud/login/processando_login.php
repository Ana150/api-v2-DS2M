<?php

    session_start();
    require("../database/conexao.php");

    switch ($_POST["acao"]) 
    {
        
        case 'login':

            $usuario= $_POST["txt_usuario"];
            $senha= $_POST["txt_senha"];
            
            //realizarLogin($usuario, $senha, $conexao);
        
            break;
        
        case 'sair':

            session_destroy();
            header("location: ./index.php");
            break;

        default:
            # code...
            break;
    }

?>