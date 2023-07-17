<?php
// APP #################################################################################################
$rotas['/teste'] = [
    'GET' => [
        'controller' => App\controllers\AppController::class,
        'action' => 'teste'
    ]
];

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
        'controller' => App\controllers\TicketController::class,
        'action' => 'listaChamados'
    ],
    'POST' => [
        'controller' => App\controllers\TicketController::class,
        'action' => 'abrirChamado'
    ]
];

// USUÁRIOS #############################################################################################
$rotas['/usuarios'] = [
    'GET' => [
        'controller' => App\controllers\UsuarioController::class,
        'action' => 'pesquisaUsuario'
    ]
];

return $rotas; 
