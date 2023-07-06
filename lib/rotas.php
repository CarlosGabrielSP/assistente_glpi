<?php
// APP #################################################################################################
$rotas['/'] = [
    'GET' => [
        'controller' => App\controllers\AppController::class,
        'action' => 'index'
    ]
];

$rotas['/erro404'] = [
    'GET' => [
        'controller' => App\controllers\AppController::class,
        'action' => 'erro404'
    ]
];

// CAHAMADOS ############################################################################################
$rotas['/chamado1'] = [
    'POST' => [
        'controller' => App\controllers\ChamadoController::class,
        'action' => 'chamado1'
    ]
];


return $rotas; 
