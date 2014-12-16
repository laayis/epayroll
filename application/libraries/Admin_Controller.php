<?php

Class Admin_Controller extends CI_Controller {

    public function __construct() {

        parent::__construct();

        $this->load->library('gcacl');
        $admin_userdata = $this->session->userdata(APP_PFIX . 'admin');
        if (!$admin_userdata['logged_in_admin']) {
            $this->session->set_flashdata('errorlogin', "You must log in!");
            redirect('login/index');
        }
    }

}
?>

