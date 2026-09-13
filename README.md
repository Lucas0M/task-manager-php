# Task Manager

Simples gerenciador de tarefas desenvolvido em PHP com SQLite.

## Tecnologias

- PHP 8.2
- SQLite3
- Apache

## Como executar

### Com Docker (recomendado)

```bash
docker compose up --build
```

Acesse: http://localhost:8080

### Sem Docker

Copie os arquivos para o diretório do seu servidor (ex: XAMPP `htdocs`) e acesse via browser.

## Estrutura do projeto

```
├── public/         # Páginas públicas (home, tarefas)
├── database/       # Conexão e banco SQLite
├── functions/      # Funções auxiliares
├── includes/       # Componentes reutilizáveis
└── repository/     # Acesso a dados
```

## Funcionalidades

- Listar tarefas
- Criar tarefas
- Editar tarefas
- Excluir tarefas
