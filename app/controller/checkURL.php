<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of checkURL
 *
 * @author huangshihuai_91
 */
class checkURL extends Sys_controller {

    public function __construct() {
        parent::__construct();
    }

    function validateURL($URL) {
        $pattern_1 = "/^(http|https):\/\/(([A-Z0-9][A-Z0-9_-]*)(\.[A-Z0-9][A-Z0-9_-]*)+."
                . "(com|cn|org|net|dk|at|us|tv|info|uk|co.uk|biz|se)$)(:(\d+))?\/?/i";
        $pattern_2 = "/^(www)((\.[A-Z0-9][A-Z0-9_-]*)+.(com|cn|org|net|dk|at|us|tv|info|uk|co.uk|biz|se)$)(:(\d+))?\/?/i";
        $pattern_3 = '/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i';
        if (preg_match($pattern_1, $URL)) {
            return true;
        } else {
            return false;
        }
    }

    public function test1($URL) {
        //$search_1 = '/^(((http|https):\/\/)|www\.)[A-Za-z0-9]+\.[A-Za-z0-9]+[\/=\?%\-&_~`@[\]\':+!]*([^<>\"])*$/';
        $search_1 = '/^(((http|https):\/\/)|www\.)[A-Za-z0-9]+\.[A-Za-z0-9]+[\/=\?%\-&_~`@[\]\':+!]*([^<>\"])*$/';
        if (preg_match($search_1, $URL)) {
            return true;
        }
        return false;
    }

    public function test2($URL) {
        $search_2 = '/^(((http|https):\/\/)|www\.)([A-Z0-9][A-Z0-9_-]*)+.(com|cn|org|net)$(:(\d+))?\/?/i';
        if (preg_match($search_2, $URL)) {
            return true;
        }
        return false;
    }

    public function checkURL() {
        $arr = array();
        if ($this->test1('http://localhost.baidu.gg:6354/?XDEBUG_SESSION_STOP_NO_EXEC=netbeans-xdebugsdfdsf---223__sds')) {
            $arr[] = 'OK';
        } else {
            $arr[] = 'ERROR';
        }
        if ($this->test1('www.applEEErere.com.cn')) {
            $arr[] = 'OK';
        } else {
            $arr[] = 'ERROR';
        }
        var_dump($arr);
    }

}
