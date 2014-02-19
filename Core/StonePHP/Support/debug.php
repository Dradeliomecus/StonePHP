<?php

/**
 * Debugs a variable
 * 
 * @param $var
 * @return void
 */
function debug($var){
	echo '<pre>';
		print_r($var);
	echo '</pre>';
}