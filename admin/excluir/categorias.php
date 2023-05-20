<?php
    $sql = "SELECT id FROM categoria WHERE id = :id";

    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(":id", $id);
    $consulta->execute();
    $dados = $consulta->fetch(PDO::FETCH_OBJ);


    if (!empty($categoria->id)) {
        mensagemErro("Dados não encontrados");
    }

    $sql = "DELETE FROM categoria WHERE id = :id";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(":id", $id);

    if ($consulta->execute()) {
        echo "<script>location.href='listar/categorias';</script>";
        exit;
    }