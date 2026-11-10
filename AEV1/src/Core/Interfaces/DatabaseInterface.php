<?php

namespace AP35\Core\Interfaces;

/**
 * Mediante esta interfaz vamos a garantizar que la clase que la implemente contenga obligadamente la función executeSQL
 */
interface DatabaseInterface
{
    public function executeSQL($sql);
}