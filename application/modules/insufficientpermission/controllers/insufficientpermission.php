<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class InsufficientPermission extends CI_Controller {

    function __construct() {
        parent::__construct();

        $admin_userdata = $this->session->userdata(APP_PFIX . 'admin');
        if (!$admin_userdata['logged_in_admin']) {
            $this->session->set_flashdata('errorlogin', "You must log in!");
            redirect('login/index');
        }
    }

    function index() {
        $this->load->view('error_wrapper', array('main_content' => 'insufficientpermission'));
    }

}
