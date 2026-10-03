<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: ../public/tarefas/index.php');
  exit;
}

require __DIR__ . '/../repository/TarefaRepository.php';

$id = $_POST['id'];

if (!$id) {
  header('Location: ../public/tarefas/index.php');
  exit;
}

$repository = new TarefaRepository();
$repository->concluir($id);

header('Location: ../public/tarefas/index.php');
exit;
