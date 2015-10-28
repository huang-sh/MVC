<?php

define('Huang.sh-Version', '0.0.1');
define('SYSTEM_PATH', dirname(__FILE__));
define('SYS_LIB', SYSTEM_PATH . '/lib');
define('SYS_CORE', SYSTEM_PATH . '/core');
define('SYS_CONF', SYSTEM_PATH . '/config');
define('SYS_DB', SYSTEM_PATH . '/database');

define('APP_VIEW', ROOT_PATH . '/view');
define('APP_MODEL', ROOT_PATH . '/model');
define('APP_CONTROL', ROOT_PATH . '/controller');

if (!is_dir(SYS_CORE) || !is_file(SYS_CORE . '/Run.php')) {
    header('HTTP/1.1 503 Service Unavailable.' . true, 503);
    echo 'Your system folder path does not appear to be set correctly. '
    . 'Please open the following file and correct this: ' . pathinfo(__FILE__, PATHINFO_BASENAME);
    exit(0);
}

require_once SYS_CORE . '/Run.php';
Run::Run();
