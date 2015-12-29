<?php

//include_once('php-hooks.php');
global $hooks;


function echo_this_in_header(){
	echo 'this came from a hooked function plugins/testplg';

	global $hooks;
	$hooks->do_action('plugins_testplg'); // testplg2
}

$hooks->add_action('header_action','echo_this_in_header');




function hogehoge($content) {
    return $content .' +add_filter:plugins/testplg->' . strtoupper($content); ;
//    return 'this came from a hooked function plugins/testplg' ;
}

$hooks->add_filter('gonzo_h2_func1', 'hogehoge') ; //templates/gonzo-h2/test_func1.php
