<?php
// APP #################################################################################################
$rotas['/teste'] = [
    'GET' => [
        'controller' => App\controllers\AppController::class,
        'action' => 'teste'
    ],
    'POST' => [
        'controller' => App\controllers\AppController::class,
        'action' => 'pesquisa'
    ],
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

$rotas['/arquivos/manual'] = [
    'GET' => [
        'controller' => App\controllers\AppController::class,
        'action' => 'manual'
    ]
];

// LOGIN #################################################################################################
$rotas['/login'] = [
    'POST' => [
        'controller' => App\controllers\LoginController::class,
        'action' => 'logar'
    ],
];

$rotas['/logoff'] = [
    'GET' => [
        'controller' => App\controllers\LoginController::class,
        'action' => 'deslogar'
    ],
];

// CAHAMADOS ############################################################################################
$rotas['/novoChamado'] = [
    // 'GET' => [
    //     'controller' => App\controllers\TicketController::class,
    //     'action' => 'listaChamados'
    // ],
    'POST' => [
        'controller' => App\controllers\TicketController::class,
        'action' => 'abrirChamado'
    ]
];

// USUÁRIOS #############################################################################################
$rotas['/usuarios'] = [
    'POST' => [
        'controller' => App\controllers\UsuarioController::class,
        'action' => 'pesquisaUsuario'
    ]
];

return $rotas; 
