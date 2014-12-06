<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            redirect('auth', 'refresh');
        }
    }

    function index() {

        $main_content = 'dashboard';
        $wrapper = 'admin_wrapper';
        $data['main_content'] = $main_content;
        $this->load->view($wrapper, $data);
    }
    function employeedash(){
        $main_content = 'dashboard';
        $wrapper = 'employee_wrapper';
        $data['main_content'] = $main_content;
        $this->load->view($wrapper, $data);
    }

    function logout() {

        $this->data['title'] = "Logout";

        //log the user out
        $logout = $this->ion_auth->logout();

        //redirect them to the login page
        $this->session->set_flashdata('message', $this->ion_auth->messages());
        redirect('auth/login', 'refresh');
    }

}
