<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tets
 *
 * @author huangshihuai_91
 */
class test extends Sys_controller {

    public function index() {
        $a = 'this first a';
        $contents = array(
            'a' => 'this second a',
            'b' => 'this first b',
            'c' => 'this first c',
            'd' => 'this first d',
        );
        extract($contents);
        var_dump($contents);
        echo $a . '<br />' . $b . '<br />' . $c . '<br />' . $d;
    }

    public function is_escape() {
        // html 过滤
        $str = "This is some <b>bold</b> text.";
        echo htmlspecialchars($str);
    }

}
