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
        $this->load = new Sys_loader($this); //Sys_loader::getInstance($this);
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
        $arrKey = array_keys($this->var);
        foreach ($arrKey as $key) {
            unset($key);
        }
        unset($arrKey);
        unset($contents);
        die();
        /*
          extract($this->var);
          ob_start();
          ob_clean();
          include($path);
          ob_end_flush();
         */
    }

    public function assert($name, $parame) {
        $this->var[$name] = $parame;
    }

}
