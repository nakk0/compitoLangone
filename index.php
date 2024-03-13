<?php

use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
spl_autoload_register(function ($class) {
    if(file_exists("./models/$class.php"))
        require_once("./models/$class.php");
    if(file_exists("./controllers/$class.php"))
        require_once("./controllers/$class.php");
});

$app = AppFactory::create();

$app->addBodyParsingMiddleware();




$app->get('/', 'SiteController:index');
$app->get('/impianto', 'ImpiantoController:info');

//rilevatori umidita
$app->get('/rilevatori_di_umidita', 'RilevatoriUmiditaController:list');
$app->get('/rilevatori_di_umidita/{id}', 'RilevatoriUmiditaController:find');
$app->get('/rilevatori_di_umidita/{id}/misurazioni', 'RilevatoriUmiditaController:findMisurazioni');
$app->get('/rilevatori_di_umidita/{id}/misurazioni/maggiore_di/{value}', 'RilevatoriUmiditaController:findMisurazioniAbove');

$app->post('/rilevatori_di_umidita', 'RilevatoriUmiditaController:create');

//rilevatori temperatura
$app->get('/rilevatori_di_temperatura', 'RilevatoriTemperaturaController:list');
$app->get('/rilevatori_di_temperatura/{id}', 'RilevatoriTemperaturaController:find');
$app->get('/rilevatori_di_temperatura/{id}/misurazioni', 'RilevatoriTemperaturaController:findMisurazioni');
$app->get('/rilevatori_di_temperatura/{id}/misurazioni/maggiore_di/{value}', 'RilevatoriTemperaturaController:findMisurazioniAbove');



$app->run();
