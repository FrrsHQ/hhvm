<?php <<__EntryPoint>> function main() {
$image = imagecreatetruecolor(180, 30);

var_dump(imagefilter($image, IMG_FILTER_PIXELATE, 'wrong parameter'));
}
