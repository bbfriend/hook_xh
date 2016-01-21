<?php


function plugin_testplg2_echo_function(){

	$out = " +add_action (plugins/testplg2)";

//	global $hooks;
//	echo $hooks -> apply_filters('hookname_unused_plugin_testplg2',$out);

	echo apply_filters('hookname_unused_plugin_testplg2',$out);

}

//plugins_testplg :Hook to plugins/testplg
add_action('hookname_plugins_testplg','plugin_testplg2_echo_function');