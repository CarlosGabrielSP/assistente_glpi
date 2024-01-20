<?php
namespace Cosanpa\Src;

abstract class Controller
{
    public function renderView(String $view = null, array $dados = []): void    
    {
        extract($dados);
        //inicializa o buffer de saída
        ob_start();
        require __DIR__ . "/../app/views/" . $view . ".tpl.php";
        $view = ob_get_contents(); //captura o conteúdo do buffer
        ob_clean(); //limpa o buffer
        echo $view;
    }
}
