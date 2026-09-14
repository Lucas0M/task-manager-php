<?php

require __DIR__ . '/../repository/TarefaRepository.php';

$id = htmlspecialchars($_GET['id']) ?? 0;

if (isset($id) && $id !== 0) {
  $repository = new TarefaRepository();
  $repository->deletar($id);
  header('Location: ../public/tarefas/index.php');
  die();
}
