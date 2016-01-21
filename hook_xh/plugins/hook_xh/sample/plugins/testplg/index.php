<?php


function plugin_testplg_echo_function(){
	echo 'this came from a hooked function plugins/testplg';
	do_action('hookname_plugins_testplg'); // testplg2
}

add_action('hookname_header_action','plugin_testplg_echo_function');




function plugin_testplg_hogehoge_function($content) {
    return $content .' +add_filter:plugins/testplg->' . strtoupper($content); ;
//    return 'this came from a hooked function plugins/testplg' ;
}

add_filter('hookname_gonzo_h2_func1', 'plugin_testplg_hogehoge_function') ; //templates/gonzo-h2/test_func1.php



/**
//テーマ外に設定してあるデフォルトのWP関数だとします。
function the_profile($n1, $n2){
    echo ' 私：'.$n1; echo ' 猫：'.$n2;
}
***/