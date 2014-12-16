<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Allowances extends Admin_Controller {

    protected $wrapper;
    
    public $validation_rules = array(

        'allowances_name' => array(
            'field' => 'allowances_type',
            'label' => 'Allowances Type',
            'rules' => 'trim|required|max_length[100]'
        ),
        'allowances_code' => array(
            'field' => 'allowances_amount',
            'label' => 'Allowances Amount',
            'rules' => 'trim|required|max_length[100]'
        ),
    );

    public function __construct() {
        parent::__construct();
        $admin_userdata = $this->session->userdata(APP_PFIX . 'admin');
        if (!$admin_userdata['logged_in_admin']) {
            $this->session->set_flashdata('errorlogin', "You must log in!");
            redirect('login/index');
        }
         $this->load->library('gcacl');
         
        $this->load->model('allowances_m');

        $this->wrapper = 'admin_wrapper';
    }

    public function detail($id) {
        $data = array(
            'main_content' => 'view',
            'data' => $this->allowances_m->get($id)
        );
        $this->load->view('admin_wrapper', $data);
    }

    public function index() {
        //$this->gcacl->hasPermission('attribute_index') != TRUE ? redirect(ADMIN_BASE_URL) : '';
        $data = array(
            'main_content' => 'list',
            'record' => $this->allowances_m->get(),
        );

        $this->load->view('admin_wrapper', $data);
    }

    public function add() {
//$this->gcacl->hasPermission('attribute_add') != TRUE ? redirect(ADMIN_BASE_URL) : '';
//        $this->load->helper('ckeditor'); // for loading ckeditor
        $this->load->library('form_validation');

        $this->form_validation->set_rules($this->validation_rules);
        if ($this->form_validation->run() == TRUE) {
            // preparing for insertion
            foreach ($this->validation_rules as $k => $v) {
                $fields[] = $v['field'];
            }
//            $fields = array('title', 'slug', 'description', 'date', 'description', 'url', 'status');
            $data = $this->allowances_m->array_from_post($fields);

            if ($this->allowances_m->save($data)) {
                $this->session->set_flashdata('success', 'New Allowances Added Successfully.');
            } else {
                $this->session->set_flashdata('error', 'sorry, Allowances cannot be Added.');
            }
            redirect('allowances/add/', 'refresh');
        } else {
            $clinics = new stdClass();
            // Go through all the known fields and get the post values
            foreach ($this->validation_rules as $key => $field) {
                $clinics->$field['field'] = set_value($field['field']);
            }
        }

        $data = array(
            'method' => 'add',
            'main_content' => 'form',
            'editData' => $clinics,
        );
        $this->load->view('admin_wrapper', $data);
    }

    public function edit($id = NULL) {
        //$this->gcacl->hasPermission('disease_edit') != TRUE ? redirect(ADMIN_BASE_URL) : '';
        $this->load->helper('ckeditor'); // for loading ckeditor

        $event = $this->allowances_m->get($id);

        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->validation_rules);
        if ($this->form_validation->run() == TRUE) {

            // preparing for insertion
            foreach ($this->validation_rules as $k => $v) {
                $fields[] = $v['field'];
            }
            $data = $this->allowances_m->array_from_post($fields);

            if ($this->allowances_m->save($data, $id)) {
                $this->session->set_flashdata('success', 'Allowances edited Successfully.');
            } else {
                $this->session->set_flashdata('error', 'sorry, Allowances cannot be Added.');
            }
            
            redirect('allowances/index', 'refresh');
        }

        $data = array(
            'method' => 'edit',
            'editData' => $event,
             'main_content' => 'form',
        );
        $this->load->view('admin_wrapper', $data);
    }

    /**
     * delete single and record with images
     */
    public function delete($id) {
        //$this->gcacl->hasPermission('user_delete') != TRUE ? redirect(ADMIN_BASE_URL) : '';
       if($this->db->delete('allowances', array('allowances_id' => $id))){
            
            $this->session->set_flashdata( 'sucess', 'Sucessfully deleted' );
       }else{
           $this->session->set_flashdata( 'error', 'Can\'t delete .' );

       }
        redirect( 'allowances/', 'refresh' );
    }

    /**
     * delete multiple records with images
     */
    public function bulk_delete_images() {
        $ids = $this->input->post('id');
        if ($ids) {
            if ($deleted_count = $this->allowances_m->delete_images($ids)) {
                $this->session->set_flashdata('success', sprintf('Selected Record(s) %s of %s deleted successfully.', $deleted_count, count($ids)));
            } else {
                $this->session->set_flashdata('error', 'Sorry, record(s) delete failed. Please try again later.');
            }
        }
        redirect('allowances/index', 'refresh'); // . $uripart
    }

    /*
     * single status change
     */

    public function changestatus() {
        $task = $this->uri->segment(3);
        $status = ($task == 'activate') ? '1' : '0';
        $id = $this->uri->segment(4);

        $flag = $this->allowances_m->changeStatus($id, $status);

        if ($flag) {
            $this->session->set_flashdata('success', 'Record ' . ucfirst($task) . 'd' . ' Successfully.');
        } else
            $this->session->set_flashdata('error', 'Status operation failed. Please try again later.');

        redirect('allowances/index', 'refresh'); //. $uripart
    }

    /*
     * for bulk status change
     */

    public function bulkstatus() {
        $task = $this->uri->segment(3);
        $status = ($task == 'activate') ? '1' : '0';
        $id = $this->input->post('id');

        $flag = $this->allowances_m->changeStatus($id, $status);

        if ($flag) {
            $this->session->set_flashdata('success', 'Record ' . ucfirst($task) . 'd' . ' Successfully.');
        } else
            $this->session->set_flashdata('error', 'Status operation failed. Please try again later.');

        redirect('allowances/index', 'refresh'); //. $uripart
    }

  

}
