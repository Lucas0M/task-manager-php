<?php

require __DIR__ . '/../repository/TarefaRepository.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
  header('Location: ../public/home/index.php');
  die();
}

$titulo = htmlspecialchars($_POST['titulo']) ?? '';
$descricao = htmlspecialchars($_POST['descricao']) ?? '';
$responsavel = htmlspecialchars($_POST['responsavel']) ?? '';
$errors = [];

if (!isset($titulo) || !isset($descricao) || !isset($responsavel)) {
  $errors['ParametrosNaoEncontrados'] = 'Passe todos os parâmetros para criar a tarefa';
}

if (empty($titulo) || empty($descricao) || empty($responsavel)) {
  $errors['InputsVazios'] = 'Preencha todos os campos para criar a tarefa';
}

if (!empty($errors)) {
  $_SESSION['ERRORS'] = $errors;
  header('Location: ../public/home/index.php');
  die();
}

$repository = new TarefaRepository();
$repository->inserir($titulo, $descricao, $responsavel);

header('Location: ../public/home/index.php?created=success');
