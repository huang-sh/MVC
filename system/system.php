<?php

define('SYSTEM_PATH', dirname(__FILE__));
define('SYS_LIB', SYSTEM_PATH . '/lib');
define('SYS_CORE', SYSTEM_PATH . '/core');
define('SYS_CONF', SYSTEM_PATH . '/config');
define('SYS_DB', SYSTEM_PATH . '/database');

define('APP_VIEW', ROOT_PATH . '/view');
define('APP_MODEL', ROOT_PATH . '/model');
define('APP_CONTROL', ROOT_PATH . '/controller');

require SYSTEM_PATH . '/core/MyMVCRun.php';
MyMVCRun::Run();
