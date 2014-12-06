<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Settingsmodel extends CI_Model {

    public function __construct() {
        parent::__construct();

        $admin_userdata = $this->session->userdata(APP_PFIX . 'admin');
        if (!$admin_userdata['logged_in_admin']) {
            $this->session->set_flashdata('errorlogin', "You must log in!");
            redirect('login/index');
        }
    }

    public function getSettings() {
        $this->db->order_by('order');
        $q = $this->db->get('settings');

        if ($q->num_rows() > 0)
            return $q->result();

        $q->free_result();
    }

    /**
     * change status of single record
     * 
     * @param int $id
     * @param string $status
     * @returns boolean
     */
    public function updateSettings() {
        $this->db->where('settings_name', $this->input->post('field', TRUE));
        return $this->db->update('settings', array('settings_value' => $this->input->post('value', TRUE)));
    }

}
