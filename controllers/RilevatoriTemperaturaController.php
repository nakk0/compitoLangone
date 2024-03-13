<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

    class RilevatoriTemperaturaController{
        public function list(Request $request, Response $response, array $args){
            $impianto = new Impianto();
            $rilevatori = $impianto->getRilevatori();
            $rilevatoriTemperatura = [];
            $ok = false;

            foreach($rilevatori as $r){
                if($r->id == "temperatura"){
                    $rilevatoriTemperatura[] = $r;
                    $ok = true;
                }
            }

            $response->getBody()->write(json_encode($rilevatoriTemperatura));
            return $response->withStatus($ok? 200 : 404);
        }

        public function find(Request $request, Response $response, array $args){
            $impianto = new Impianto();
            $id = $args["id"];
            $rilevatori = $impianto->getRilevatori();
            $rilevatoriTemperatura = [];
            $ok = false;
            foreach($rilevatori as $r){
                if($r->id == "temperatura"){
                    $rilevatoriTemperatura[] = $r;
                }
            }

            foreach($rilevatoriTemperatura as $r){
                if($r->codiceSeriale == $id){
                    $response->getBody()->write(json_encode($r));
                    $ok = true;
                    break;
                }
            }
            return $response->withStatus($ok? 200 : 404);

        }

        public function findMisurazioni(Request $request, Response $response, array $args){
            $impianto = new Impianto();
            $id = $args["id"];
            $rilevatori = $impianto->getRilevatori();
            $rilevatoriTemperatura = [];
            $ok = false;
            foreach($rilevatori as $r){
                if($r->id == "temperatura"){
                    $rilevatoriTemperatura[] = $r;
                }
            }

            foreach($rilevatoriTemperatura as $r){
                if($r->codiceSeriale == $id){
                    $response->getBody()->write(json_encode($r->misurazioni));
                    $ok = true;
                    break;
                }
            }
            return $response->withStatus($ok? 200 : 404);

        }

        public function findMisurazioniAbove(Request $request, Response $response, array $args){
            $impianto = new Impianto();
            $id = $args["id"];
            $value = $args["value"];
            $rilevatori = $impianto->getRilevatori();
            $rilevatoriTemperatura = [];
            $ok = false;
            foreach($rilevatori as $r){
                if($r->id == "temperatura"){
                    $rilevatoriTemperatura[] = $r;
                }
            }

            $misurazioniAbove = [];

            foreach($rilevatoriTemperatura as $r){
                if($r->codiceSeriale == $id){
                    foreach($r->misurazioni as $m){
                        if($m->valore >= $value){
                            $misurazioniAbove[] = $m;
                            $ok = true;
                        }
                    }
                }
            }
            $response->getBody()->write(json_encode($misurazioniAbove));
            return $response->withStatus($ok? 200 : 404);

        }
    }