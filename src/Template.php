<?php
namespace Cosanpa\Src;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

trait Template
{
    const TEMPLATE_PATH = __DIR__.'/../app/views/';

    public function renderView(String $view, array $dados = []): void
    {
        $view = $view.'.twig';
        $loader = new FilesystemLoader(self::TEMPLATE_PATH);
        $twig = new Environment($loader);
        $twig->addGlobal('session', $_SESSION);
        
        echo $twig->render($view,$dados);
    }
}
