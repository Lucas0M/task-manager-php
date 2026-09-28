<?php


class HistoricoRepository
{
  private $pdo;
  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
  }

  public function inserir(string $tarefa_id, int $acao)
  {
    $sql = 'INSERT INTO historico (chamado_id, acao) VALUES (:tarefa_id, :acao)';

    $stmt = $this->pdo->prepare($sql);

    $stmt->bindParam(':tarefa_id', $tarefa_id);
    $stmt->bindParam(':acao', $acao);

    $stmt->execute();
  }
}
