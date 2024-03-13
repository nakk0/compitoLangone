<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

    class ApiAlunniController {
        function alunni(Request $request, Response $response, $args)  { 
            $classe = new Classe();
            $arr = [];
            foreach($classe->get_alunni() as $alunno){
                
                $arr[] = [
                    "name" => $alunno->get_name(),
                    "surname" => $alunno->get_surname(),
                    "age" => $alunno->get_age()
                ];
            }

            $response->getBody()->write(json_encode($arr));
            
            return $response;
        }

        function alunniByNome(Request $request, Response $response, $args)  {
            $classe = new Classe();
            $name = $args["nome"];
            $arr = [];

            foreach($classe->get_alunni_nome($name) as $alunno){
                $arr[] = [
                    "name" => $alunno->get_name(),
                    "surname" => $alunno->get_surname(),
                    "age" => $alunno->get_age()
                ];
            }

            $response->getBody()->write(json_encode($arr));
            return $response;
        }

        function createAlunno(Request $request, Response $response, $args){
            $classe = new Classe();
            $params = $request->getParsedBody();
            $alunno = new Alunno($params['name'], $params['surname'], $params['age']);
            
            $classe->addAlunno($alunno);

            $response->getBody()->write("test");
                                                  
            return $response;
        }
    }

?>