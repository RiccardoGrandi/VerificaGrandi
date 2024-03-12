<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

include_once 'controllers/ImpiantoController.php';
include_once 'controllers/DispositivoAllarmeController.php';
include_once 'controllers/RilevatorePressioneController.php';


$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});

$app->get('/impianti', 'ImpiantoController:index');

$app->get('/dispositivi_di_allarme', 'DispositivoAllarmeController:index');
$app->get('/dispositivi_di_allarme/{identificativo}', 'DispositivoAllarmeController:show');

$app->get('/rilevatori_di_pressione', 'RilevatorePressioneController:index');
$app->get('/rilevatori_di_pressione/{identificativo}', 'RilevatorePressioneController:show');
$app->get('/rilevatori_di_pressione/{identificativo}/misurazioni', 'RilevatorePressioneController:showMisurazioni');
$app->get('/rilevatori_di_pressione/{identificativo}/misurazioni/maggiore_di/{valore_minimo}', 'RilevatorePressioneController:showMisurazioniValore');



$app->run();
