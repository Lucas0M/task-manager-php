<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
  header('Location: ../tarefas/index.php');
  exit;
}


require __DIR__ . '/../repository/TarefaRepository.php';

$repository = new TarefaRepository();
$id = $_POST['id'];

if (!$id) {
  header('Location: ../public/tarefas/index.php');
  exit;
}

$tarefa = $repository->listarPorId($id);

if (empty($tarefa)) {
  header('Location: ../tarefas/index.php');
  exit;
}

$_SESSION['tarefa'] = $tarefa ?? [];

header('Location: ../public/tarefas/editar.php');
exit;
