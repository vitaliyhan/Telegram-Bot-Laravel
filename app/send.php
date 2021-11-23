<?php
require '../vendor/autoload.php';

$title = $_REQUEST['title'];
$description = $_REQUEST['description'];
$url = '<a href="https://пирсинг-сваровски.рф">Сайт</a>';

$file = 'nosedive.pdf';
$cfile = new CURLFile('../assets/files/' . $file);
$cfile->setPostFilename($file);
$array = array(
    'chat_id' => 158407982,
    'document' => $cfile
//    'text' => '<b>' . $title . '</b>' . PHP_EOL . $description . PHP_EOL . $url,
//    'text' => 'edit-',
//    'parse_mode' => 'html',
//    'message_id' => 9
);

//$ch = curl_init('https://api.telegram.org/bot818552775:AAEwmen5KKIPuMMIUwxiaRQuUcnT3i2Dobc/sendMessage');
$ch = curl_init('https://api.telegram.org/bot818552775:AAEwmen5KKIPuMMIUwxiaRQuUcnT3i2Dobc/sendDocument');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $array);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);
$res = curl_exec($ch);
curl_close($ch);

dd($res);