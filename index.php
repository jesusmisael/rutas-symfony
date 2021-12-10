<?php

use App\config\App;
use App\Integra\Framework;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Router;

require_once './vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
date_default_timezone_set('America/Mexico_City');
error_reporting(E_ALL);//muestra todos los errores
// error_reporting(E_ERROR | E_WARNING | E_PARSE);//muestra solo errores warning o errores de sintaxis
//error_reporting(E_ERROR | E_PARSE);//muestra todos los errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
session_start();

App::Config();

const DIR_ROOT = __DIR__;
const VIEW_PATH = __DIR__. '/resource/views/';

$request = Request::createFromGlobals();

$options = array(
    'cache_dir' => 'cache/', //directorio donde serán cacheadas las rutas
);
$requestContext = new RequestContext();
$requestContext->fromRequest(Request::createFromGlobals());
$fileLocator = new FileLocator(array('app/config/')); // nos ubicamos en la carpeta app/config
$loader = new YamlFileLoader($fileLocator); //creamos el loader
$router = new Router($loader, 'routing.yml', $options, $requestContext);
$routes = $router->getRouteCollection();
$matcher = new UrlMatcher($routes, $requestContext);

$controllerResolver = new ControllerResolver();
$argumentResolver = new ArgumentResolver();

$framework = new Framework($matcher, $controllerResolver, $argumentResolver);
$response = $framework->handle($request);

$response->send();
