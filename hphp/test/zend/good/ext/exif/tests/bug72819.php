<?php <<__EntryPoint>> function main() {
$infile = dirname(__FILE__).'/bug72819.jpg';
var_dump(strlen(exif_thumbnail($infile)));
}
