<?php

/**
 * Description of MyMVCMain
 *
 * @author huangshihuai_91
 */
final class MyMVCRun {

    private static $_lib;
    private static $_core;

    public function __construct() {

    }

    protected static function init() {
        // 加载配置类
        self::autoSetLib();
        self::autoLoadLibClass();
        self::autoSetCore();
        self::autoLoadCoreClass();

        require_once (SYS_CORE . '/controller.php');
        require_once (SYS_CORE . '/models.php');
    }

    public static function Run() {
        self::init();
        $uriPath = self::$_core['route']->getPathToArray();
        $uriParame = self::$_core['route']->getQueryToArray();
        self::$_core['route']->questRun($uriPath, $uriParame);
    }

    protected static function autoSetCore() {
        self::$_core = array(
            'route' => SYS_CORE . '/route.php',
        );
    }

    protected static function autoLoadCoreClass() {

        foreach (self::$_core as $key => $core) {
            require ($core);
            self::$_core[$key] = new $key;
        }
    }

    protected static function autoSetLib() {
        self::$_lib = array(
            'mysql' => SYS_LIB . '/mysqlDriver.php',
        );
    }

    protected static function autoLoadLibClass() {
        foreach (self::$_lib as $key => $val) {
            require ($val);
            self::$_lib[$key] = new $key;
        }
    }

}
