<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of myCookie
 *
 * @author huangshihuai_91
 */
class myCookie extends Sys_controller {

    public function __construct() {
        parent::__construct();
    }

    public function __destruct() {
        parent::__destruct();
    }

    public function myCookie($name = '', $mycookie = '') {
        $arr = array(1, 2, 3, 4, 5,);
        $arrSerialize = serialize($arr);
        $arry = array();
        setcookie('test1', $arrSerialize, time() + 30, '/myCookie');
        if ($name != '' && $mycookie != '') {
            setcookie($name, $mycookie, time() + 30, '/myCookie');
        }
        $this->load->model('modelTest');
        $arry[] = $this->modelTest->getCookie('test1');
        if (isset($_COOKIE['test1'])) {
            $arry[] = unserialize($_COOKIE['test1']);
        } else {
            unset($_COOKIE['test1']);
        }
        var_dump($arry);
    }

    public function deleteCookie($key = '') {
        if (empty($key) || !isset($_COOKIE[$key])) {
            return;
        }
        setcookie($key, '', time(), '/myCookie');
        return;
    }

}
