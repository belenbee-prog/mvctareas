<?php

namespace AP35\Controller;

use AP35\View\MainView;

class MainController
{
    public function main()
    {
        $view = new MainView();
        $view->render();
    }

    /**
     * Ruta no encontrada u otros errores de navegación (vista 404).
     */
    public function noRuta(string $msg = ''): void
    {
        $view = new MainView();
        $view->error($msg);
    }
}
