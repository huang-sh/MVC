<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of index
 * j
 * @author huangshihuai_91
 */
class index extends Sys_controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        if (isset($_COOKIE['test1'])) {
            var_dump($_COOKIE['test1']);
        }
        echo 'This Main Html';
    }

    public function page404() {
        echo 'My Page Is Not Fount!!!';
    }

}
