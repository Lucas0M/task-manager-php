<?php


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: ../public/tarefas/index.php');
  die();
}

require __DIR__ . '/../repository/TarefaRepository.php';

$repository = new TarefaRepository();
$tarefa = htmlspecialchars($_POST['tarefa']);
print_r($tarefa);
// $id = $tarefa['id'];
// $ativo = $tarefa['ativo'] ? 1 : 0;

// if (isset($id) && $id !== 0) {
//   $repository->deletar($ativo,  $id);
//   header('Location: ../public/tarefas/index.php');
//   die();
// }
