<?php

require_once(__DIR__ . '/vendor/autoload.php');

$obj1 = new Top\Magic();
$obj2 = new Deep\First\Magic();
$obj3 = new Deep\Second\Magic();

$obj1->inaccessibleMethod();//testing __call method by trying to access private method



