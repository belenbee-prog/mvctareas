<?php

namespace AP35\View;

class DetailTaskView
{
    const HTML = __DIR__ . '/../../public/assets/detalle.html';

    public function render(?array $task = null): void
    {
        require_once self::HTML;
    }
}
