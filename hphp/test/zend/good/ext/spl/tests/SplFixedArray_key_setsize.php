<?php
<<__EntryPoint>> function main() {
$array = new SplFixedArray( 4 );

$array[0] = "Hello";
$array[1] = "world";
$array[2] = "elePHPant";

foreach ( $array as $value ) {
	echo $array->key( );
}
}
