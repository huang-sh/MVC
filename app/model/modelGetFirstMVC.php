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
        $result = array();
        $this->load->model('modelTest');
        $result['admin_users'] = $this->modelTest->test('select * from admin_users limit 3');
        $result['admin_map_role'] = $this->db->query('SELECT * FROM admin_map_role limit 3')->result_array();
        return $result;
    }

}
