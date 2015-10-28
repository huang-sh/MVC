<?php

/**
 * Description of controller
 *
 * @author huangshihuai_91
 */
class Sys_controller {

    private $var = array();
    public $CONFIG;
    public $load;
    public $template;

    public function __construct() {
        $this->init();
    }

    public function __destruct() {
        unset($this->var);
        unset($this->CONFIG);
        unset($this->load);
    }

    private function init() {
        // 初始化
        require_once SYS_CONF . '/configClass.php';
        $this->CONFIG = &configClass::getInstance()->configure;

        require_once SYS_CORE . '/loader.php';
        $this->load = new Sys_loader($this);
    }

    public function get() {
        return libGet();
    }

    public function post() {
        libPost();
    }

    public function view($path = '') {
        if (empty($path) || !is_file(ROOT_PATH . '/' . $path)) {
            return;
        }

        extract($this->var);
        ob_start();
        ob_clean();
        include($path);
        $contents = ob_get_contents();
        ob_end_clean();
        echo $contents;
        unset($contents);
        unset($this->var);
        die();
    }

    public function assert($name, $parame) {
        $this->var[$name] = $parame;
    }

}
