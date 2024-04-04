<?php 
namespace Cosanpa\Src;

class Helper
{
    // O Envio das variáveis deve ser via GET
    public static function redireciona(String $url = "/", array $parametros = []) : array
    {
        if($parametros){
            $i = 1;
            $url .= "?";
            foreach($parametros as $key => $value){
                $url .= $key . "=" . $value;
                if($i == count($parametros)) break;
                $url .= "&";
                $i++;
            }
        }
        $dataResponse['status'] = 302;
        $dataResponse['header'] = ['Location' => $url];
        return $dataResponse;
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
