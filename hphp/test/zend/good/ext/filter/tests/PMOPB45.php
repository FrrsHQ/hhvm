<?php <<__EntryPoint>> function main() {
$var = "test@example.com\n";
var_dump(filter_var($var, FILTER_VALIDATE_EMAIL));
}
