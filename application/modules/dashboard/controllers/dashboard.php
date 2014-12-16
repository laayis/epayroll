<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        $admin_userdata = $this->session->userdata(APP_PFIX . 'admin');
        if (!$admin_userdata['logged_in_admin']) {
            $this->session->set_flashdata('errorlogin', "You must log in!");
            redirect('login/index');
        }
        $this->load->model('rbac/rbacmodel');
    }

    function index() {
//        if (!$this->rbacmodel->checkPermission()) {
//            $main_content = 'insufficientpermission/insufficientpermission';
//            $wrapper = 'error_wrapper';
//        } else {
        $main_content = 'dashboard';
        $wrapper = 'admin_wrapper';
        $data['main_content'] = $main_content;
        $this->load->view($wrapper, $data);
    }

    function logout() {

        //log the employee out
        $this->session->unset_userdata(APP_PFIX . 'admin');
        redirect('login', 'refresh');
    }

}
