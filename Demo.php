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

$objectData = serialize($obj1);//testing __sleep method
$obj1 = null;//destroying object to avoid __destruct call after unserialize()
$obj1 = unserialize($objectData);//testing __wakeup method
echo PHP_EOL;

echo $obj1 . PHP_EOL;//testing __toString method
var_dump($obj1);//testing __debugInfo method
echo PHP_EOL;

echo "Info about object: " . var_export($obj1, true);//exporting object data by using __set_state method
echo PHP_EOL;

$obj1("called");//testing __invoke method by calling object as function
echo PHP_EOL;

$obj3 = clone $obj1;//testing __clone method
var_dump($obj1);//comparing results
var_dump($obj3);//clone has variable in data array, confirming that cloning has been successful
echo PHP_EOL;

//End of file, all objects will now be destroyed