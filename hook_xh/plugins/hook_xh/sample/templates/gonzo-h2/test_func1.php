<?php

function gonzo_h2_func1()
{

//	global $hooks;
//	$content = "filters-test:this came from function gonzo-h2_func1";
//	$content = $hooks->apply_filters( 'gonzo_h2_func1', $content );


	$content = "filters-test:this came from function gonzo-h2_func1";

	$content = apply_filters( 'hookname_gonzo_h2_func1', $content );

	echo $content;
}


/************ 
http://ara-web.net/blog/wordpress/post-590/
*************/

//テーマ内 functions.php の中で関数をフックする。
add_filter('hookname_the_profile', 'template_my_profile_function', 10, 2);
function template_my_profile_function($n1, $n2){
    echo 'My Name is '.$n1 .'. Cat name is ' .$n2 . '.';
}

?>
