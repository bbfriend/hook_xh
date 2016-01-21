<?php

/*
 * @version $Id: index.php 257 2015-03-12 20:05:31Z hi $
 *
 */

/**
 * List all hooked CMSimple_XH functions
 *
 * Version:    0.1
 * Build:      20151225
 * Copyright:  Takashi Uchiyama
 * Website:    http://cmsimple-jp.org

if (!defined('CMSIMPLE_XH_VERSION')) {
    header('HTTP/1.0 403 Forbidden');
    exit;
}

 * */
function list_hooked_functions($tag=false){
	global $hooks;
	if ($tag) {
		$list_hooks[$tag]=$hooks[$tag];
		if (!is_array($list_hooks[$tag])) {
			trigger_error("Nothing found for '$tag' hook", E_USER_WARNING);
			return;
		}
	}
	else {
		$list_hooks = (array)$hooks;

		if(is_null($list_hooks)){
			return "Hook can not be found!";
		}

		ksort( $list_hooks );

		ob_start();
			$dump =  'var_dump($list_hooks)-------'. '<pre>';
			var_dump($list_hooks);
			$dump .= ob_get_contents();
			$dump .=  '</pre>';
		ob_end_clean();
	}

	$val =  '<pre>';
		$val .= "<br />Called Hook Name & Function Name<br />";
	foreach($list_hooks["filters"] as $tag => $priority){
		$val .= "<br />&gt;&gt;&gt;&gt;&gt;\t<strong>$tag</strong><br />";
		ksort($priority);
		foreach($priority as $priority => $function){
			$val .= $priority;
			foreach($function as $name => $properties) $val .= "\t&nbsp;&gt;&nbsp;$name<br />";
		}
	}
	$val .= '</pre>';

//	return $val . $dump;
	return $val ;
}
//list_hooked_functions();
?>