<?php

namespace Top;

class Magic
{
    private $name;
    private $hidden;

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
        echo "Sorry, but " . $name . " is private or doesn't exist" . PHP_EOL;
    }

    private function inaccesibleMethod()
    {
        echo "Unreachable";
    }
}