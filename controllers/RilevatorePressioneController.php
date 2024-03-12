<?php 
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

include_once "Impianto.php";
include_once "DispositivoDiAllarme.php";
include_once "Rilevatore.php";
include_once "RilevatoreDiUmidita.php";
include_once "RilevatoreDiPressione.php";

class RilevatorePressioneController {

    function index(Request $request, Response $response, $args) {
        $impianto = new Impianto("Meucci", 600, 344);

        if (!empty($impianto->lista_rilevatoriPressione)) {
            $s = $impianto->lista_rilevatoriPressione;
        }
        else {
            $s = "Non ci sono rilevatori di pressione";
        }

        $response->getBody()->write(json_encode($s));       
        return $response->withHeader('Content-Type', 'application/json');
    }

    function show(Request $request, Response $response, $args) {
        $impianto = new Impianto("Meucci", 600, 344);

        $idCercato = $args['identificativo'];
        $rilCercato = null;

        foreach ($impianto->lista_rilevatoriPressione as $rilpressione) {
            if (strtolower($rilpressione->getIdentificativo()) === strtolower($idCercato)) {
                $rilCercato = $rilpressione;
                break;
            }
        }
        
        if (!empty($rilCercato)) {
            $response->getBody()->write(json_encode($rilCercato));
        } else {
            $response->getBody()->write("Rilevatore di pressione non presente");
        }
        
        return $response->withHeader('Content-Type', 'application/json');
    }

    function showMisurazioni(Request $request, Response $response, $args) {
        $impianto = new Impianto("Meucci", 600, 344);

        $idCercato = $args['identificativo'];
        $rilCercato = null;

        foreach ($impianto->lista_rilevatoriPressione as $rilpressione) {
            if (strtolower($rilpressione->getIdentificativo()) === strtolower($idCercato)) {
                $rilCercato = $rilpressione;
                break;
            }
        }
        
        if (!empty($rilCercato)) {
            $response->getBody()->write(json_encode($rilCercato->misurazioni));
        } else {
            $response->getBody()->write("Rilevatore di pressione non presente");
        }

        return $response->withHeader('Content-Type', 'application/json');
    }

    function showMisurazioniValore(Request $request, Response $response, $args) {
        $impianto = new Impianto("Meucci", 600, 344);

        $idCercato = $args['identificativo'];
        $min = $args['valore_minimo'];
        $rilCercato = null;

        foreach ($impianto->lista_rilevatoriPressione as $rilpressione) {
            if (strtolower($rilpressione->getIdentificativo()) === strtolower($idCercato)) {
                $rilCercato = $rilpressione;
                break;
            }
        }
        
        if (!empty($rilCercato)) {
            foreach ($rilCercato->misurazioni as $misurazione) {
                foreach ($misurazione as $data => $value) {
                    if ($misurazione[$data] === $min) {
                        $response->getBody()->write(json_encode($misurazione));
                    }
                }
            }
            
        } else {
            $response->getBody()->write("Rilevatore di pressione non presente");
        }

        return $response->withHeader('Content-Type', 'application/json');
    }
 
}

?>