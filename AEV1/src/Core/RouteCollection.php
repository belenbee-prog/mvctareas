<?php

namespace AP35\Core;

use AP35\Core\Interfaces\RouteInterface;

/**
 * Clase que se encarga de obtener las rutas por defecto que tiene la aplicación
 */
class RouteCollection implements RouteInterface
{
    private $routes;

    /**
     * Cargamos en la variable routes los datos de las rutas que tiene la aplicación defínidas como posibles URI accesibles
     */
    function __construct()
    {
        $this->routes = json_decode(file_get_contents(__DIR__ . "/../../config/routes.json"), true);
    }

    /**
     * Get the value of routes
     * ESTE MÉTODO SE HA IMPLEMENTADO SÍ O SÍ PORUQE LO DEFINE EL INTERFAZ
     */
    public function getRoutes()
    {
        return $this->routes;
    }
}

?>
