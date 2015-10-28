<?php

/**
 * Description of MyMVCMain
 *
 * @author huangshihuai_91
 */
final class Run {

    private static $_lib = array();
    private static $_core = array();

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
        self::$_core['route']->AnalyticalRoute($uriPath);
        self::$_core['route']->questRun();
    }

    protected static function autoSetCore() {
        $set = array(
            'route' => SYS_CORE . '/route.php',
        );
        self::$_core += $set;
        unset($set);
    }

    protected static function autoLoadCoreClass() {

        foreach (self::$_core as $key => $core) {
            require_once ($core);
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
            require_once ($val);
            self::$_lib[$key] = new $key;
        }
    }

}
