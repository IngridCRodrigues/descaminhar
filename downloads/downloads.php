<?php 
$arquivo = $_GET["arquivo"];
$arquivoLocal =  '/downloads'.$arquivo;

if(isset($arquivo) && file_exists($arquivo)){
switch (strtolower(substr(strrchr(basename($arquivo), "."), 1))) {
    case 'jpg':
        $tipo = "image/jpg";
        break;

    case "pdf": 
        $tipo="application/pdf"; 
        break;
}
}

header("Content-Type: ". $tipo);
header("Content-Length: ". filesize($arquivo));
header("Content-Disposition: attachment; filename=".basename($arquivo));
readfile($arquivo);
exit;
// header('Content-Description: File Transfer');
// header('Content-Disposition: attachment; filename="'.'download'.'"');
// header('Content-Type: application/octet-stream');
// header('Content-Transfer-Encoding: binary');
// header('Content-Length: ' . filesize($aquivoNome));
// header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
// header('Pragma: public');
// header('Expires: 0');

?>