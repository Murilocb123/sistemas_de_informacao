<?php

require __DIR__ . '/vendor/autoload.php';

use Mpdf\Mpdf;
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$logger = new Logger('pdfGenerator');
$logger->pushHandler(new StreamHandler('./log.log', Level::Debug));

$file = $_FILES['file'];
$_textContent = $_POST['textContent'];

$base64 = base64_encode(file_get_contents($file['tmp_name']));

$mpdf = new Mpdf();

$content = 'Coteudo digitado: ' . $_textContent . '<br>';
$logger->debug('Conteudo digitado: ' . $_textContent);
$content .= 'Imagem: <img src="data:image/png;base64,' . $base64 . '"/>';
$logger->debug('Imagem: ' . $base64);
$mpdf->WriteHTML($content);

$mpdf->Output('file.pdf', 'D');