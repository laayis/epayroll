<?php
if( !defined('BASEPATH')) exit('Direct access to the scripts is not allowed');

class RBAC extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
        $this->load->model('rbacmodel');
        $this->load->model('rolesmodel');
        $this->load->model('permsmodel');
        
        $this->load->library( 'gcacl');
    }
    
    public function index()
    {
    	if(!$this->rbacmodel->checkPermission()) {
    		$wrapper = 'error_wrapper';
    		$main_content = 'insufficientpermission/insufficientpermission';
    	} else {
    		$wrapper = 'admin_wrapper';
    		$main_content = 'rbac';
    	}
    	
        $this->load->view($wrapper , array('main_content'=>$main_content));
    }
    
    
    ##### ROLES TASKS
    
    #list roles
    public function roles()
    {
    	if(!$this->rbacmodel->checkPermission()) {
    		$main_content = 'insufficientpermission/insufficientpermission';
    	} else {
    		$main_content = 'roles';
    	}
    	
        $data = array(
            'main_content'  =>  $main_content,
        );
        $this->load->view('admin_wrapper' , $data);
    }
    
    # add role
    public function addrole()
    {
    	if(!$this->rbacmodel->checkPermission()) {
    		$main_content = 'insufficientpermission/insufficientpermission';
    	} else {
    		$main_content = 'addrole';
    	}
    	
        if($this->input->post('action') == 'saveRole')
        {
            $this->rolesmodel->saveRole();
            $this->session->set_flashdata('success' , 'Role Added successfully.');
            redirect('rbac/addrole/' , 'refresh');
        }
        
        $data = array(
            'main_content'  =>  $main_content,
            'roleslist'     =>  $this->rolesmodel->getRoles(),
        );
        $this->load->view('admin_wrapper' , $data);
    }
    
    # edit role
    public function editrole()
    {
    	if(!$this->rbacmodel->checkPermission()) {
    		$main_content = 'insufficientpermission/insufficientpermission';
    	} else {
    		$main_content = 'editrole';
    	}
    	
        if($this->input->post('action') == 'saveRole') 
        {
        	$this->rolesmodel->saveRole();
        	$this->session->set_flashdata('success' , 'Role Edited successfully.');
            redirect('rbac/editrole/' . $this->input->post('roleID') , 'refresh');
        }
         
        $roleID = $this->uri->segment(3);
        $data = array(
            'main_content'  =>  $main_content,
            'roleID'        =>  $roleID,
            'info'          =>  $this->rolesmodel->getRoleById($roleID),
            'roleslist'     =>  $this->rolesmodel->getRoles(),
        );
        $this->load->view('admin_wrapper' , $data);
    }
    
    # delete role
    public function delRole(){
    	if(!$this->rbacmodel->checkPermission()) {
    		$this->load->view('admin_wrapper', array('main_content'=>'insufficientpermission/insufficientpermission'));
    	} else {
    	
	        if($this->input->post('action') == 'delRole') 
	        {
	            $this->rolesmodel->delRole();
	            $this->session->set_flashdata('success' , 'Role and dependent data are deleted successfully.');
	            redirect('rbac/roles/', 'refresh');
	        }
    	}
    }
    
    #### PERMISSION TASK
    
    #list permissions
    public function perms() 
    {
    	if(!$this->rbacmodel->checkPermission()) {
    		$main_content = 'insufficientpermission/insufficientpermission';
    	} else {
    		$main_content = 'perms';
    	}
    	
        $data = array(
            'main_content'  =>  $main_content,
        );
        $this->load->view('admin_wrapper' , $data);
    }
    
    # manage (add / edit) permission
    public function manageperm()
    {
    	if(!$this->rbacmodel->checkPermission()) {
    		$main_content = 'insufficientpermission/insufficientpermission';
    	} else {
    		$main_content = 'manageperm';
    	}
    	
        $permID = '';
        if($this->uri->segment(3))
            $permID = $this->uri->segment(3);
        
        if($this->input->post('action') == 'savePerm')
        {
            $this->permsmodel->savePerm();
            $this->session->set_flashdata('success' , 'Permission Data Saved Successfully.');
            redirect('rbac/manageperm/' . $this->input->post('permID') , 'refresh');
        }
            
        $data = array(
            'main_content'  =>  $main_content,
            'permID'        =>  $permID,
            'permslist'     =>   $this->permsmodel->getPerms(),
        );
        $this->load->view('admin_wrapper' , $data);
    }
    
    public function delPerm() {
    	if(!$this->rbacmodel->checkPermission()) {
    		$this->load->view('admin_wrapper', array('main_content'=>'insufficientpermission/insufficientpermission'));
    	} else {
    	 
	    	if($this->input->post('action') == 'delPerm')
	    	{
	    		$this->permsmodel->delPerm();
	    		 
	    		$this->session->set_flashdata('success' , 'Role and dependent data are deleted successfully.');
	    		redirect('rbac/roles/', 'refresh');
	    	}
    	}
    }
    
    
}
?>