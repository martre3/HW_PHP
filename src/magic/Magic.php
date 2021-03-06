<?php

namespace Top;

class Magic
{
    private $data = array();
    private $name;

    public function __construct()
    {
        $this->name = "Top\Magic";
        echo($this->name. " has been successfully initialized" . PHP_EOL);
    }

    public function __destruct()
    {
        echo($this->name . " has been destroyed"  . PHP_EOL);
    }

    public function __call($name, $arguments)
    {
        echo "Sorry, but " . $name . "(". implode(', ', $arguments). ") method is private or doesn't exist" . PHP_EOL;
    }

    public static function __callStatic($name, $arguments)
    {
        echo "Sorry, but static " . $name . "(". implode(', ', $arguments). ") method is private or doesn't exist" . PHP_EOL;
    }

    private function inaccessibleMethod($args)
    {
        echo "This is not accessible" . PHP_EOL;
    }

    public function __set($name, $value)
    {
        echo "'" . $name . "' has been created with '" . $value . "'" . PHP_EOL;
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->data)) {
            echo "'$name' successfully returned" . PHP_EOL;
            return $this->data[$name];
        }
        echo "No property '" .$name . "' in object " . $this->name . PHP_EOL;
    }

    public function __isset($name)
    {
        echo "Checking if '" . $name . "' is set" . PHP_EOL;
        return isset($this->data[$name]);
    }

    public function __unset($name)
    {
        echo "'" . $name . "' has been unset" . PHP_EOL;
        unset($this->data[$name]);
    }

    public function __sleep()
    {
        echo "Serializing " . $this->name . PHP_EOL;
        return array('data', 'name');
    }

    public function __wakeup()
    {
        echo $this->name . ' has been successfully unserialized' . PHP_EOL;
    }

    public function __toString()
    {
        return "My name is " . $this->name;
    }

    public function __debugInfo()
    {
        return [
            'name' => $this->name,
            'data' => $this->data
        ];
    }

    public static function __set_state($dataArray)
    {
        $obj = new Magic();
        $obj->name = $dataArray["name"];
        $obj->data = $dataArray["data"];
        return $obj;
    }

    public function __invoke($arg)
    {
        echo $this->name . " has been called as function with parameter's value '" . $arg . "'" . PHP_EOL;
    }

    public function __clone()
    {
        echo $this->name . " clone has been created" . PHP_EOL;
        $this->data["Clone"] = true;
    }

}