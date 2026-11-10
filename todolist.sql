CREATE DATABASE IF NOT EXISTS `todolist`
    DEFAULT CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE `todolist`;

DROP TABLE IF EXISTS `task`;

CREATE TABLE `task` (
    `id` int NOT NULL AUTO_INCREMENT,
    `title` varchar(255) NOT NULL,
    `slug` varchar(255) DEFAULT NULL,
    `description` text NOT NULL,
    `created_at` date NOT NULL,
    `due_date` date NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `task_slug_unique` (`slug`)
);

-- slug remains nullable so the first insert exercise can introduce it later.
INSERT INTO `task`
    (`id`, `title`, `slug`, `description`, `created_at`, `due_date`)
VALUES
    (1, 'Configurar el entorno Docker', 'configurar-entorno-docker',
     'Arrancar los servicios y comprobar PHP y MariaDB.', '2026-09-11', '2026-09-18'),
    (2, 'Repasar arrays asociativos', 'repasar-arrays-asociativos',
     'Crear una lista de tareas y recorrerla con foreach.', '2026-09-11', '2026-09-18'),
    (3, 'Validar parámetros GET', 'validar-parametros-get',
     'Aceptar únicamente filtros conocidos.', '2026-09-14', '2026-09-25'),
    (4, 'Procesar un formulario POST', 'procesar-formulario-post',
     'Leer y comprobar los datos de un formulario.', '2026-09-18', '2026-10-02'),
    (5, 'Crear la clase Task', 'crear-clase-task',
     'Transformar el array asociativo en un objeto.', '2026-09-28', '2026-10-09'),
    (6, 'Separar una aplicación en MVC', 'separar-aplicacion-mvc',
     'Distribuir modelo, controlador y vista.', '2026-10-16', '2026-10-30'),
    (7, 'Configurar Composer', 'configurar-composer',
     'Añadir autoload PSR-4 al proyecto.', '2026-10-30', '2026-11-13'),
    (8, 'Completar el CRUD de tareas', 'completar-crud-tareas',
     'Implementar alta, consulta, edición y borrado.', '2026-11-20', '2026-12-04');
