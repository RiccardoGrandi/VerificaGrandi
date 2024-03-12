<?php 
    class RilevatoreDiPressione extends Rilevatore  implements JsonSerializable{
        protected $tipologia;
        
        public function __construct($identificativo, $sogliaDiAllarme, $codiceSeriale, $tipologia) {
            parent::__construct($identificativo, 'bar', $sogliaDiAllarme, $codiceSeriale);
            $this->tipologia = $tipologia;
        }

        public function jsonSerialize() { 
            $a = [
                parent::getIdentificativo()=>parent::jsonSerialize(),
                "tipologia"=> $this->tipologia
            ];
            return $a;
        }
    }

?>