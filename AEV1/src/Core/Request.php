<?php

namespace AP35\Core;

use AP35\Core\Interfaces\RequestInterface;

class Request implements RequestInterface
{
    private $route;
    private $params;

    /**
     * Para este ejemplo vamos a usar la implementación de las rutas por un sistema más adecuado para las
     * herramientas SEO del tipo: /read/intro-to-symfony en lugar de index.php?ruta=read&params=intro-to-symfony.
     */
    public function __construct()
    {
        //Lo primero que debemos hacer es obtener la ruta del navegador mediante la URI
        $rawRoute = $_SERVER["REQUEST_URI"];
        //Separamos la URI en las diferentes partes que contine, separadas por la "/" de las carpetas
        //y lo guardamos en un array.
        $rawRouteElements = explode("/", $rawRoute);
        //El primer elementos(0) lo descartamos porque es el texto de la URI que se encuentra antes de la "/"
        //Nos quedamos con el segundo elemento(1) que definimos como la ruta que va a usar nuestra aplicación
        $this->route = "/" . $rawRouteElements[1];
        //Guardamos todos los parametros que hayamos recibido dentro de un nuevo array que comienza por el elemento tercero(2)
        $this->params = array_slice($rawRouteElements, 2);

    }

    /**
     * Get the value of route
     *  ESTE MÉTODO SE HA IMPLEMENTADO SÍ O SÍ PORUQE LO DEFINE EL INTERFAZ
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * Get the value of parms
     *  ESTE MÉTODO SE HA IMPLEMENTADO SÍ O SÍ PORUQE LO DEFINE EL INTERFAZ
     */
    public function getParams()
    {
        return $this->params;
    }
}

?>