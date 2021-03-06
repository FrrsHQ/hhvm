<?php

class logger {
  static $x = 0;
  private $idx;
  function __construct() {
    $this->idx = self::$x++;
    printf("logger %d constructing\n", $this->idx);
  }
}

function create() {
  $x = 5;
  yield $x;
  $s = 'foo';
  yield $s;
  $foo = 1234;
  $z = $foo;
  yield $z;
  yield $foo;
}

function unusedarg($x, $y) {
  $z = 5;
  yield array('x' => $x, 'z' => $z);
  $s = 'foo';
  yield 'almost there';
  $foo = 'inside foo';
  yield array('foo' => $foo, 's' => $s);
  yield array('x' => $x, 'y' => $y, 'foo' => $foo, 'z' => $z);
}

function dumpgen($g) {
  foreach ($g as $v) {
    var_dump($v);
  }
}

function getargs(...$args) {
  yield 0xdeadbeef;
  yield $args;
  yield $args[3];
}

function genthrow() {
  throw new Exception();
  yield 5;
}

function manylocals() {
  $a = 1;
  $b = 2;
  $c = 3;
  $d = 4;
  $e = 5;
  $f = 6;
  $g = 7;
  $h = 8;
  $i = 9;
  $j = 10;
  $k = 11;
  $l = 12;
  $a = yield array('a' => $a, 'b' => $b, 'c' => $c, 'd' => $d, 'e' => $e, 'f' => $f, 'g' => $g, 'h' => $h, 'i' => $i, 'j' => $j, 'k' => $k, 'l' => $l);
  $b = 0xdeadbeef;
  $c = yield array('a' => $a, 'b' => $b, 'c' => $c, 'd' => $d, 'e' => $e, 'f' => $f, 'g' => $g, 'h' => $h, 'i' => $i, 'j' => $j, 'k' => $k, 'l' => $l);
  $d = $e = 0xba53b411;
  yield array('a' => $a, 'b' => $b, 'c' => $c, 'd' => $d, 'e' => $e, 'f' => $f, 'g' => $g, 'h' => $h, 'i' => $i, 'j' => $j, 'k' => $k, 'l' => $l);
}

<<__EntryPoint>> function main() {
  dumpgen(create());
  dumpgen(unusedarg(new logger(), 5));
  dumpgen(getargs(1, 2, 3, 4, 5));
  $g = genthrow();
  try {
    $g->next();
  } catch (Exception $e) {}
  try {
    $g->next();
  } catch (Exception $e) {
    var_dump($e->getMessage());
  }

  $g = manylocals();
  $g->next();
  var_dump($g->current());
  $g->send(new stdclass);
  var_dump($g->current());
  $g->send($g);
  var_dump($g->current());
  $g->next();
  var_dump($g->current());
  var_dump($g->valid());
}
