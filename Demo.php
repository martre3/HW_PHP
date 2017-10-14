<?php

require_once(__DIR__ . '/vendor/autoload.php');

// testing __construct methods and checking if autoloader works correctly
$obj1 = new Top\Magic();
$obj2 = new Deep\First\Magic();
$obj3 = new Deep\Second\Magic();
echo PHP_EOL;

$obj1->inaccessibleMethod("public");//testing __call method by trying to access private method
$obj1::notExisting();//testing __callStatic method by trying to access not existing method
echo PHP_EOL;

$obj1->newVar = "some value";//testing __set method by setting value to variable that has not been declared
echo "returned value: '" . $obj1->newVar . "'" . PHP_EOL;//testing __get method by accessing previously created variable
echo PHP_EOL;

var_dump(isset($obj1->newVar));//testing __isset
unset($obj1->newVar);//testing __unset
var_dump(isset($obj1->newVar));
echo PHP_EOL;




