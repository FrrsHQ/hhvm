<?php
  echo "Basic test of POSIX getpid function\n";

  $pid = posix_getpid();

  var_dump($pid);
<<__EntryPoint>> function main() {
echo "===DONE====";
}
