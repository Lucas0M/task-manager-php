<?php

require __DIR__ . '/HistoricoRepository.php';
require __DIR__ . '/../database/Database.php';


class TarefaRepository extends Database
{
  private $historico;
  private $CONCLUIDA = 'Concluida';

  public function __construct()
  {
    parent::__construct();
    $this->historico = new HistoricoRepository(parent::getConexao());
  }

  public function inserir(string $titulo, string $descricao, string $responsavel)
  {
    $sql = 'INSERT INTO tarefas (titulo, descricao, responsavel) VALUES (:titulo, :descricao, :responsavel)';

    $stmt = parent::getConexao()->prepare($sql);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':responsavel', $responsavel);

    $stmt->execute();
  }

  public function listar()
  {
    $sql = 'SELECT * FROM tarefas';

    $stmt = parent::getConexao()->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  public function listarPorId(string $id)
  {
    $sql = 'SELECT * FROM tarefas WHERE id = :id';

    $stmt = parent::getConexao()->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
  }

  public function deletar(int $ativo, string $id)
  {
    try {
      $pdo = parent::getConexao();

      $pdo->beginTransaction();

      $sql = 'UPDATE tarefas SET ativo = :ativo WHERE id = :id';
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->bindParam(':ativo', $ativo);
      $stmt->execute();

      $this->historico->inserir($id, 1);

      $pdo->commit();
    } catch (PDOException $e) {
      $pdo->rollBack();
      echo "Transaction Failed: " . $e->getMessage();
    }
  }

  public function editar(string $titulo, string $descricao, string $responsavel, string $id)
  {
    try {
      $pdo = parent::getConexao();

      $pdo->beginTransaction();

      $sql = 'UPDATE tarefas SET titulo = :titulo, descricao = :descricao, responsavel = :responsavel WHERE id = :id';

      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(':titulo', $titulo);
      $stmt->bindParam(':descricao', $descricao);
      $stmt->bindParam(':responsavel', $responsavel);
      $stmt->bindParam(':id', $id);

      $stmt->execute();

      $this->historico->inserir($id, 0);

      $pdo->commit();
    } catch (PDOException $e) {
      $pdo->rollBack();
      exit("Transaction Failed: " . $e->getMessage());
    }
  }

  public function concluir(string $id)
  {
    try {
      $pdo = parent::getConexao();

      $pdo->beginTransaction();

      $stmt = $pdo->prepare("UPDATE tarefas SET concluida = :concluida WHERE id = :id");
      $stmt->bindParam(':id', $id);
      $stmt->bindParam(':concluida', $this->CONCLUIDA);
      $stmt->execute();

      $pdo->commit();
    } catch (PDOException $e) {
      $pdo->rollBack();
      exit("Transaction Failed: " . $e->getMessage());
    }
  }
}
