<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of database
 *
 * @author huangshihuai_91
 */
class Sys_database {

    private static $_instance;
    protected $conn;
    protected $db_host;
    protected $db_user;
    protected $db_pwd;
    protected $db_database;
    protected $db_coding;
    protected $result;

    private function __construct() {
        $this->init();
    }

    public function __destruct() {
        if ($this->conn) {
            mysqli_close($this->conn);
            unset($this->conn);
        }
    }

    private function __clone() {

    }

    /**
     * 对象序列化
     */
    private function __wakeup() {

    }

    public static function &getSingleton() {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function init(/* $db_host, $db_user, $db_pwd, $db_database, $db_coding */) {
        $config = &configClass::getInstance()->configure;
        $this->db_host = $config['db']['db_host'];
        $this->db_user = $config['db']['db_user'];
        $this->db_pwd = $config['db']['db_pwaasword'];
        $this->db_database = $config['db']['db_database'];
        $this->connect();
    }

    private function connect() {
        $this->conn = mysqli_connect($this->db_host, $this->db_user, $this->db_pwd, $this->db_database);
        if (!$this->conn || $this->conn->connect_errno) {
            die('deatbase connect Error: ' . $this->conn->connect_errno);
        }
    }

    public function &query($sql) {

        $this->result = $this->conn->query($sql);
        return $this;
    }

    public function result_array() {
        $result = array();
        foreach ($this->result as $item) {
            $result[] = $item;
        }
        unset($this->result);
        return $result;
    }

    public function result_row() {

    }

}
