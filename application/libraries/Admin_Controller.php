<?php

Class Admin_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
         if (!$this->ion_auth->logged_in()) {
            //redirect them to the login page
            redirect('auth/login', 'refresh');
        }
    }
}

?>
