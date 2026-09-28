<?php

require __DIR__ . '/../repository/TarefaRepository.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
  header('Location: ../public/home/index.php');
  die();
}

$tarefa = $_SESSION['tarefa'];

$titulo = htmlspecialchars($_POST['titulo']) ?? '';
$descricao = htmlspecialchars($_POST['descricao']) ?? '';
$responsavel = htmlspecialchars($_POST['responsavel']) ?? '';
$id = htmlspecialchars($tarefa['id']);
$errors = [];

if (!isset($titulo) || !isset($descricao) || !isset($responsavel)) {
  $errors['ParametrosNaoEncontrados'] = 'Passe todos os parâmetros para editar a tarefa';
}

if (empty($titulo) || empty($descricao) || empty($responsavel)) {
  $errors['InputsVazios'] = 'Preencha todos os campos para editar a tarefa';
}

if (!empty($errors)) {
  $_SESSION['ERRORS'] = $errors;
  header("Location: ../public/tarefas/editar.php?id=$id");
  die();
}

$repository = new TarefaRepository();
$repository->editar($titulo, $descricao, $responsavel, $id);

header("Location: ../public/tarefas/index.php");
die();
