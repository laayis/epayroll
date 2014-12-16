<?php 
if(!defined('BASEPATH')) die('Dont try to access it directly you maroon.');

class RBACModel extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function checkPermission() {
    	$this->load->library('gcacl');
        
    	## get the parm key
        //$perm_key = 'access_admin';
        
    	$perm_key = $this->gcacl->getPermKeyFromURI();
        //echo $perm_key;
        
        $has_permission = $this->gcacl->hasPermission($perm_key);
        //echo '<br>'.$has_permission;
        
        if($this->gcacl->hasPermission($perm_key) == TRUE) { 
            return true;
        } else {
        	//redirect('insufficientpermission');
        	//$this->load->view('admin_wrapper', array('main_content' => 'insufficientpermission/insufficientpermission'));
        	//die;
        }
        
    }
}
?>