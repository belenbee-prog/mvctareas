<?php

namespace AP35\Model;

use AP35\Core\Database;

class TaskRepository
{

    /**
     * Devuelve todos los registros de la tabla task.
     */
    public function findAll()
    {
        $db = Database::getInstance();
        $tasks = $db->executeSQL("SELECT * FROM task");
        foreach ($tasks as $index => $task) {
            $tasks[$index]["color"] = "white";

            if ($task["due_date"] > date("Y-m-d")) {
                $tasks[$index]["color"] = "red";
            }
        }

        return $tasks;
    }

    /**
     * Devuelve una tarea por su slug.
     */
    public function findBySlug($slug)
    {
        $db = Database::getInstance();
        $task = $db->executeSQL("SELECT * FROM task WHERE slug = '$slug'");
        foreach ($task as $index => $value) {
                $task[$index]["color"] = "white";

                if ($value["due_date"] > date("Y-m-d")) {
                    $task[$index]["color"] = "red";
                }
            }
        return array_shift($task);
    }

    public function saveTask($title, $description)
    {
        $db = Database::getInstance();
        $slug = str_replace(' ', '-', $title);
        //comprobar que no exista
        $exists = $db->executeSQL("SELECT COUNT(*) AS total FROM task WHERE slug = '$slug'");

        if ($exists[0]['total'] > 0) {
            die("Ese slug ya existe");
        }

        $db->executeSQLnoreturn("INSERT INTO task (title, slug, description, created_at, due_date) 
            VALUES ('$title', '$slug', '$description' , NOW() , NOW())");
    }

    public function deleteTask($id)
    {
        $db = Database::getInstance();
        $db->executeSQLnoreturn("DELETE FROM task where id = $id");
    }

}
