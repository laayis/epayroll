<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Designation extends Admin_Controller {

    protected $wrapper;
    public $validation_rules = array(
        'attribute_name' => array(
            'field' => 'designation_name',
            'label' => 'Designation Name',
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

        $this->load->model('designation_m');

        $this->wrapper = 'admin_wrapper';
    }

    public function detail($id) {
        $data = array(
            'main_content' => 'view',
            'data' => $this->designation_m->get($id)
        );
        $this->load->view('admin_wrapper', $data);
    }

    public function index() {
        //$this->gcacl->hasPermission('attribute_index') != TRUE ? redirect(ADMIN_BASE_URL) : '';
        $data = array(
            'main_content' => 'list',
            'record' => $this->designation_m->get(),
        );

        $this->load->view('admin_wrapper', $data);
    }

    public function add() {
        $this->gcacl->hasPermission('employee_add') != TRUE ? redirect(ADMIN_BASE_URL) : '';
        $this->load->library('form_validation');

        $this->form_validation->set_rules($this->validation_rules);
        if ($this->form_validation->run() == TRUE) {
            // preparing for insertion
            foreach ($this->validation_rules as $k => $v) {
                $fields[] = $v['field'];
            }
//            $fields = array('title', 'slug', 'description', 'date', 'description', 'url', 'status');
            $data = $this->designation_m->array_from_post($fields);

            if ($this->designation_m->save($data)) {
                $this->session->set_flashdata('success', 'New Designation Added Successfully.');
            } else {
                $this->session->set_flashdata('error', 'sorry, Designation cannot be Added.');
            }
            redirect('designation/add/', 'refresh');
        } else {
            $designation = new stdClass();
            // Go through all the known fields and get the post values
            foreach ($this->validation_rules as $key => $field) {
                $designation->$field['field'] = set_value($field['field']);
            }
        }

        $data = array(
            'method' => 'add',
            'main_content' => 'form',
            'editData' => $designation,
        );
        $this->load->view('admin_wrapper', $data);
    }

    public function edit($id = NULL) {
        $this->gcacl->hasPermission('designation_edit') != TRUE ? redirect(ADMIN_BASE_URL) : '';

        $event = $this->designation_m->get($id);

        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->validation_rules);
        if ($this->form_validation->run() == TRUE) {

            // preparing for insertion
            foreach ($this->validation_rules as $k => $v) {
                $fields[] = $v['field'];
            }
            $data = $this->designation_m->array_from_post($fields);

            if ($this->designation_m->save($data, $id)) {
                $this->session->set_flashdata('success', 'Designation edited Successfully.');
            } else {
                $this->session->set_flashdata('error', 'sorry, Designation cannot be Added.');
            }

            redirect('designation/index', 'refresh');
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
        $this->gcacl->hasPermission('dsignation_delete') != TRUE ? redirect(ADMIN_BASE_URL) : '';
        if ($this->db->delete('designation', array('designation_id' => $id))) {

            $this->session->set_flashdata('sucess', 'Sucessfully deleted');
        } else {
            $this->session->set_flashdata('error', 'Can\'t delete .');
        }
        redirect('designation/', 'refresh');
    }

    /*
     * single status change
     */

    public function changestatus() {
        $task = $this->uri->segment(3);
        $status = ($task == 'activate') ? '1' : '0';
        $id = $this->uri->segment(4);

        $flag = $this->designation_m->changeStatus($id, $status);

        if ($flag) {
            $this->session->set_flashdata('success', 'Record ' . ucfirst($task) . 'd' . ' Successfully.');
        } else
            $this->session->set_flashdata('error', 'Status operation failed. Please try again later.');

        redirect('designation/index', 'refresh'); //. $uripart
    }

}
