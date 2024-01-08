<?php
// APP #################################################################################################
$rotas['/teste'] = [
    'GET' => [
        'controller' => Cosanpa\App\controllers\TesteController::class,
        'action' => 'teste'
    ]
];

$rotas['/'] = [
    'GET' => [
        'controller' => Cosanpa\App\controllers\AppController::class,
        'action' => 'index'
    ]
];

$rotas['/404'] = [
    'GET' => [
        'controller' => Cosanpa\App\controllers\AppController::class,
        'action' => 'erro404'
    ]
];

$rotas['/arquivos/manual'] = [
    'GET' => [
        'controller' => Cosanpa\App\controllers\AppController::class,
        'action' => 'manual'
    ]
];

// LOGIN #################################################################################################
$rotas['/login'] = [
    'POST' => [
        'controller' => Cosanpa\App\controllers\LoginController::class,
        'action' => 'logar'
    ],
];

$rotas['/logoff'] = [
    'GET' => [
        'controller' => Cosanpa\App\controllers\LoginController::class,
        'action' => 'deslogar'
    ],
];

// CAHAMADOS ############################################################################################
$rotas['/novoChamado'] = [
    // 'GET' => [
    //     'controller' => Cosanpa\App\controllers\TicketController::class,
    //     'action' => 'listaChamados'
    // ],
    'POST' => [
        'controller' => Cosanpa\App\controllers\TicketController::class,
        'action' => 'abrirChamado'
    ]
];

// USUÁRIOS #############################################################################################
$rotas['/usuarios'] = [
    'POST' => [
        'controller' => Cosanpa\App\controllers\UsuarioController::class,
        'action' => 'pesquisaUsuario'
    ]
];

return $rotas; 
