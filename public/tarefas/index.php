<?php
require __DIR__ . "/../../functions/listar.php";
$repository = new TarefaRepository();
$tarefas = $repository->listar();
?>

<!doctype html>
<html lang="pt-br" data-bs-theme="dark">

<head>
  <title>Tarefas</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS v5.3.8 -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
    crossorigin="anonymous" />
</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
    <div class="container d-flex flex-column mt-3">
      <a class="btn btn-sm btn-danger" style="width: 50px;" href="../home/index.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
          <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
        </svg></a>
      <?php if (empty($tarefas)): ?>
        <p class="text-center">Nenhuma tarefa criada até o momento.</p>
      <?php else: ?>
        <table class="table table-borderless">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Titulo</th>
              <th scope="col">Descricao</th>
              <th scope="col">Responsavel</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            <?php listarTabela(); ?>
          </tbody>
        </table>
      <?php endif; ?>


    </div>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Bundle (includes Popper) -->
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>
</body>

</html>