<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Attendance extends CI_Controller {

    protected $wrapper;
    public $validation_rules = array(
        'login_time' => array(
            'field' => 'login_time',
            'label' => 'Login Time',
            'rules' => 'trim|required|max_length[100]'
        ),
        'logout_time' => array(
            'field' => 'logout_time',
            'label' => 'Logout Time',
            'rules' => 'trim|required|max_length[100]'
        ),
    );

    function __construct() {
        parent::__construct();
        $admin_userdata = $this->session->userdata(APP_PFIX . 'admin');
        if (!$admin_userdata['logged_in_admin']) {
            $this->session->set_flashdata('errorlogin', "You must log in!");
            redirect('login/index');
        }


        $this->load->library('gcacl');

        $this->load->model('attendance_m');

        $this->wrapper = 'admin_wrapper';
    }

    public function index() {
        $data = array(
            'main_content' => 'list',
            'record' => $this->attendance_m->get(),
        );

        $this->load->view('admin_wrapper', $data);
    }

    function employeeattendance() {
        $main_content = 'attendance';
        $wrapper = 'admin_wrapper';
        $data['main_content'] = $main_content;
        $this->load->view($wrapper, $data);
    }
    
    public function punchin() {

        $this->load->library('form_validation');

        $this->form_validation->set_rules($this->validation_rules);
        if ($this->form_validation->run() == TRUE) {
            // preparing for insertion
            foreach ($this->validation_rules as $k => $v) {
                $fields[] = $v['field'];
            }
            $data = $this->attendance_m->array_from_post($fields);

            if ($this->attendance_m->save($data)) {
                $this->session->set_flashdata('success', 'You Punch in Your attendace Successfully.');
            } else {
                $this->session->set_flashdata('error', 'Sorry, punch cannot be done.');
            }
            redirect('attendance/punchin', 'refresh');
        } else {
            $attendance = new stdClass();
            // Go through all the known fields and get the post values
            foreach ($this->validation_rules as $key => $field) {
                $attendance->$field['field'] = set_value($field['field']);
            }
        }

        $data = array(
            'method' => 'punchin',
            'main_content' => 'punchin',
            'editData' => $attendance,
        );
        $this->load->view('admin_wrapper', $data);
    }
    public function punchout() {

        $this->load->library('form_validation');

        $this->form_validation->set_rules($this->validation_rules);
        if ($this->form_validation->run() == TRUE) {
            // preparing for insertion
            foreach ($this->validation_rules as $k => $v) {
                $fields[] = $v['field'];
            }
            $data = $this->attendance_m->array_from_post($fields);

            if ($this->attendance_m->save($data)) {
                $this->session->set_flashdata('success', 'Your Punch out Successfully.');
            } else {
                $this->session->set_flashdata('error', 'Sorry, Punch out cannot be done.');
            }
            redirect('attendance/punchout', 'refresh');
        } else {
            $attendance = new stdClass();
            // Go through all the known fields and get the post values
            foreach ($this->validation_rules as $key => $field) {
                $attendance->$field['field'] = set_value($field['field']);
            }
        }

        $data = array(
            'method' => 'punchout',
            'main_content' => 'punchout',
            'editData' => $attendance,
        );
        $this->load->view('admin_wrapper', $data);
    }

    public function edit($id = NULL) {
        $this->gcacl->hasPermission('attendance_edit') != TRUE ? redirect(ADMIN_BASE_URL) : '';
        $event = $this->attendance_m->get($id);

        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->validation_rules);
        if ($this->form_validation->run() == TRUE) {

            // preparing for insertion
            foreach ($this->validation_rules as $k => $v) {
                $fields[] = $v['field'];
            }
            $data = $this->attendance_m->array_from_post($fields);

            if ($this->attendance_m->save($data, $id)) {
                $this->session->set_flashdata('success', 'Attendance edited Successfully.');
            } else {
                $this->session->set_flashdata('error', 'sorry, Attendance cannot be Added.');
            }

            redirect('attendance/index', 'refresh');
        }

        $data = array(
            'method' => 'edit',
            'editData' => $event,
            'main_content' => 'form',
        );
        $this->load->view('admin_wrapper', $data);
    }

    /**
     * delete record
     */
    public function delete($id) {
        if ($this->db->delete('attendace', array('date' => $id))) {

            $this->session->set_flashdata('sucess', 'Sucessfully deleted');
        } else {
            $this->session->set_flashdata('error', 'Can\'t delete .');
        }
        redirect('attendace/', 'refresh');
    }

}
