<?php

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

const APP_PATH = 'app/'; //contiene la ruta hasta app
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
