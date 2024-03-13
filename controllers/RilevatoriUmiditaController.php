<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

    class RilevatoriUmiditaController{
        public function list(Request $request, Response $response, array $args){
            $impianto = new Impianto();
            $rilevatori = $impianto->getRilevatori();
            $rilevatoriUmidita = [];


            foreach($rilevatori as $r){
                if($r->id == "umidita"){
                    $rilevatoriUmidita[] = $r;
                }
            }

            $response->getBody()->write(json_encode($rilevatoriUmidita)); //should be rilevatoriUmidita
            return $response;
        }

        public function find(Request $request, Response $response, array $args){
            $impianto = new Impianto();
            $id = $args["id"];
            $rilevatori = $impianto->getRilevatori();
            $rilevatoriUmidita = [];
            foreach($rilevatori as $r){
                if($r->id == "umidita"){
                    $rilevatoriUmidita[] = $r;
                }
            }

            foreach($rilevatoriUmidita as $r){
                if($r->codiceSeriale == $id){
                    $response->getBody()->write(json_encode($r));
                    break;
                }
            }
            return $response;

        }

        public function findMisurazioni(Request $request, Response $response, array $args){
            $impianto = new Impianto();
            $id = $args["id"];
            $rilevatori = $impianto->getRilevatori();
            $rilevatoriUmidita = [];
            foreach($rilevatori as $r){
                if($r->id == "umidita"){
                    $rilevatoriUmidita[] = $r;
                }
            }

            foreach($rilevatoriUmidita as $r){
                if($r->codiceSeriale == $id){
                    $response->getBody()->write(json_encode($r->misurazioni));
                    break;
                }
            }
            return $response;

        }

        public function findMisurazioniAbove(Request $request, Response $response, array $args){
            $impianto = new Impianto();
            $id = $args["id"];
            $value = $args["value"];
            $rilevatori = $impianto->getRilevatori();
            $rilevatoriUmidita = [];
            foreach($rilevatori as $r){
                if($r->id == "umidita"){
                    $rilevatoriUmidita[] = $r;
                }
            }

            $misurazioniAbove = [];

            foreach($rilevatoriUmidita as $r){
                if($r->codiceSeriale == $id){
                    foreach($r->misurazioni as $m){
                        if($m->valore >= $value){
                            $misurazioniAbove[] = $m;
                        }
                    }
                }
            }
            $response->getBody()->write(json_encode($misurazioniAbove));
            return $response;

        }
    }