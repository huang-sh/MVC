<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of template
 *
 * @author huangshihuai_91
 */
class Sys_template {

    private static $_instance;

    private function __construct() {

    }

    private function __clone() {

    }

    public static function &getInstance() {

        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

}
