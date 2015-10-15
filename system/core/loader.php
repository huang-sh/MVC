<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of loader
 *
 * @author huangshihuai_91
 */
class Sys_loader {

    //private static $_instance;
    private $_control;

    public function __construct(&$_control) {
        $this->_control = $_control;
    }

    public function __destruct() {
        unset($this->_control);
    }

    public function model($modelName = '') {
        $filePath = APP_MODEL . '/' . $modelName . '.php';
        if (is_file($filePath)) {
            require_once $filePath;
            $this->_control->$modelName = new $modelName;
            unset($filePath);
            return true;
        }
        unset($filePath);
        return false;
    }

}
