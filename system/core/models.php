<?php

/**
 * Description of models
 *
 * @author huangshihuai_91
 */
class Sys_models {

    public $db;
    public $CONFIG;
    public $load;

    public function __construct() {
        $this->init();
    }

    public function __destruct() {
        unset($this->db);
    }

    private function init() {
        $this->init_mysql();
        $this->init_class();
    }

    protected function init_mysql() {
        require_once (SYS_DB . '/database.php');
        $this->db = Sys_database::getSingleton();
    }

    protected function init_class() {
        // 初始化
        require_once SYS_CONF . '/configClass.php';
        $this->CONFIG = &configClass::getInstance()->configure;

        require_once SYS_CORE . '/loader.php';
        $this->load = new Sys_loader($this); //Sys_loader::getInstance($this);
    }

}
