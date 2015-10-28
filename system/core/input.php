<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of input
 *
 * @author huangshihuai_91
 */
class Sys_input {

    public function __construct() {

    }

    public function __destruct() {

    }

    public function get($is_key = '') {
        if ($is_key === NULL && !empty($_GET)) {
            return $_GET;
        }
        return empty($_GET[$is_key]) ? null : $_GET[$is_key];
    }

}
