<?php
$file = "../public/file/Guia-GLPI.pdf";
header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="Guia-GLPI.pdf"');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($file));
readfile($file);
