<?php

const PATH = __DIR__ . '/tarefasdb.sqlite3';

class Database
{
  private $conexao;

  public function __construct()
  {
    try {
      $this->conexao = new PDO('sqlite:' . PATH);
      $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die("Erro ao conectar com o banco: " . $e->getMessage());
    }
  }

  public function getConexao()
  {
    return $this->conexao;
  }
}
