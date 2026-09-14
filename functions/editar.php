<?php

require __DIR__ . '../../repository/TarefaRepository.php';

$id = htmlspecialchars($_GET['id']) ?? 0;

if (isset($id) && $id !== 0) {
  $repository = new TarefaRepository();
  $tarefa = $repository->listarPorId($id);
  if (empty($tarefa)) {
    header('Location: ../tarefas/index.php');
    die();
  }
}
