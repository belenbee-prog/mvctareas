<?php

namespace AP35\Controller;

use AP35\Model\TaskRepository;
use AP35\View\CreateTask;
use AP35\View\DetailTaskView;
use AP35\View\ListTasksView;

class TaskController
{
    public function list()
    {
        $taskRepository = new TaskRepository();
        $tasks = $taskRepository->findAll();
        $view = new ListTasksView();
        $view->render($tasks);
    }

    /**
     * Detalle por slug (/detalle/configurar-entorno-docker).
     */
    public function detail($slug = null): void
    {
        if ($slug === null || $slug === '') {
            (new MainController())->noRuta('No se han recibido parámetros');
            return;
        }

        $repository = new TaskRepository();
        $task = $repository->findBySlug($slug);

        if (is_null($task)) {
            (new MainController())->noRuta('No existen datos para la tarea en la BB.DD.');
            return;
        }

        $view = new DetailTaskView();
        $view->render($task);
    }

    public function new()
    {
        //todo : mostrar un formulario
        $createTask = new CreateTask();
        $createTask->render();

    }

    public function save()
    {
        //comprobacion metodo formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //comprobacion que esten los campos post
            if (isset($_POST['title']) && isset($_POST['description'])) {
                //todo: modelo guardar tarea
                $TaskRepository = new TaskRepository();
                $title = $_POST['title'];
                $description = $_POST['description'];
                $TaskRepository->saveTask($title, $description);
                //todo: mostrar listado
                $this->list();
            }
        }
    }

    public function delete($id)
    {
        $taskRepository = new TaskRepository();
        $task = $taskRepository->deleteTask($id);
        $this->list();
    }

    public function deleteMultiple()
    {
        //comprobacion metodo formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //comprobacion que esten los campos post
            if (isset($_POST['idArray'])) {
                $taskRepository = new TaskRepository();
                $idArray = $_POST['idArray'];
                foreach ($idArray as $id) {
                    $taskRepository->deleteTask($id);
                }

                $this->list();
            }
        }
    }
}
