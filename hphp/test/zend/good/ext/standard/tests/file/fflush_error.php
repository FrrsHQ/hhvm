<?php
/*
 Prototype: bool fflush ( resource $handle );
 Description: Flushes the output to a file
*/
<<__EntryPoint>> function main() {
echo "*** Testing error conditions ***\n";
$file_path = getenv('HPHP_TEST_TMPDIR') ?? dirname(__FILE__);

// zero argument
echo "-- Testing fflush(): with zero argument --\n";
try { var_dump( fflush() ); } catch (Exception $e) { echo "\n".'Warning: '.$e->getMessage().' in '.__FILE__.' on line '.__LINE__."\n"; }

// more than expected no. of args
echo "-- Testing fflush(): with more than expected number of arguments --\n";

$filename = "$file_path/fflush_error.tmp";
$file_handle = fopen($filename, "w");
if($file_handle == false)
  exit("Error:failed to open file $filename");
   
try { var_dump( fflush($file_handle, $file_handle) ); } catch (Exception $e) { echo "\n".'Warning: '.$e->getMessage().' in '.__FILE__.' on line '.__LINE__."\n"; }
fclose($file_handle);

// test invalid arguments : non-resources
echo "-- Testing fflush(): with invalid arguments --\n";
$invalid_args = array (
  "string",
  10,
  10.5,
  true,
  array(1,2,3),
  new stdclass
);

/* loop to test fflush() with different invalid type of args */
for($loop_counter = 1; $loop_counter <= count($invalid_args); $loop_counter++) {
  echo "-- Iteration $loop_counter --\n";
  try { var_dump( fflush($invalid_args[$loop_counter - 1]) ); } catch (Exception $e) { echo "\n".'Warning: '.$e->getMessage().' in '.__FILE__.' on line '.__LINE__."\n"; }
}
echo "\n*** Done ***";
error_reporting(0);
$file_path = getenv('HPHP_TEST_TMPDIR') ?? dirname(__FILE__);
unlink("$file_path/fflush_error.tmp");
}
