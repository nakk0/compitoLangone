<?php

    class Misurazione implements JsonSerializable{
        private $data;
        private $valore;

        public function __construct($data,$valore){
            $this->data = $data;
            $this->valore = $valore;
        }

        public function getData(){
            return $this->data;
        }

        public function getValore(){
            return $this->valore;
        }

        public function jsonSerialize(){
            return [
                "data"=> $this->data,
                "valore"=> $this->valore,
            ];
        }

    }