<?php if (!defined('BASEPATH')) exit('No access allowed'); ?>
<?php

class Employee extends CI_controller {

    public function __construct() {
        parent::__construct();
        $admin_userdata = $this->session->userdata(APP_PFIX . 'admin');
        if (!$admin_userdata['logged_in_admin']) {
            $this->session->set_flashdata('errorlogin', "You must log in!");
            redirect('login/index');
        }
        $this->load->library('gcacl');

        $this->load->model('employee_m');

        $this->load->model('rbac/rbacmodel');
    }

    public function index() {
        if (!$this->rbacmodel->checkPermission()) {
            $main_content = 'insufficientpermission/insufficientpermission';
        } else {
            $main_content = 'list';
        }

        @$paging_base_url = base_url() . 'employee/index/';

        if (($this->uri->segment(3) && $this->uri->segment(4)) && $this->uri->segment(3) == 'search') {
            $search = TRUE;
            $searchkey = $this->uri->segment(4);
            $offset = $this->uri->segment(5);
            $paging_base_url = base_url() . 'employee/index/search/' . $searchkey;
        } else {
            $search = FALSE;
            $searchkey = FALSE;
            $offset = $this->uri->segment(3);
            $paging_base_url = $paging_base_url;
        }

        $this->load->library('pagination');

        $config['base_url'] = $paging_base_url;
        $config['total_rows'] = $this->employee_m->count_record($searchkey);
        $config['per_page'] = '20';
        $config['num_links'] = '7';
        $config['full_tag_open'] = '<p class=\'pagination\'>';
        $config['full_tag_close'] = '</p>';
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';

        $this->pagination->initialize($config);

        ### if search key exists
        ### segment(3) = search
        ### segment(4) = searchkey
        ### segment(5) = offset
        ### else
        ### segment(3) = offset (if present)
        if (($this->uri->segment(3) && $this->uri->segment(4)) && $this->uri->segment(3) == 'search') {
            $search = TRUE;
            $searchkey = $this->uri->segment(4);
            $offset = $this->uri->segment(5);
        } else {
            $search = FALSE;
            $searchkey = FALSE;
            $offset = $this->uri->segment(3);
        }

        $data = array(
            'main_content' => $main_content,
            'record' => $this->employee_m->getUser($searchkey, $config['per_page'], $offset),
            'search' => $search,
            'searchkey' => $searchkey,
            'offset' => $offset,
            'pagelinks' => $this->pagination->create_links(),
        );

        //$data['main_content'] = 'listcategories';
        $this->load->view('table_wrapper', $data);
    }

    public function add() {
        if (!$this->rbacmodel->checkPermission()) {
            $main_content = 'insufficientpermission/insufficientpermission';
        } else {
            $main_content = 'add';
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[cpassword]');
        $this->form_validation->set_rules('cpassword', 'Password Confirmation', 'trim|required');
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            $img_name = '';
            if ($_FILES["uimage"]["size"] > 0) {
                $u_config = array();
                $u_config['upload_path'] = './uploads/user/';
                $u_config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
                //$u_config['max_size']			= '500'; //500kb
                $u_config['max_size'] = '5120'; //5Mb
                //$u_config['max_width']  		= '1600';
                //$u_config['max_height']  		= '1200';
                $u_config['encrypt_name'] = TRUE;

                $this->load->library('upload', $u_config);

                if (!$this->upload->do_upload('uimage')) {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('user/add/', 'refresh');
                } else {
                    $img = $this->upload->data();
                    $img_name = $img['file_name'];
                    $r_config = array();
                    $r_config['image_library'] = 'gd2';
                    $r_config['source_image'] = $img['full_path'];
                    $r_config['maintain_ratio'] = TRUE;
                    $r_config['width'] = 184;
                    $r_config['height'] = 188;

                    $this->load->library('image_lib', $r_config);
                    $this->image_lib->resize();
                }
            }

            $this->employee_m->add($img_name);
            $this->session->set_flashdata('success', 'New Employee Added Successfully.');
            redirect('employee/add/', 'refresh');
        }

        $data = array(
            'main_content' => $main_content,
        );
        $this->load->view('admin_wrapper', $data);
    }

    public function edit($id = false) {
        if (!$this->rbacmodel->checkPermission()) {
            $main_content = 'insufficientpermission/insufficientpermission';
        } else {
            $main_content = 'edit';
        }

        if (!$id) {
            $this->session->set_flashdata('error', "Id can't be empty.");
            redirect('employee/index', 'refresh');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[cpassword]');
        $this->form_validation->set_rules('cpassword', 'Password Confirmation', 'trim|required');
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            $img_name = '';
            if ($_FILES["uimage"]["size"] > 0) {
                $u_config = array();
                $u_config['upload_path'] = './uploads/user/';
                $u_config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
                //$u_config['max_size']			= '500'; //500kb
                $u_config['max_size'] = '5120'; //5Mb
                //$u_config['max_width']  		= '1600';
                //$u_config['max_height']  		= '1200';
                $u_config['encrypt_name'] = TRUE;

                $this->load->library('upload', $u_config);

                if (!$this->upload->do_upload('uimage')) {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('employee/edit/' . $id, 'refresh');
                } else {
                    $img = $this->upload->data();
                    $img_name = $img['file_name'];
                    $r_config = array();
                    $r_config['image_library'] = 'gd2';
                    $r_config['source_image'] = $img['full_path'];
                    $r_config['maintain_ratio'] = TRUE;
                    $r_config['width'] = 184;
                    $r_config['height'] = 188;

                    $this->load->library('image_lib', $r_config);
                    $this->image_lib->resize();
                }
            }

            $this->employee_m->edit($img_name);
            $this->session->set_flashdata('success', 'Employee Edited Successfully.');
            redirect('employee/edit/' . $id, 'refresh');
        }

        $record = $this->employee_m->getUserById($id);
        $data = array(
            'main_content' => $main_content,
            'record' => $record,
        );
        $this->load->view('form_wrapper', $data);
    }

    // view employee info/role/permission detail
    public function detail() {
        if (!$this->rbacmodel->checkPermission()) {
            $main_content = 'insufficientpermission/insufficientpermission';
        } else {
            $main_content = 'detail';
        }
        $uid = floatval($this->uri->segment(3));
        $params = array('userID' => $uid);
        $this->load->library('gcacl', $params);

        $data = array(
            'main_content' => $main_content,
            'info' => $this->employee_m->getUserById(floatval($uid)),
            'userlist' => $this->employee_m->getUser(),
            'uid' => $uid,
        );
        $this->load->view('detail_wrapper', $data);
    }

    // assign roles
    public function aroles() {
        //$this->rbacmodel->checkPermission();

        $uid = floatval($this->uri->segment(3));
        $params = array('userID' => $uid);
        $this->load->library('gcacl', $params);

        ## save roles for selected user
        if ($this->input->post('action') == 'saveRoles') {

            $this->employee_m->saveUserRoles();
            //echo $this->db->last_query();
            //die();
            $this->session->set_flashdata('success', 'Roles Modified Successfully.');
            redirect('employee/aroles/' . $this->input->post('userID'), 'refresh');
        }

        $data = array(
            'main_content' => 'aroles',
            'info' => $this->employee_m->getUserById(floatval($uid)),
            'userlist' => $this->employee_m->getUser(),
            'uid' => $uid,
        );
        $this->load->view('admin_wrapper', $data);
    }

    // assign permissions
    public function aperms() {
        //$this->rbacmodel->checkPermission();

        $uid = floatval($this->uri->segment(3));
        $params = array('userID' => $uid);
        $this->load->library('gcacl', $params);

        ## save roles for selected user
        if ($this->input->post('action') == 'savePerms') {

            $this->employee_m->saveUserPerms();
            $this->session->set_flashdata('success', 'Roles Modified Successfully.');
            redirect('employee/aperms/' . $this->input->post('userID'), 'refresh');
        }

        $data = array(
            'main_content' => 'aperms',
            'info' => $this->employee_m->getUserById(floatval($uid)),
            'userlist' => $this->employee_m->getUser(),
            'uid' => $uid,
        );
        $this->load->view('admin_wrapper', $data);
    }

    // view permissions
    public function vperms() {
        //$this->rbacmodel->checkPermission();

        $uid = floatval($this->uri->segment(3));
        $params = array('userID' => $uid);
        $this->load->library('gcacl', $params);

        $data['main_content'] = 'viewperm';
        $data['info'] = $this->employee_m->getUserById($uid);
        $data['userlist'] = $this->employee_m->getUser();
        $data['uid'] = $uid;

        $this->load->view('admin_wrapper', $data);
    }

    ####### delete action

    public function delete() {
        //$this->rbacmodel->checkPermission();

        $id = $this->uri->segment(3);
        $this->employee_m->deleteRecord($id);

        $this->session->set_flashdata('success', 'Record deleted successfully.');

        $uripart = '';
        //$uripart = $this->_buildURIPart();
        redirect('employee/index' . $uripart, 'refresh');
    }

    public function bulkdelete() {
        //$this->rbacmodel->checkPermission();

        $id = $this->input->post('check_all');
        $del = $this->employee_m->deleteRecordBulk($id);
        if ($del) {
            $this->session->set_flashdata('success', 'Record(s) deleted successfully.');
        } else {
            $this->session->set_flashdata('error', 'Sorry, record(s) delete failed. Please try again later.');
        }

        $uripart = '';
        //$uripart = $this->_buildURIPart();
        redirect('employee/index' . $uripart, 'refresh');
    }

}

?>