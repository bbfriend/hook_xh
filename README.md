# hook_xh  
This plugin is to use the familiar <a href="http://codex.wordpress.org/Plugin_API" target="_blank">WordPress hook system</a> in CMSimple_XH. Basic usage is the same as WordPress Plugin API

1:Unzip  
2:plugins/hook_xh/* ----> plugins/hook_xh/*.  
3:cmsimple/add_to_userfuncs.php ---> cmsimple/userfuncs.php  
 * if you have already have a userfuncs.php, please copy the source code. Very simple code.  

## Function List  
/** hook_xh/core/hooksystem_xh.php **/  
global $hooks  

add_filter( $tag, $function_to_add, $priority = 10, $accepted_args = 1 )  
has_filter($tag, $function_to_check = false)  
apply_filters_ref_array($tag, $args)  
remove_filter( $tag, $function_to_remove, $priority = 10 )  
remove_all_filters( $tag, $priority = false )  
current_filter()  
current_action()  
doing_filter( $filter = null )  
doing_action( $action = null )  
  
add_action($tag, $function_to_add, $priority = 10, $accepted_args = 1)  
do_action($tag, $arg = '')  
did_action($tag)  
do_action_ref_array($tag, $args)  
has_action($tag, $function_to_check = false)  
remove_action( $tag, $function_to_remove, $priority = 10 )  
remove_all_actions($tag, $priority = false)  
_call_all_hook($args)  
_filter_build_unique_id($tag, $function, $priority)  
  
/** Core ***/  
hook_xh/core/php-hooks.php   

Original: https://github.com/bainternet/PHP-Hooks  

CMSimple_xh 
http://www.cmsimple-xh.org/  
http://cmsimpleforum.com/viewtopic.php?f=29&t=9711
