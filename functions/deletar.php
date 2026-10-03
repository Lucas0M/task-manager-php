<?php


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: ../public/tarefas/index.php');
  exit;
}

require __DIR__ . '/../repository/TarefaRepository.php';

$repository = new TarefaRepository();
$id = $_POST['id'];

if (isset($id) && $id != 0) {
  $repository->deletar(0,  $id);
  header('Location: ../public/tarefas/index.php');
  exit;
}
