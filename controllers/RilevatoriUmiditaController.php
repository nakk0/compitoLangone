<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

    class RilevatoriUmiditaController{
        public function list(Request $request, Response $response, array $args){
            $impianto = new Impianto();
            $rilevatori = $impianto->getRilevatori();
            $rilevatoriUmidita = [];
            $ok = false;


            foreach($rilevatori as $r){
                if($r->id == "umidita"){
                    $rilevatoriUmidita[] = $r;
                    $ok = true;
                }
            }

            $response->getBody()->write(json_encode($rilevatoriUmidita));
            return $response->withStatus($ok? 200 : 404);
        }

        public function find(Request $request, Response $response, array $args){
            $impianto = new Impianto();
            $id = $args["id"];
            $rilevatori = $impianto->getRilevatori();
            $rilevatoriUmidita = [];
            $ok = false;
            foreach($rilevatori as $r){
                if($r->id == "umidita"){
                    $rilevatoriUmidita[] = $r;
                }
            }

            foreach($rilevatoriUmidita as $r){
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
            $rilevatoriUmidita = [];
            $ok = false;
            foreach($rilevatori as $r){
                if($r->id == "umidita"){
                    $rilevatoriUmidita[] = $r;
                }
            }

            foreach($rilevatoriUmidita as $r){
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
            $rilevatoriUmidita = [];
            $ok = false;
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
                            $ok = true;
                        }
                    }
                }
            }
            $response->getBody()->write(json_encode($misurazioniAbove));
            return $response->withStatus($ok? 200 : 404);

        }

        public function create(Request $request, Response $response, array $args){

            $id = "umidita";
            $misurazioni = $args["misurazioni"];
            $unitaMisura = "%";
            $codiceSeriale = $args["codiceSeriale"];
            $posizione = $args["posizione"];

            $obj = [
                "id" => $id,
                "misurazioni" => $misurazioni,
                "unitaMisura" => $unitaMisura,
                "codiceSeriale" => $codiceSeriale,
                "posizione" => $posizione,
            ];

            file_put_contents("./data/data.json",json_encode($obj));


        }

    }