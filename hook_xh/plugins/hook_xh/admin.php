<?php

/**
 *  hook_xh 
 *
 * @package	hook_xh
 * @copyright	Copyright (c) 2015 T.Uchiyama <http://cmsimple-jp.org/>
 * @license	http://www.gnu.org/licenses/gpl-3.0.en.html GNU GPLv3
 * @version 1.0.1
 * @link	http://cmsimple-jp.org
 */

if (!XH_ADM ) {
    return;
}

/*
 * Prevent direct access.
 */
if (!defined('CMSIMPLE_XH_VERSION')) {
    header('HTTP/1.0 403 Forbidden');
    exit;
}
/*
 * Register the plugin menu items.
 */
if (function_exists('XH_registerStandardPluginMenuItems')) {
//    XH_registerStandardPluginMenuItems(false);
}

//	}


/*
 * Handle the plugin administration.
 */

if (isset($hook_xh) && $hook_xh == 'true') {
	$o .= print_plugin_admin('on');


	if ($action == 'plugin_text'){
		include_once ( $pth['folder']['plugins'] .'hook_xh/tool/list_hooked.php' );

		$o .= list_hooked_functions() ;
	}

    switch ($admin) {
    case '':
//    case 'plugin_main':
	$o .= hook_xh_version() .HookXH_systemCheck() ;
	break;
    default://Handles reading and writing of plugin files
	$o .= plugin_admin_common($action, $admin, $plugin);
    }
}


/**
 * Returns the plugin version information view.
 *
 * @return string  The (X)HTML.
 */
function hook_xh_version()
{
    global $pth;

    return '<h1>Hook_xh</h1>'."\n"
	. tag('img src="'.$pth['folder']['plugins'].'hook_xh/help/Hook_xh.png" style="float: left; margin: 0 20px 20px 0"')
	. '<p>The Hook_XH is a fork of the WordPress filters hook system rolled in CMSimple_XH.</p>'
	. '<p>Version: '.HOOK_XH_VERSION.'</p>'."\n"
	. '<p>Copyright &copy; 2015 <a href="http://cmsimple-jp.org" target="_blank">cmsimple-jp.org</a></p>'."\n"
	. '<p>Original <a href="http://bainternet.github.io/PHP-Hooks/" target="_blank">PHP-Hooks Latest commit on 7 Sep 2015</a></p>'
	. '<p style="text-align: justify">'
	. '<b>License</b>'. tag('br') . "\n"
	. ' Detail <a href="https://github.com/bainternet/PHP-Hooks" target="_blank">https://github.com/bainternet/PHP-Hooks</a>'. tag('br')."\n"
	. ' Software License terms : <a href="http://www.gnu.org/licenses/" target="_blank">GPLv3.</a>';
}

/**
 * Returns requirements information.
 *
 * @return string (X)HTML
 *
 * @global array The paths of system files and folders.
 * @global array The configuration of the plugins.
 * @global array The localization of the core.
 * @global array The localization of the plugins.
 */
function HookXH_systemCheck()
{
    global $pth, $plugin_cf, $tx, $plugin_tx ,$hooks;

    define('HOOK_PHP_VERSION', '5.3');
    $ptx = $plugin_tx['shortcodes_xh'];
    $imgdir = $pth['folder']['plugins'] . 'hook_xh/images/';
    $ok = tag('img src="' . $imgdir . 'ok.png" alt="ok"');
    $warn = tag('img src="' . $imgdir . 'warn.png" alt="warning"');
    $fail = tag('img src="' . $imgdir . 'fail.png" alt="failure"');
    $o = tag('hr') . '<h4>' . "System check" . '</h4>'
        . (version_compare(PHP_VERSION, HOOK_XH_VERSION) >= 0 ? $ok : $fail)
        . '&nbsp;&nbsp;' . sprintf("PHP version >= %s" , HOOK_PHP_VERSION)
        . tag('br') . tag('br') . PHP_EOL;
    $o .= tag('br') . (@isset($hooks)  ? $ok : $warn)
        . '&nbsp;&nbsp;' . 'PHP Hooks Class Load' . PHP_EOL;
    $o .= tag('br') . (function_exists('apply_filters')  ? $ok : $warn)
        . '&nbsp;&nbsp;' . 'apply_filters()' . PHP_EOL;
    $o .= tag('br') . (function_exists('add_filter')  ? $ok : $warn)
        . '&nbsp;&nbsp;' . 'add_filter()' . PHP_EOL;

    $o .= tag('br') . (strtoupper($tx['meta']['codepage']) == 'UTF-8' ? $ok : $warn)
        . '&nbsp;&nbsp;' . "Encoding 'UTF-8' configured" . PHP_EOL;

    return $o;
}

?>
