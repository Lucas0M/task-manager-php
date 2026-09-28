<?php

require __DIR__ . '/../repository/TarefaRepository.php';

function listarTabela()
{
  $repository = new TarefaRepository();
  $tarefas = $repository->listar();

  foreach ($tarefas as $tarefa) {
    echo '
        <tr>
            <th scope="row">' . $tarefa['id'] . '</th>
            <td>' . $tarefa['titulo'] . '</td>
            <td>' . $tarefa['descricao'] . '</td>
            <td>' . $tarefa['responsavel'] . '</td>
            <td>' . $tarefa['concluida'] . '</td>
            <td>
              <form action="../../functions/editar.php" method="post">
                <input hidden name="id" value="' . $tarefa['id'] . '"></input>
                <button type="submit" class="btn btn-sm btn-warning">
                  Editar
                </button>
              </form>

              <form action="../../functions/deletar.php" method="post">
                <input hidden name="tarefa" value="' . $tarefa . '"></input>
                <button onclick="return confirm(`Tem certeza que deseja excluir esta tarefa?`)" class="btn btn-sm btn-danger" type="submit">Excluir</button>
              </form>

            <form action="../../functions/concluir.php" method="post">
              <button type="submit" class="btn btn-sm btn-primary">
                Concluir
              </button>
            </form>
          </td>
        </tr>';
  }
}
