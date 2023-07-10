<?php
// APP #################################################################################################
// $rotas['/login'] = [
//     'GET' => [
//         'controller' => App\controllers\AppController::class,
//         'action' => 'login'
//     ]
// ];

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
$rotas['/chamados'] = [
    'GET' => [
        'controller' => App\controllers\ChamadoController::class,
        'action' => 'listaChamados'
    ]
];


return $rotas; 
