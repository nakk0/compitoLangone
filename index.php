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
// $app->get('/alunni','AlunniController:alunni');
// $app->get('/alunni/{nome}','AlunniController:alunniByNome');

// $app->get('/api/alunni','ApiAlunniController:alunni');
// $app->get('/api/alunni/{nome}','ApiAlunniController:alunniByNome');
// $app->post('/api/alunni','ApiAlunniController:createAlunno');
//$app->put('/api/alunni/{nome}','ApiAlunniController:updateAlunno');
//$app->delete('/api/alunni/{nome}','ApiAlunniController:deleteAlunno');

$app->run();
