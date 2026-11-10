<?php

namespace AP35\Core;

use AP35\Controller\MainController;
use AP35\Core\Interfaces\RequestInterface;
use AP35\Core\Interfaces\RouteInterface;

class Dispatcher
{
    private $routeList;
    private RequestInterface $currentRequest;

    /**
     *  Para poder crear un objeto Dispatcher debemos enviar las rutas de la aplicación y la URI del navegador
     *  para que el dispatcher pueda redirigir al controller correcto con los parámetros adecuados.
     * @param RouteInterface $routeCollection
     * @param RequestInterface $request
     */
    public function __construct(RouteInterface $routeCollection, RequestInterface $request)
    {
        $this->routeList = $routeCollection->getRoutes();
        $this->currentRequest = $request;
        $this->dispatch();
    }

    /**
     * Redirigimos la aplicación al controlador adecuado.
     */
    private function dispatch()
    {
        if (isset($this->routeList[$this->currentRequest->getRoute()])) {
            $controllerClass = "AP35\Controller\\" . $this->routeList[$this->currentRequest->getRoute()]["controller"];
            $controller = new $controllerClass;
            $action = $this->routeList[$this->currentRequest->getRoute()]["action"];
            if (!is_null($this->currentRequest->getParams()) && $this->currentRequest->getParams() !== []) {
                $controller->$action(...$this->currentRequest->getParams());
            } else {
                $controller->$action();
            }
        } else {
            (new MainController())->noRuta();
        }
    }
}
