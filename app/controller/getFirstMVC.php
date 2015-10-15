<?php

/**
 * Description of getFirstMVC
 *
 * @author huangshihuai_91
 */
class getFirstMVC extends Sys_controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        echo 'This Index Function';
        $this->load->model('modelGetFirstMVC');
        $result = $this->modelGetFirstMVC->getMysql();
        var_dump($result);
    }

    public function test() {
        echo 'This Test Function';
    }

    public function html() {
        $inde = 10;
        $this->assert('h', $inde);
        $this->assert('hd', 'hd');
        $this->view('view/my.html');
        return;
    }

    public function fun() {
        echo 'This Fun Function';
    }

    public function config() {
        var_dump($this->CONFIG);
    }

}
