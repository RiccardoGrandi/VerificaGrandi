<?php 
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

include_once "Impianto.php";
include_once "DispositivoDiAllarme.php";
include_once "Rilevatore.php";
include_once "RilevatoreDiUmidita.php";
include_once "RilevatoreDiPressione.php";

class DispositivoAllarmeController {

    function index(Request $request, Response $response, $args) {
        $impianto = new Impianto("Meucci", 600, 344);

        if (!empty($impianto->lista_dispositiviAllarme)) {
            $s = $impianto->lista_dispositiviAllarme;
        }
        else {
            $s = "Non ci sono dispositivi di allarme";
        }

        $response->getBody()->write(json_encode($s));       
        return $response->withHeader('Content-Type', 'application/json');
    }

    function show(Request $request, Response $response, $args) {
        $impianto = new Impianto("Meucci", 600, 344);

        $idCercato = $args['identificativo'];
        $allarmeCercato = null;

        foreach ($impianto->lista_dispositiviAllarme as $allarme) {
            if (strtolower($allarme->getIdentificativo()) === strtolower($idCercato)) {
                $allarmeCercato = $allarme;
                break;
            }
        }
        
        if (!empty($allarmeCercato)) {
            $response->getBody()->write(json_encode($allarmeCercato));
        } else {
            $response->getBody()->write("Allarme non presente");
        }
        
        return $response->withHeader('Content-Type', 'application/json');
    }
}

?>