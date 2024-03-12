<?php 
    class DispositivoDiAllarme  implements JsonSerializable{
        protected $identificativo;
        protected $numeroDiTelefono;
        
        public function __construct($identificativo, $numeroDiTelefono) {
            $this->identificativo = $identificativo;
            $this->numeroDiTelefono = $numeroDiTelefono;
        }

        public function getIdentificativo() {
            return $this->identificativo;
        }

        public function jsonSerialize() { 
            $a = [
                "identificativo"=> $this->identificativo,
                "numeroDiTelefono"=> $this->numeroDiTelefono
            ];
            return $a;
        }
    }


?>