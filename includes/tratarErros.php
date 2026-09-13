<?php

session_start();

function getErrors()
{
  if (!isset($_SESSION['ERRORS'])) return [];

  return $_SESSION['ERRORS'] ?? [];
}

function mostrarErros()
{
  $errors = getErrors();

  foreach ($errors as $err) {
    echo "<p class='text-danger'>" . $err . "<p>";
  }

  unset($_SESSION['ERRORS']);
}

function exibirMensagem()
{
  if (!empty(getErrors())) {
    mostrarErros();
    return;
  }
  if (isset($_GET['created']) && $_GET['created'] === 'success') {
    echo "<p class='text-success'>Tarefa criada com sucesso!</p>";
  } else if (isset($_GET['updated']) && $_GET['updated'] === 'success') {
    echo "<p class='text-success'>Tarefa editada com sucesso!</p>";
  }
}
