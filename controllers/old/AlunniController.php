<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

    class AlunniController {
        function alunni(Request $request, Response $response, $args) { 
           
            $classe = new Classe();

            $response->getBody()->write($classe->toString());
            
            return $response;
        }
        function alunniByNome(Request $request, Response $response, $args) {
           
            $classe = new Classe();
            $name = $args["nome"];
            $alunni = $classe->get_alunni_nome($name);
                
            $message ="";
            if(empty($alunni)){
                $message.="not found";
            }else{
                foreach($alunni as $a){
                    $message.=$a->toString();
                }
            }
            $response->getBody()->write($message);
            return $response;
        }
    }

?>