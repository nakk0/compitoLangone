<?php

    class Impianto implements JsonSerializable{

        private $nome;
        private $lat;
        private $long;
        private $rilevatori = [];

        //$nome, $lat, $long, $rilevatori
        public function __construct(){
            $content = json_decode(file_get_contents("./data/data.json"), true);
            $this->nome = $content["nome"];
            $this->lat = $content["lat"];
            $this->long = $content["long"];
            $this->rilevatori = $content["rilevatori"];
            // $this->nome = $nome;
            // $this->lat = $lat;
            // $this->long = $long;
            // $this->rilevatori = $rilevatori;
        }

        public function getNome(){
            return $this->nome;
        }
        public function getLat(){
            return $this->lat;
        }
        public function getLong(){
            return $this->long;
        }
        public function getRilevatori(){
            return $this->rilevatori;
        }

        public function jsonSerialize(){
            return [
                "nome" => $this->nome,
                "lat" => $this->lat,
                "long" => $this->long,
                "rilevatori" => json_encode($this->rilevatori)
            ];
        }

    }