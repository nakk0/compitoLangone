<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

    class ImpiantoController{
        public function info(Request $request, Response $response, $args){

            $impianto = new Impianto();

            $toEncode = [
                "nome" => $impianto->getNome(),
                "lat" => $impianto->getLat(),
                "long" => $impianto->getLong()
            ];

            $response->getBody()->write(json_encode($toEncode)); 
            return $response;
        }
    }