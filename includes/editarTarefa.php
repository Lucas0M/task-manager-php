<?php

require __DIR__ . '/../repository/TarefaRepository.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
  header('Location: ../public/home/index.php');
  exit;
}

$tarefa = $_SESSION['tarefa'];

$titulo = trim($_POST['titulo'] ?? '');
$descricao = trim($_POST['descricao'] ?? '');
$responsavel = trim($_POST['responsavel'] ?? '');
$id = trim($tarefa['id']);
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
  exit;
}

$repository = new TarefaRepository();
$repository->editar($titulo, $descricao, $responsavel, $id);

header("Location: ../public/tarefas/index.php");
exit;
