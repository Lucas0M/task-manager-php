CREATE TABLE tarefas(
  id INTEGER PRIMARY KEY,
  titulo TEXT NOT NULL,
  descricao TEXT NOT NULL,
  responsavel TEXT NOT NULL,
  ativo INTEGER DEFAULT 1,
  concluida TEXT DEFAULT 'Pendente' NOT NULL
);

CREATE TABLE historico(
  id INTEGER PRIMARY KEY,
  chamado_id INTEGER NOT NULL,
  acao INTEGER NOT NULL,
  created_at TEXT NOT NULL DEFAULT (datetime('now')),
  FOREIGN KEY (chamado_id) REFERENCES tarefas(id)
);
