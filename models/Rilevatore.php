<?php

    class Rilevatore{
        private $id; //umidita o temperatura
        private $misurazioni = [];
        private $unitaMisura;
        private $codiceSeriale;

        public function __construct($id, $misurazioni, $unitaMisura, $codiceSeriale){
            $this->id = $id;
            $this->misurazioni = $misurazioni;
            $this->unitaMisura = $unitaMisura;
            $this->codiceSeriale = $codiceSeriale;
        }

        public function getId(){
            return $this->id;
        }
        public function getMisurazioni(){
            return $this->misurazioni;
        }
        public function getUnitaMisura(){
            return $this->unitaMisura;
        }
        public function getCodiceSeriale(){
            return $this->codiceSeriale;
        }

    }