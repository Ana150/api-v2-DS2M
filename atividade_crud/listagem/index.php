<?php
include('../componentes/header.php');
require('../acoes.php');


//montagem da instrução sql
$sql = "SELECT * FROM tbl_pessoa1";

//excução da instrução sql
$resultado = mysqli_query($conexao, $sql);
?>

<div class="container">

    <br />

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>E-mail</th>
                <th>Celular</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php
            while ($pessoa = mysqli_fetch_array($resultado)) {
            ?>
                <tr>
                    <th><?php echo $pessoa['cod_pessoa'] ?></th>
                    <th><?php echo $pessoa['nome'] ?></th>
                    <th><?php echo $pessoa['sobrenome'] ?></th>
                    <th><?php echo $pessoa['email'] ?></th>
                    <th><?php echo $pessoa['celular'] ?></th>
                    <th>
                        <a class="btn btn-warning" href="../cadastro/editar.php?id=<?= $pessoa['cod_pessoa'] ?>">Editar</a>

                        <form action="../acoes.php" method="post" style="display: inline;">
                            <input type="hidden" name="acao" value="excluir">
                            <input type="hidden" name="id" value="<?= $pessoa["cod_pessoa"] ?>">
                            <button class="btn btn-danger">Excluir</button>
                        </form>
                    </th>
                </tr>
            <?php } ?>
        </tbody>

    </table>

</div>

<?php
include('../componentes/footer.php');
?>