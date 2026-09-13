<?php

require __DIR__ . '/../database/Database.php';

class TarefaRepository extends Database
{
  public function __construct()
  {
    return parent::__construct();
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

  public function deletar(int $id)
  {
    $sql = 'DELETE FROM tarefas WHERE id = :id';

    $stmt = parent::getConexao()->prepare($sql);
    $stmt->bindParam(':id', $id);

    $stmt->execute();
  }

  public function editar(string $titulo, string $descricao, string $responsavel, string $concluida, string $id)
  {
    $sql = 'UPDATE tarefas SET titulo = :titulo, descricao = :descricao, responsavel = :responsavel, concluida = :concluida WHERE id = :id';

    $stmt = parent::getConexao()->prepare($sql);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':responsavel', $responsavel);
    $stmt->bindParam(':concluida', $concluida);
    $stmt->bindParam(':id', $id);

    $stmt->execute();
  }
}
