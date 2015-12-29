<?php

/*
 * @version $Id: index.php 257 2015-03-12 20:05:31Z hi $
 *
 */

/**
 * Hook System for CMSimple_XH
 *
 * Version:    0.1
 * Build:      20151225
 * Copyright:  Takashi Uchiyama
 * Website:    http://cmsimple-jp.org
 * */
if (!defined('CMSIMPLE_XH_VERSION')) {
    header('HTTP/1.0 403 Forbidden');
    exit;
}

    include_once($pth['folder']['plugins'] . 'hook_xh/php-hooks.php');
