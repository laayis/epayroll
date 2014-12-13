<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usermodel extends CI_Model {

    function __construct() {
        parent::__construct();

        $admin_userdata = $this->session->userdata(APP_PFIX . 'admin');
        if (!$admin_userdata['logged_in_admin']) {
            $this->session->set_flashdata('errorlogin', "You must log in!");
            redirect('login/index');
        }
    }

    ## count number of records in a deal (for paging)

    function count_record($searchkey = FALSE) {
        //$noofrecord = $this->db->count_all( 'tbl_deals' );

        if ($searchkey)
            $this->db->like('username', $searchkey);

        $this->db->from('users');

        $noofrecord = $this->db->count_all_results();

        return $noofrecord;
    }

    function getUser($searchkey = FALSE, $num = FALSE, $offset = FALSE) {
        $this->db->order_by('cdate asc, username asc');

        if ($searchkey)
            $this->db->like('username', $searchkey);

        if ($num || $offset)
            $q = $this->db->get('users', $num, $offset);
        else
            $q = $this->db->get('users');

        if ($q->num_rows() > 0)
            return $q->result();

        $q->free_result();
    }

    function getUserById($id) {

        $this->db->where('ID', $id);
        $q = $this->db->get('users');
        if ($q->num_rows() > 0)
            return $q->row();
        $q->free_result();
    }

    function add($img_name) {
        $data = array(
            'username' => $this->input->post('username', TRUE),
            'password' => do_hash($this->input->post('password', TRUE), 'md5'),
            'email' => $this->input->post('email', TRUE),
            'fname' => $this->input->post('fname', TRUE),
            'mname' => $this->input->post('mname', TRUE),
            'lname' => $this->input->post('lname', TRUE),
            'position' => $this->input->post('position', TRUE),
            'desc' => $this->input->post('desc', TRUE),
            'addedby' => $this->session->userdata('id'),
            'cdate' => date('Y-m-d H:i:s'),
            //'status'			=>  $this->input->post( 'status', TRUE ),
            'image' => $img_name
        );

        $this->db->insert('users', $data);

        ## insert into  relation table
        $uid = $this->db->insert_id();
    }

    function edit($img_name) {
        $data = array(
            'username' => $this->input->post('username', TRUE),
            'password' => do_hash($this->input->post('password', TRUE), 'md5'),
            'email' => $this->input->post('email', TRUE),
            'fname' => $this->input->post('fname', TRUE),
            'mname' => $this->input->post('mname', TRUE),
            'lname' => $this->input->post('lname', TRUE),
            'position' => $this->input->post('position', TRUE),
            'desc' => $this->input->post('desc', TRUE),
            //'addedby'                   =>  $this->session->userdata('id'), 
            //'mdate' => date('Y-m-d H:i:s'),
            //'status'			=>  $this->input->post( 'status', TRUE ),
            'image' => $img_name
        );

        $uid = $this->input->post('id');

        $this->db->where('ID', $uid);
        $this->db->update('users', $data);

        //echo $this->db->last_query(); die();
    }

    ##### delete actions

    /**
     * delete single record
     * 
     * @param int $id
     */
    public function deleteRecord($id) {
        $this->db->delete('users', array('ID' => $id));
    }

    /**
     * delete bulk records
     * 
     * @param array $id
     * @param string $status
     * 
     * @returns boolean
     */
    public function deleteRecordBulk($id) {
        $ids = implode(',', $id);
        $query = "DELETE FROM `users` WHERE `ID` IN ({$ids})";

        return $this->db->query($query);
    }

    ##### status(activate/deactivate) actions

    /**
     * change status of single record
     * 
     * @param int $id
     * @param string $status
     * @returns boolean
     */
    public function changeStatus($id, $status) {
        $this->db->where('ID', $id);

        return $this->db->update('users', array('status' => $status));
    }

    /**
     * change status of bulk records
     * 
     * @param array $id
     * @param string $status
     * 
     * @returns boolean
     */
    public function changeStatusBulk($id, $status) {
        $ids = implode(',', $id);
        $query = "UPDATE `users` SET `status` = '{$status}' WHERE `ID` IN ({$ids})";

        return $this->db->query($query);
    }

}
