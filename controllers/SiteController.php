<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
    class SiteController {
        function index(Request $request, Response $response, $args) {
            $response->getBody()->write("questo è l'api fra, cosa ci fai qua");
            return $response;
        }
    }
?>