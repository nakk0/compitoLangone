<?php

    class RilevatoreTemperatura extends Rilevatore implements JsonSerializable{
        private $tipologia; //acqua o aria
        private $id = "temperatura";
        private $unitaMisura = "C";

        public function __construct($misurazioni, $codiceSeriale, $tipologia){
            $this->tipologia = $tipologia;
            parent::__construct($this->id, $misurazioni, $this->unitaMisura, $codiceSeriale);
        }

        public function getTipologia(){
            return $this->tipologia;
        }

        public function jsonSerialize(){
            return [
                "id" => $this->id,
                "unitaMisura" => $this->unitaMisura,
                "codiceSeriale" => $this->getCodiceSeriale(),
                "tipologia" => $this->tipologia,
                "misurazioni" => json_encode($this->getMisurazioni())
            ];
        }
    }