<?php
$nome = null;

if (empty($id)) {
    // consultar no banco de dados
    $slq = "SELECT * FROM categoria WHERE id = :id";
    $consulta = $pdo->prepare($slq);
    // buscar a variavel ":id" no banco de dados e substituir pela variavel "$id"
    $consulta->bindParam(":id", $id);
    $consulta->execute();

    $dados = $consulta->fetchAll(PDO::FETCH_OBJ);


    $id = $dados->id ?? null;
    $nome = $dados->nome ?? null;
}

?>

<div class="card">
    <div class="card-header">
        <h2 class="float-left">Cadastros de Categorias</h2>

        <div class="float-right">
            <a href="listar/categorias" class="btn btn-success">
                Listar Categorias
            </a>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" action="salvar/categorias">

            <label for="id">ID da Categoria</label>
            <input type="text" name="id" id="id" class="form-control" readonly value="<?= $id ?>">

            <label for="nome">Nome da Categoria</label>
            <input type="text" name="nome" id="nome" class="form-control" required value="">
            <br>
            <button type="submit" class="btn btn-success">
                Salvar Dados
            </button>
        </form>
    </div>
</div>