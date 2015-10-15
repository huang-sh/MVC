<?php

/**
 * Description of getFirstMVC
 *
 * @author huangshihuai_91
 */
class modelGetFirstMVC extends Sys_models {

    public function __construct() {
        parent::__construct();
    }

    public function getMysql() {
        $this->load->model('test');
        $result = array();
        $result['admin_users'] = $this->test->test('select * from admin_users limit 10')->result_array();
        $result['admin_map_role'] = $this->db->query('SELECT * FROM admin_map_role limit 10')->result_array();
        return $result;
    }

}
