<?php
class Test {
    function say_hello() {
        echo "Hello world";
    }
}

class Factory {
    public $name = "Test";
    function create() {
        $obj = new $this->name; /* Parse error */
        return $obj;
    }
}
<<__EntryPoint>> function main() {
$factory = new Factory;
$test = $factory->create();
$test->say_hello();
}
