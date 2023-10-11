<?php
$file = "../public/file/Guia-GLPI.pdf";
header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="seu-arquivo.pdf"');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($file));
readfile($file);
