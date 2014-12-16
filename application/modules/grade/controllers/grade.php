<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Grade extends Admin_Controller {

    protected $wrapper;
    public $validation_rules = array(
        'department_name' => array(
            'field' => 'grade_type',
            'label' => 'Grade Type',
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

        $this->load->model('grade_m');

        $this->wrapper = 'admin_wrapper';
    }

    public function detail($id) {
        $data = array(
            'main_content' => 'view',
            'data' => $this->grade_m->get($id)
        );
        $this->load->view('admin_wrapper', $data);
    }

    public function index() {
        $data = array(
            'main_content' => 'list',
            'record' => $this->grade_m->get(),
        );

        $this->load->view('admin_wrapper', $data);
    }

    public function add() {

        $this->load->library('form_validation');

        $this->form_validation->set_rules($this->validation_rules);
        if ($this->form_validation->run() == TRUE) {
            // preparing for insertion
            foreach ($this->validation_rules as $k => $v) {
                $fields[] = $v['field'];
            }
//            $fields = array('title', 'slug', 'description', 'date', 'description', 'url', 'status');
            $data = $this->grade_m->array_from_post($fields);

            if ($this->grade_m->save($data)) {
                $this->session->set_flashdata('success', 'New Grade Added Successfully.');
            } else {
                $this->session->set_flashdata('error', 'sorry, Grade cannot be Added.');
            }
            redirect('grade/add/', 'refresh');
        } else {
            $grade = new stdClass();
            // Go through all the known fields and get the post values
            foreach ($this->validation_rules as $key => $field) {
                $grade->$field['field'] = set_value($field['field']);
            }
        }

        $data = array(
            'method' => 'add',
            'main_content' => 'form',
            'editData' => $grade,
        );
        $this->load->view('admin_wrapper', $data);
    }

    public function edit($id = NULL) {
        //$this->gcacl->hasPermission('disease_edit') != TRUE ? redirect(ADMIN_BASE_URL) : '';
        $event = $this->grade_m->get($id);

        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->validation_rules);
        if ($this->form_validation->run() == TRUE) {

            // preparing for insertion
            foreach ($this->validation_rules as $k => $v) {
                $fields[] = $v['field'];
            }
            $data = $this->grade_m->array_from_post($fields);

            if ($this->grade_m->save($data, $id)) {
                $this->session->set_flashdata('success', 'Grade edited Successfully.');
            } else {
                $this->session->set_flashdata('error', 'sorry, Grade cannot be Added.');
            }

            redirect('grade/index', 'refresh');
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
        if ($this->db->delete('grade', array('grade_id' => $id))) {

            $this->session->set_flashdata('sucess', 'Sucessfully deleted');
        } else {
            $this->session->set_flashdata('error', 'Can\'t delete .');
        }
        redirect('grade/', 'refresh');
    }

    public function changestatus() {
        $task = $this->uri->segment(3);
        $status = ($task == 'activate') ? '1' : '0';
        $id = $this->uri->segment(4);

        $flag = $this->grade_m->changeStatus($id, $status);

        if ($flag) {
            $this->session->set_flashdata('success', 'Record ' . ucfirst($task) . 'd' . ' Successfully.');
        } else
            $this->session->set_flashdata('error', 'Status operation failed. Please try again later.');

        redirect('grade/index', 'refresh'); //. $uripart
    }

    /*
     * for bulk status change
     */

    public function bulkstatus() {
        $task = $this->uri->segment(3);
        $status = ($task == 'activate') ? '1' : '0';
        $id = $this->input->post('id');

        $flag = $this->grade_m->changeStatus($id, $status);

        if ($flag) {
            $this->session->set_flashdata('success', 'Record ' . ucfirst($task) . 'd' . ' Successfully.');
        } else
            $this->session->set_flashdata('error', 'Status operation failed. Please try again later.');

        redirect('grade/index', 'refresh'); //. $uripart
    }

}
