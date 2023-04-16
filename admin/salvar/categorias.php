<?php

$nome = $_POST["nome"] ?? null;
$sql = "INSERT INTO categoria (nome) VALUES :nome"; //realiza a inserção na tabela "categoria", utilizando o valor da variável $nome.

$consulta = $pdo->prepare($sql); // prepara a consulta SQL utilizando o objeto PDO e a string SQL definida anteriormente.
$consulta->bindParam(":nome", $nome); //realiza o bind da variável $nome com o parâmetro ":nome" da consulta SQL.
$consulta->execute(); //executa a consulta SQL.

$dados = $consulta->fetch(PDO::FETCH_OBJ);//define a variável $dados como o resultado da consulta SQL utilizando o método fetch() do objeto PDO, com o parâmetro PDO::FETCH_OBJ para retornar um objeto com os resultados da consulta.