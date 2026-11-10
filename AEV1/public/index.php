<?php
//Para este caso lo que tenemos que hacer es indicarle al index donde está el archivo de autoload de Composer.
include_once "../vendor/autoload.php";

use AP35\Core\{Dispatcher, RouteCollection, Request};
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

//Creamos un objeto que contenga todas las rutas de la aplicación.
$route = new RouteCollection();
//Creamos un objeto que contenga la ruta que hemos recibido desde el navegador.
$request = new Request();
//Ahora creamos un objeto que se encarga de redirigir al controller que corresponda la aplicación
$dispatcher = new Dispatcher($route, $request);
