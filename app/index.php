<?php

$system_path = '../system';
if (($_temp = realpath($system_path)) !== false) {
    $system_path = $_temp . '/';
} else {
    $system_path = rtrim($system_path, '/') . '/';
}
if (!is_dir($system_path) || !is_file($system_path . 'system.php')) {
    header('HTTP/1.1 503 Service Unavailable.' . true, 503);
    echo 'Your system folder path does not appear to be set correctly. '
    . 'Please open the following file and correct this: ' . pathinfo(__FILE__, PATHINFO_BASENAME);
    exit(0);
}

// 定义文件入口
define('ROOT_PATH', dirname(__FILE__));
require_once (ROOT_PATH . '/../system/system.php');
