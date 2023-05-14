<?php

if ($_POST) {
    $id = $_POST["id"] ?? NULL; //pega os dados do formulário através da variável global $_POST e passa para a variável $id, se não houver dados inseridos a variável $id fica com valor nulo 
    $nome = $_POST["nome"] ?? NULL; //pega os dados do formulário através da variável global $_POST e passa para a variável $nome, se não houver dados inseridos a variável $nome fica com valor nulo 

    if (empty($nome)) { //validação se o nome foi inserido  através da função empty
        $sql = "SELECT nome,id FROM categoria WHERE id = :id";
        mensagemErro("Preencha o nome da categoria"); //se não existir é passado uma mensagem de erro
    }
    $sql = "SELECT id FROM categoria WHERE nome = :nome and id <> :id"; //aqui é feito um SELECT que verifica se o nome digitado é igual ao nome do banco de dados, e verifica se o id é diferente. Depois esse SELECT é passado pra variável $sql
    $consulta = $pdo->prepare($sql); //prepara a consulta SQL utilizando o objeto $pdo e a variável $sql definida anteriormente. 
    $consulta->bindParam(":nome", $nome); //prepara variável $nome com o parâmetro ":nome" para a consulta SQL.
    $consulta->bindParam(":id", $id); //prepara variável $id com o parâmetro ":id" para a consulta SQL.
    $consulta->execute(); //executa a consulta SQL

    $dados = $consulta->fetch(PDO::FETCH_OBJ); //pega os dados do Banco de Dados e transforma em objeto para ser usado no php através da variável $dados

    if (!empty($dados->id)) { //verifica se o campo id já existe no banco de dados
        mensagemErro("Já existe esse item cadastrado"); //se existir é exibido uma mensagem de erro
    }

    if (empty($id)) { //Verifica se foi preenchido o formulário sem ter preenchido o id
        $sql = ("INSERT INTO categoria (nome) VALUES (:nome)"); // se não foi preenchido o id é feito um INSERT na tabela categoria na coluna nome, recebendo o nome digitado como parâmetro, e adicionando um id automaticamente no banco de dados
        $consulta = $pdo->prepare($sql); //prepara a consulta SQL utilizando o objeto $pdo e a variável $sql definida anteriormente. 
        $consulta->bindParam(":nome", $nome); //prepara variável $nome com o parâmetro ":nome" para a consulta SQL.
    } else { //se for preenchido um id que já existe no banco de dados
        $sql = "UPDATE categoria SET nome = :nome WHERE id = :id"; //é feito um UPDATE na tabela categoria na coluna nome e id, através do id passado pelo usuário
        $consulta = $pdo->prepare($sql); //prepara a consulta SQL utilizando o objeto $pdo e a variável $sql definida anteriormente.
        $consulta->bindParam(":nome", $nome); //prepara variável $nome com o parâmetro ":nome" para a consulta SQL.
        $consulta->bindParam(":id", $id); //prepara variável $id com o parâmetro ":id" para a consulta SQL.
    }

    if (!$consulta->execute()) { //se não foi possível executar a variável consulta
        mensagemErro("Não foi possível salvar os dados"); //é exibido uma mensagem de erro
    }

    echo "<script>location.href='listar/categorias'</script>"; //Se todas as verificações derem certo o usuário é redirecionado para a página de listar categorias
    exit;
}