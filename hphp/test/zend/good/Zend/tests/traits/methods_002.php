<?php

trait foo {
    public function __clone() {
        var_dump(__FUNCTION__);
    }
}

trait baz {
    public function __clone() {
        var_dump(__FUNCTION__);
    }
}

class bar {
    use foo;
    use baz;
}
<<__EntryPoint>> function main() {
$o = new bar;
var_dump(clone $o);
}
