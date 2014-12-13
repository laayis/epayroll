<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Department extends Admin_Controller {

    protected $wrapper;
    
    public $validation_rules = array(

        'department_name' => array(
            'field' => 'department_name',
            'label' => 'Department Name',
            'rules' => 'trim|required|max_length[100]'
        ),
        'department_code' => array(
            'field' => 'department_code',
            'label' => 'Department Code',
            'rules' => 'trim|required|max_length[100]'
        ),
    );

    public function __construct() {
        parent::__construct();
         $this->load->library('gcacl');
         
        $this->load->model('department_m');

        $this->wrapper = 'admin_wrapper';
    }

    public function detail($id) {
        $data = array(
            'main_content' => 'view',
            'data' => $this->department_m->get($id)
        );
        $this->load->view('admin_wrapper', $data);
    }

    public function index() {
        //$this->gcacl->hasPermission('attribute_index') != TRUE ? redirect(ADMIN_BASE_URL) : '';
        $data = array(
            'main_content' => 'list',
            'record' => $this->department_m->get(),
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
            $data = $this->department_m->array_from_post($fields);

            if ($this->department_m->save($data)) {
                $this->session->set_flashdata('success', 'New Department Added Successfully.');
            } else {
                $this->session->set_flashdata('error', 'sorry, Department cannot be Added.');
            }
            redirect('department/add/', 'refresh');
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

        $event = $this->department_m->get($id);

        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->validation_rules);
        if ($this->form_validation->run() == TRUE) {

            // preparing for insertion
            foreach ($this->validation_rules as $k => $v) {
                $fields[] = $v['field'];
            }
            $data = $this->department_m->array_from_post($fields);

            if ($this->department_m->save($data, $id)) {
                $this->session->set_flashdata('success', 'Department edited Successfully.');
            } else {
                $this->session->set_flashdata('error', 'sorry, Department cannot be Added.');
            }
            
            redirect('department/index', 'refresh');
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
       if($this->db->delete('department', array('department_id' => $id))){
            
            $this->session->set_flashdata( 'sucess', 'Sucessfully deleted' );
       }else{
           $this->session->set_flashdata( 'error', 'Can\'t delete .' );

       }
        redirect( 'department/', 'refresh' );
    }

    /**
     * delete multiple records with images
     */
    public function bulk_delete_images() {
        $ids = $this->input->post('id');
        if ($ids) {
            if ($deleted_count = $this->department_m->delete_images($ids)) {
                $this->session->set_flashdata('success', sprintf('Selected Record(s) %s of %s deleted successfully.', $deleted_count, count($ids)));
            } else {
                $this->session->set_flashdata('error', 'Sorry, record(s) delete failed. Please try again later.');
            }
        }
        redirect('department/index', 'refresh'); // . $uripart
    }

    /*
     * single status change
     */

    public function changestatus() {
        $task = $this->uri->segment(3);
        $status = ($task == 'activate') ? '1' : '0';
        $id = $this->uri->segment(4);

        $flag = $this->department_m->changeStatus($id, $status);

        if ($flag) {
            $this->session->set_flashdata('success', 'Record ' . ucfirst($task) . 'd' . ' Successfully.');
        } else
            $this->session->set_flashdata('error', 'Status operation failed. Please try again later.');

        redirect('department/index', 'refresh'); //. $uripart
    }

    /*
     * for bulk status change
     */

    public function bulkstatus() {
        $task = $this->uri->segment(3);
        $status = ($task == 'activate') ? '1' : '0';
        $id = $this->input->post('id');

        $flag = $this->department_m->changeStatus($id, $status);

        if ($flag) {
            $this->session->set_flashdata('success', 'Record ' . ucfirst($task) . 'd' . ' Successfully.');
        } else
            $this->session->set_flashdata('error', 'Status operation failed. Please try again later.');

        redirect('department/index', 'refresh'); //. $uripart
    }

  

}
