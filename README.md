# Simple inicio de sesión

PHP y MySQL

## Base de datos

### Tabla roles

| # | Nombre | Tipo        | Cotejamiento        | Atributos | Nulo | Predeterminado | Comentarios | Extra           |
|---|--------|-------------|---------------------|-----------|------|----------------|-------------|-----------------|
| 1 | id     | int(11)     |                     |           | No   | Ninguna        |             | AUTO_INCREMENT  |
| 2 | nombre | varchar(255) | utf8mb4_general_ci |           | Sí   | NULL           |             |                 |

### Tabla usuarios

| # | Nombre   | Tipo        | Cotejamiento        | Atributos | Nulo | Predeterminado | Comentarios | Extra           |
|---|----------|-------------|---------------------|-----------|------|----------------|-------------|-----------------|
| 1 | id       | int(11)     |                     |           | No   | Ninguna        |             | AUTO_INCREMENT  |
| 2 | usuario  | varchar(255) | utf8mb4_general_ci |           | Sí   | NULL           |             |                 |
| 3 | password | varchar(255) | utf8mb4_general_ci |           | Sí   | NULL           |             |                 |
| 4 | email    | varchar(255) | utf8mb4_general_ci |           | Sí   | NULL           |             |                 |
| 5 | rol_id   | int(11)     |                     |           | Sí   | NULL           |             |                 |
