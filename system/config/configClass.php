<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of config
 *
 * @author huangshihuai_91
 */
final class configClass {

    public $configure = array();
    private static $_instance;

    private function __clone() {

    }

    private function __construct() {
        $this->init();
    }

    private function init() {
        $this->configure['db'] = array(
            'db_host' => 'localhost',
            'db_database' => 'test',
            'db_user' => 'root',
            'db_pwaasword' => 'root',
        );
        $this->configure['template'] = array(
            'file_extension' => 'tpl',
        );
    }

    public static function &getInstance() {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

}
