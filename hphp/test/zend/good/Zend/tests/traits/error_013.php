<?php

trait foo {
    public function test() { return 3; }
}

class bar {
    use foo { test as static; }
}
<<__EntryPoint>> function main() {
$x = new bar;
var_dump($x->test());
}
