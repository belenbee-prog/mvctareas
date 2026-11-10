<?php

namespace AP35\Core\Interfaces;

/**
 * Esta interfaz nos permite garantizar que usemos el método que usemos al implemente como mínimo debe garantizar el método getRoutes.
 */
interface RouteInterface
{
    public function getRoutes();
}