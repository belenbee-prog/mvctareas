<?php

namespace AP35\View;

class ListTasksView
{
    const HTML = __DIR__ . '/../../public/assets/tareas.html';

    public function render(?array $tasks = null): void
    {
        $tasks = $tasks ?? [];
        require_once self::HTML;
    }
}
