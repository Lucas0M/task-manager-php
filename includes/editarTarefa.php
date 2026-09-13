<?php

require __DIR__ . '/../functions/editar.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
  header('Location: ../public/home/index.php');
  die();
}

$titulo = htmlspecialchars($_POST['titulo']) ?? '';
$descricao = htmlspecialchars($_POST['descricao']) ?? '';
$responsavel = htmlspecialchars($_POST['responsavel']) ?? '';
$concluida = htmlspecialchars($_POST['status']) ?? $tarefa['concluida'];
$id = htmlspecialchars($_GET['id']) ?? 0;
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
$repository->editar($titulo, $descricao, $responsavel, $concluida, $id);

header("Location: ../public/tarefas/editar.php?id=$id&updated=success");
die();
