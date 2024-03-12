<?php 
    class RilevatoreDiUmidita extends Rilevatore implements JsonSerializable{
        protected $posizione;
        
        public function __construct($identificativo, $sogliaDiAllarme, $codiceSeriale, $posizione) {
            parent::__construct($identificativo, '%', $sogliaDiAllarme, $codiceSeriale);
            $this->posizione = $posizione;
        }

        public function jsonSerialize() {
            $a = [
                parent::getIdentificativo()=>parent::jsonSerialize(),
                "posizione"=> $this->posizione,
            ];
            return $a;
        }

    }

?>