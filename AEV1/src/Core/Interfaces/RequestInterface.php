<?php

namespace AP35\Core\Interfaces;

/**
 * Esta interfaz nos permite garantizar que usemos el método que usemos al implemente como mínimo debe garantizar los metodos getParams y getRoute.
 */
interface RequestInterface
{
    public function getRoute();

    public function getParams();
}