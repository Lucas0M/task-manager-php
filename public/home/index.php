<?php
require __DIR__ . '/../../includes/tratarErros.php';

?>

<!doctype html>
<html lang="pt-br" data-bs-theme="dark">

<head>
  <title>Home</title>
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
    <div class="container d-flex flex-column align-items-center justify-content-center gap-5 min-vh-100">
      <h2>Gerenciador de Tarefa</h2>
      <form action="../../includes/tarefa.php" method="post">
        <div class="form-div d-flex flex-column text-center gap-3">
          <input placeholder="Título" class="form-control" name="titulo" id="titulo" type="text">
          <input placeholder="Descrição" class="form-control" name="descricao" id="descricao" type="text">
          <input placeholder="Responsável" class="form-control" name="responsavel" id="responsavel" type="text">
          <button class="btn btn-sm btn-primary" type="submit">Criar</button>
        </div>
      </form>
      <a class="btn btn-sm btn-success" href="../tarefas/index.php">Ver Tarefas</a>
      <div class="validaErroDiv">
        <?php exibirMensagem(); ?>
      </div>
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