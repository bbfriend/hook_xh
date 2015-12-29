<?php

function gonzo_h2_func1()
{
	global $hooks;

	$content = "filters-test:this came from function gonzo-h2_func1";

	$content = $hooks->apply_filters( 'gonzo_h2_func1', $content );

	echo $content;
}


?>
