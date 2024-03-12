<?php 
    class Rilevatore implements JsonSerializable {
        protected $identificativo;
        protected $unitaDiMisura; 
        protected $sogliaDiAllarme; 
        protected $codiceSeriale;
        public $misurazioni;

        
        public function __construct($identificativo, $unitaDiMisura, $sogliaDiAllarme, $codiceSeriale) {
            $this->identificativo = $identificativo;
            $this->misurazioni = array("10/01/2015"=>35, "28/12/2019"=>69);
            $this->unitaDiMisura = $unitaDiMisura;
            $this->sogliaDiAllarme = $sogliaDiAllarme;
            $this->codiceSeriale = $codiceSeriale;
        }

        // public function addMisurazioni($data, $valore) {
        //     $this->misurazioni["$data"] = $valore;
        // }

        public function getIdentificativo() {
            return $this->identificativo;
        }

        // public function getMisurazioni() {
        //     return $this->misurazioni;
        // }

        public function jsonSerialize() {
            $a = [
                "identificativo"=> $this->identificativo,
                "unitaDiMisura"=> $this->unitaDiMisura,
                "sogliaDiAllarme"=> $this->sogliaDiAllarme,
                "codiceSeriale"=> $this->codiceSeriale,
                "listaMisurazioni"=>$this->misurazioni
            ];
            
            return $a;
        }
    }


?>