<?php

//include_once('php-hooks.php');
global $hooks;



function echo_this_in_header2(){
	echo " +add_action (plugins/testplg2)";

}

//plugins_testplg :Hook to plugins/testplg
$hooks->add_action('plugins_testplg','echo_this_in_header2');