<?php

class Loginmodel extends CI_Model {

    function __construct() {
        //die('fuck');
        parent::__construct();
    }

    public function verify_user() {
        //die('model called');
        //$data = array( APP_PFIX . 'id' => '', APP_PFIX . 'logged_in_admin' => FALSE);
        $data = array(
            APP_PFIX . 'admin' => array(
                'adminid' => '',
                'logged_in_admin' => FALSE,
            )
        );

        $this->db->select('ID');
        $this->db->where('username', $this->input->post('username', TRUE));
        $this->db->where('password', do_hash($this->input->post('password', TRUE), 'md5'));
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            $row = $query->row();
//            $data = array(
//                APP_PFIX . 'id' => @$row->ID,
//                APP_PFIX . 'logged_in_admin' => TRUE
//            );

            $data = array(
                APP_PFIX . 'admin' => array(
                    'adminid' => @$row->ID,
                    'logged_in_admin' => TRUE,
                )
            );
        }
        return $data;
    }

}

/* End of file adminmodel.php */
/* Location: ./application/modules/admin/models/adminmodel.php */
