<?php
namespace Cosanpa\Src;

abstract class Controller
{
    use \Cosanpa\Src\Template;
    public function downloadPDF(string $file)
    {
        $path = "../public/file/$file.pdf";
        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="'.$file.'.pdf"');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: '.filesize($path));
        readfile($path);
    }
}
