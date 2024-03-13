<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

    class ImpiantoController{
        public function info(Request $request, Response $response, $args){

            $impianto = new Impianto();

            $response->getBody()->write(json_encode($impianto)); 
            return $response;
        }
    }