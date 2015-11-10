<?php
if ($_SERVER['HTTP_HOST'] == 'localhost') {
	$trace = debug_backtrace();
	echo "The error occured in file " . $trace[4]['file'] . " on line " . $trace[4]['line'] . "";
}
?>