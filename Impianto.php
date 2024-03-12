<?php 
    class Impianto implements JsonSerializable{
        protected $nome;
        protected $latitudine;
        protected $longitudine;
        public $lista_dispositiviAllarme;
        public $lista_rilevatoriPressione;
        public $lista_rilevatoriUmidita;
        
        public function __construct($nome, $latitudine, $longitudine) {
            $this->nome = $nome;
            $this->latitudine = $latitudine;
            $this->longitudine = $longitudine;
            $this->lista_dispositiviAllarme = [
                new DispositivoDiAllarme("Allarme1", 123245),
            ];
            $this->lista_rilevatoriPressione = [
                new RilevatoreDiPressione("RilPressione1", 400, 5678, "acqua")
            ];
            $this->lista_rilevatoriUmidita = [ 
                new RilevatoreDiUmidita("RilUmidita1", 200, 2453, "aria"),
            ];
        }

        public function getAllarmi() {
            return $this->lista_dispositiviAllarme;
        }
        


        public function jsonSerialize() {
            $a = [
                "nome"=> $this->nome,
                "latitudine"=> $this->latitudine,
                "longitudine: "=> $this->longitudine,  
                "lista dispositiviAllarme"=>$this->lista_dispositiviAllarme,
                "lista lista_rilevatoriPressione"=>$this->lista_rilevatoriPressione,
                "lista lista_rilevatoriUmidita"=>$this->lista_rilevatoriUmidita,
            ];
            return $a;
        }
    }



?>