<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mySession
 *
 * @author huangshihuai_91
 */
class mySession extends Sys_controller {

    public function __construct() {
        parent::__construct();
    }

    public function mySession() {
        session_start();
    }

    public function delSession() {

    }

}
