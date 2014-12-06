<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Settings extends CI_Controller {

    public $cpmenu;
    
    protected $insufficient_permission_view = 'insufficientpermission/insufficientpermission';

    function __construct() {

        parent::__construct();

        $admin_userdata = $this->session->userdata(APP_PFIX . 'admin');
        if (!$admin_userdata['logged_in_admin']) {
            $this->session->set_flashdata('errorlogin', "You must log in!");
            redirect('login/index');
        }
        //$this->load->model('menumodel');
        //$this->cpmenu = $this->menumodel->retrieveCPMenu();

        $this->load->model('settingsmodel');
        
        $this->load->model('rbac/rbacmodel');
        
    }

    public function index() {
    	if(!$this->rbacmodel->checkPermission()) {
    		$main_content = $this->insufficient_permission_view;
    	} else {
    		$main_content = 'settings';
    	}

        $data = array(
            'main_content' => $main_content,
            'settings' => $this->settingsmodel->getSettings(),
        );
        $this->load->view('admin_wrapper', $data);
    }

    public function update() {
    	$this->rbacmodel->checkPermission();
    	
        //print_r($_POST);
        //echo "<script>alert('update called');</script>";
        //echo 'updated';
        //return 'called';

        $status = $this->settingsmodel->updateSettings();
        echo $status;
    }

}
