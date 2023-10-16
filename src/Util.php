<?php 

namespace Cosanpa\PortalGlpi;

class Util
{
    // O Envio das variáveis deve ser via GET
    public static function redireciona(String $url = "/", array $dados = []) 
    {
        if($dados){
            $i = 1;
            $url .= "?";
            foreach($dados as $key => $value){
                $url .= $key . "=" . $value;
                if($i == count($dados)) break;
                $url .= "&";
                $i++;
            }
        }
        header('Location: ' . $url);
        exit();
    }

    public static function notificacao(String $status = "info", String $msg = '')
    {
        switch($status){
            case "success":
                $_SESSION['notificacao'] = (object) array('status' => 'success', 'msg' => $msg??'Operação realizada com Sucesso');
                break;
            case "error":
                $_SESSION['notificacao'] = (object) array('status' => 'error', 'msg' => $msg??'Ocorreu um erro ao executar operação');
                break;
            default:
                $_SESSION['notificacao']  = (object) array('status' => 'info', 'msg' => $msg);
                break;
        }
    }

}
