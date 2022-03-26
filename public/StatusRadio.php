<?php

error_reporting(0);
header("Content-type: application/json; charset=utf-8");
header("Pragma: no-cache");

$linkStream = $_GET['stream'];

$xml = simplexml_load_file($linkStream . "statistics");
$array = json_decode(json_encode($xml), TRUE);

$locutor = $array['STREAMSTATS']['STREAM']['SERVERTITLE'];
$programa = $array['STREAMSTATS']['STREAM']['SERVERGENRE'];
$ouvintes = $array['STREAMSTATS']['STREAM']['CURRENTLISTENERS'];

$saida = array(
    "locutor" => $locutor,
    "programa" => $programa,
    "ouvintes" => $ouvintes,
);

echo json_encode($saida, JSON_PRETTY_PRINT);
