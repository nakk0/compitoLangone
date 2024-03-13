<?php

    class RilevatoreUmidita extends Rilevatore implements JsonSerializable{
        private $posizione; //terra o aria

        public function __construct($misurazioni, $codiceSeriale, $posizione){
            $this->posizione = $posizione;
            parent::__construct("umidita", $misurazioni, "%", $codiceSeriale);
        }

        public function getPosizione(){
            return $this->posizione;
        }

        public function jsonSerialize(){
            return [
                "id" => $this->id,
                "unitaMisura" => $this->unitaMisura,
                "codiceSeriale" => $this->getCodiceSeriale(),
                "posizione" => $this->posizione,
                "misurazioni" => json_encode($this->getMisurazioni())
            ];
        }
    }