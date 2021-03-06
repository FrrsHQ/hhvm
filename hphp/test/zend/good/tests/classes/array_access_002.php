<?php
class object implements ArrayAccess {

    public $a = array('1st', 1, 2=>'3rd', '4th'=>4);

    function offsetExists($index) {
        echo __METHOD__ . "($index)\n";
        return array_key_exists($index, $this->a);
    }
    function offsetGet($index) {
        echo __METHOD__ . "($index)\n";
        return $this->a[$index];
    }
    function offsetSet($index, $newval) {
        echo __METHOD__ . "($index,$newval)\n";
        /*return*/ $this->a[$index] = $newval;
    }
    function offsetUnset($index) {
        echo __METHOD__ . "($index)\n";
        unset($this->a[$index]);
    }
}
<<__EntryPoint>> function main() {
$obj = new Object;

var_dump($obj->a);

echo "===isset===\n";
var_dump(isset($obj[0]));
var_dump(isset($obj[1]));
var_dump(isset($obj[2]));
var_dump(isset($obj['4th']));
var_dump(isset($obj['5th']));
var_dump(isset($obj[6]));

echo "===offsetGet===\n";
var_dump($obj[0]);
var_dump($obj[1]);
var_dump($obj[2]);
var_dump($obj['4th']);
var_dump($obj['5th']);
var_dump($obj[6]);

echo "===offsetSet===\n";
echo "WRITE 1\n";
$obj[1] = 'Changed 1';
var_dump($obj[1]);
echo "WRITE 2\n";
$obj['4th'] = 'Changed 4th';
var_dump($obj['4th']);
echo "WRITE 3\n";
$obj['5th'] = 'Added 5th';
var_dump($obj['5th']);
echo "WRITE 4\n";
$obj[6] = 'Added 6';
var_dump($obj[6]);

var_dump($obj[0]);
var_dump($obj[2]);

$x = $obj[6] = 'changed 6';
var_dump($obj[6]);
var_dump($x);

echo "===unset===\n";
var_dump($obj->a);
unset($obj[2]);
unset($obj['4th']);
unset($obj[7]);
unset($obj['8th']);
var_dump($obj->a);

echo "===DONE===\n";
}
