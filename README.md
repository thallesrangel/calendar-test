# Celendário de Aulas de Karatê

Tecnologias
    - Docker
    - Docker-compose
    - Nginx
    - PHP 8.1
    - Laravel 8
    - MySQL
    - Sweetalert2
    
Arquitetura
    - MVC

Patterns: 
    - Repository
    - Services

## Start no projeto

```docker-compose up -d --build```

## Rodar migrations

Dentro do container PHP, executar no terminal o comando:
```php artisan migrate:refresh --seed```

## Usuários para login
```
email: thalles@gmail.com
senha: 123
Permissão: Administrador
```

```
email: micaelly@gmail.com
senha: 123
Permissão: Aluno
```

```
email: vicente@gmail.com
senha: 123
Permissão: Aluno
```

```
email: jaqueline@gmail.com
senha: 123
Permissão: Aluno
```
