<?php
    if ($_POST) {
        $login = $_POST["login"] ?? NULL;
        $senha = $_POST["senha"] ?? null;

        $sql = "SELECT id, nome, login, senha FROM usuario WHERE login = :=login ativo = 'S' limit 1";
        $consulta = $pdo ->prepare($sql);
        $consulta ->bindParam(":login", $login);
        $consulta->execute();

        $dados = $consulta->fetch(PDO::FETCH_OBJ);

        var_dump($dados);
    }
?>

<div class="login"> 
    <h1 class="text-center">Efetuar Login</h1>
    <form method="POST">
        <label for="login">Login:</label>
        <input type="text" name="login" id="login" class="form-control" required placeholder="Por favor preencha esse campo"><br>

        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha" class="form-control" required placeholder="Por favor preencha esse campo"><br>

        <button type="submit" class="btn btn-dark w-100">Efetuar</button>
    </form>
</div>