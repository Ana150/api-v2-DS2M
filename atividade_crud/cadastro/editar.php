<?php
    include('../componentes/header.php');
    require("../acoes.php");


    //PEGANDO OS DADOS JÁ EXISTENTES NO BANCO
        $idDaPessoa = $_GET['id'];
        $resultado = mostrarAsPessoasPeloId($conexao, $idDaPessoa);
        $pessoaEditar = mysqli_fetch_array($resultado);
?>


<div class="container">
        <hr>
        <div class="card">
            <div class="card-header">
                <h2>Edição</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="../acoes.php">
                    <input class="form-control" type="hidden" name="acao" value="editar">
                    <input class="form-control" type="hidden" name="id" value='<?php echo $pessoaEditar["cod_pessoa"]?>'>

                    <input class="form-control" type="text" name="nome" id="nome" value='<?php echo $pessoaEditar["nome"] ?>'>
                    <br />
                    <input class="form-control" type="text" name="sobrenome" id="sobrenome" value='<?php echo $pessoaEditar["sobrenome"]?>'>
                    <br />
                    <input class="form-control" type="text" name="email" id="email" value='<?php echo $pessoaEditar["email"]?>'>
                    <br />
                    <input class="form-control" type="text"name="celular" id="celular" value='<?php echo $pessoaEditar["celular"]?>'>
                    <br />
                    <button class="btn btn-success">Salvar Edição</button>
                </form>
            </div>
        </div>
    </div>


<?php
    include('../componentes/footer.php');
?>