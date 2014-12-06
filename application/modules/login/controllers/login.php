<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    //public $data = array();

    function __construct() {
        parent::__construct();
        //$this->data['main_content'] = 'login';
        $this->load->model('loginmodel');
    }
    

    public function index() {
        $admin_userdata = $this->session->userdata(APP_PFIX . 'admin');
        if($admin_userdata['logged_in_admin'])
        {
            redirect('dashboard' , 'redirect');
        }
        else
        {
        	$data = array(); // if any data variables etc are needed
            //$data['main_content'] = 'login';
            //$this->load->view('login_wrapper', $data);
            $this->load->view('login', $data);
        }
    }

    public function verify() { 
        //$this->load->model( 'loginmodel' );
        $this->load->library('form_validation');

        ### validation rules
        // @args: field_name, display_name(Human readable) (if error), validation rules
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            //die('whey here');

            $data['main_content'] = 'login';
            $this->load->view('login_wrapper', $data);
        } else {

            $data = $this->loginmodel->verify_user();
            if ($data[APP_PFIX . 'admin']['logged_in_admin']) {
                $this->session->set_userdata($data);
                redirect('dashboard', 'refresh');
            } else {

//                echo "called damn";
//                die();
                $this->session->set_flashdata('errorlogin', 'Invalid Username or Password.');
                redirect(base_url(), 'refresh');
            }
        }
    }

}
