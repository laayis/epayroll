<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employee_m extends CI_Model {

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

        $this->db->from('employee');

        $noofrecord = $this->db->count_all_results();

        return $noofrecord;
    }

    function getUser($searchkey = FALSE, $num = FALSE, $offset = FALSE) {
        $this->db->order_by('joining_date asc, username asc');

        if ($searchkey)
            $this->db->like('username', $searchkey);

        if ($num || $offset)
            $q = $this->db->get('employee', $num, $offset);
        else
            $q = $this->db->get('employee');

        if ($q->num_rows() > 0)
            return $q->result();

        $q->free_result();
    }

    function getUserById($id) {

        $this->db->where('ID', $id);
        $q = $this->db->get('employee');
        if ($q->num_rows() > 0)
            return $q->row();
        $q->free_result();
    }

    function add($img_name) {
        $data = array(
            'username' => $this->input->post('username', TRUE),
            'password' => do_hash($this->input->post('password', TRUE), 'md5'),
            'email' => $this->input->post('email', TRUE),
            'first_name' => $this->input->post('first_name', TRUE),
            'last_name' => $this->input->post('last_name', TRUE),
            'phone' => $this->input->post('phone', TRUE),
            'probation_status' => $this->input->post('probation_status', TRUE),
            'marital_status' => $this->input->post('marital_status', TRUE),
            'department_name' => $this->input->post('department_name', TRUE),
            'designation_name' => $this->input->post('designation_name', TRUE),
            'grade' => $this->input->post('grade', TRUE),
            'basic_salary' => $this->input->post('basic_salary', TRUE),
            'joining_date' => $this->input->post('joining_date', TRUE),
            'address' => $this->input->post('address', TRUE),
            'image' => $img_name
        );

        $this->db->insert('employee', $data);

        ## insert into  relation table
        $uid = $this->db->insert_id();
    }

    function edit($img_name) {
        $data = array(
            'username' => $this->input->post('username', TRUE),
            'password' => do_hash($this->input->post('password', TRUE), 'md5'),
            'email' => $this->input->post('email', TRUE),
            'first_name' => $this->input->post('first_name', TRUE),
            'last_name' => $this->input->post('last_name', TRUE),
            'phone' => $this->input->post('phone', TRUE),
            'probation_status' => $this->input->post('probation_status', TRUE),
            'marital_status' => $this->input->post('marital_status', TRUE),
            'department_name' => $this->input->post('department_name', TRUE),
            'designation_name' => $this->input->post('designation_name', TRUE),
            'grade' => $this->input->post('grade', TRUE),
            'basic_salary' => $this->input->post('basic_salary', TRUE),
            'joining_date' => $this->input->post('joining_date', TRUE),
            'address' => $this->input->post('address', TRUE),
            'image' => $img_name
        );

        $uid = $this->input->post('id');

        $this->db->where('ID', $uid);
        $this->db->update('employee', $data);

        //echo $this->db->last_query(); die();
    }

    ##### delete actions

    /**
     * delete single record
     * 
     * @param int $id
     */
    public function deleteRecord($id) {
        $this->db->delete('employee', array('ID' => $id));
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
        $query = "DELETE FROM `employee` WHERE `ID` IN ({$ids})";

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

        return $this->db->update('employee', array('status' => $status));
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
        $query = "UPDATE `employee` SET `status` = '{$status}' WHERE `ID` IN ({$ids})";

        return $this->db->query($query);
    }

    #### user roles

    /**
     * change/assign user to roles 
     */
    public function saveUserRoles() {
        foreach ($this->input->post() as $k => $v) {
            if (substr($k, 0, 5) == "role_") {
                $roleID = str_replace("role_", "", $k);
                if ($v == '0' || $v == 'x') {
                    $strSQL = sprintf("DELETE FROM `employee_roles` WHERE `userID` = %u AND `roleID` = %u", $_POST['userID'], $roleID);
                } else {
                    $strSQL = sprintf("REPLACE INTO `employee_roles` SET `userID` = %u, `roleID` = %u, `addDate` = '%s'", $_POST['userID'], $roleID, date("Y-m-d H:i:s"));
                }
                $this->db->query($strSQL);
            }
        }
    }

    ### user permissions

    /**
     * change or assign user permissions 
     */
    public function saveUserPerms() {
        foreach ($_POST as $k => $v) {
            if (substr($k, 0, 5) == "perm_") {
                $permID = str_replace("perm_", "", $k);
                if ($v == 'x') {
                    $strSQL = sprintf("DELETE FROM `employee_perms` WHERE `userID` = %u AND `permID` = %u", $_POST['userID'], $permID);
                } else {
                    $strSQL = sprintf("REPLACE INTO `employee_perms` SET `userID` = %u, `permID` = %u, `value` = %u, `addDate` = '%s'", $_POST['userID'], $permID, $v, date("Y-m-d H:i:s"));
                }
                mysql_query($strSQL);
            }
        }
    }

}
