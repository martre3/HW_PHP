<?php

namespace Deep\First;

class Magic
{

    private $name;

    public function __construct()
    {
        $this->name = "Deep\First\Magic";
        echo($this->name . " has been successfully initialized" . PHP_EOL);
    }

    public function __destruct()
    {
         echo($this->name . " has been destroyed" . PHP_EOL);
    }
}
