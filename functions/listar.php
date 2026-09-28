<?php

require __DIR__ . '/../repository/TarefaRepository.php';
function listarTabela()
{
  $repository = new TarefaRepository();
  $tarefas = $repository->listar();

  foreach ($tarefas as $tarefa) {
    if ($tarefa['ativo']) {
      $esconder = '';
      $riscar = '';

      if ($tarefa['concluida'] === 'Concluida') {
        $esconder = 'style="display: none;"';
        $riscar = 'style="text-decoration: line-through;"';
      }

      echo '
        <tr>
            <th scope="row">' . $tarefa['id'] . '</th>
            <td ' . $riscar . '>' . $tarefa['titulo'] . '</td>
            <td ' . $riscar . '>' . $tarefa['descricao'] . '</td>
            <td ' . $riscar . '>' . $tarefa['responsavel'] . '</td>
            <td>' . $tarefa['concluida'] . '</td>
            <td>
            <div class="d-flex gap-3">
                <form action="../../functions/editar.php" method="post">
                  <input hidden name="id" value="' . $tarefa['id'] . '"></input>
                  <button ' . $esconder . ' type="submit" class="btn btn-sm btn-warning">
                    Editar
                  </button>
                </form>

              <form action="../../functions/deletar.php" method="post">
                <input hidden name="id" value="' . $tarefa['id'] . '"></input>
                <button onclick="return confirm(`Tem certeza que deseja excluir esta tarefa?`)" class="btn btn-sm btn-danger" type="submit">Excluir</button>
              </form>

            <form action="../../functions/concluir.php" method="post">
              <input name="id" value="' .  $tarefa['id']  . '" hidden></input>
              <button ' . $esconder . 'type="submit" class="btn btn-sm btn-primary">
                Concluir
              </button>
            </form>
            </div>
          </td>
        </tr>';
    }
  }
}
