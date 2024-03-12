<?php 
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

include_once "Impianto.php";
include_once "DispositivoDiAllarme.php";
include_once "Rilevatore.php";
include_once "RilevatoreDiUmidita.php";
include_once "RilevatoreDiPressione.php";

class ImpiantoController {

    function index(Request $request, Response $response, $args) {
        $impianto = new Impianto("Meucci", 600, 344);
        $response->getBody()->write(json_encode($impianto));       
        return $response->withHeader('Content-Type', 'application/json');
    }

}

?>