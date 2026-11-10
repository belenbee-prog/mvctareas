<?php

namespace AP35\View;

class MainView
{
    const MAIN = __DIR__ . '/../../public/assets/main.html';
    const ERROR = __DIR__ . '/../../public/assets/404.html';

    /**
     * Se encarga de invocar la página de inicio del servidor
     * @return void
     */
    public function render(): void
    {
        require_once self::MAIN;
    }

    /**
     * Se encarga de invocar la página de error
     * @return void
     */
    public function error(string $error): void
    {
        require_once self::ERROR;
    }
}
