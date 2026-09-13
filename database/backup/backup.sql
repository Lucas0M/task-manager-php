CREATE TABLE tarefas(
  id INTEGER PRIMARY KEY,
  titulo TEXT NOT NULL,
  descricao TEXT NOT NULL,
  responsavel TEXT NOT NULL,
  concluida TEXT DEFAULT 'Pendente' NOT NULL
);