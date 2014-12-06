<?php if (!defined('BASEPATH')) exit('No access allowed'); ?>
<?php

class User extends CI_controller {

    public function __construct() {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('errorlogin', "You must log in!");
            redirect('auth', 'refresh');
        }

        $this->load->model('usermodel');
    }

    public function index() {
        

}

    public function add() {
        $main_content = 'add';

        $this->load->library('form_validation');
        $this->form_validation->set_rules('emp_fname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('emp_lname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('emp_marital_status', 'Marital Status', 'trim|required');
        $this->form_validation->set_rules('emp_type', 'Employee Type', 'trim|required');
        $this->form_validation->set_rules('designation_name', 'Designation', 'trim|required');
        $this->form_validation->set_rules('department_name', 'Department', 'trim|required');
        $this->form_validation->set_rules('emp_mobile_no', 'Mobile Number', 'trim|min_length[10]|max_length[13]|required');
        $this->form_validation->set_rules('emp_login_id', 'Email', 'trim|required|email|xss_clean');
        $this->form_validation->set_rules('emp_password', 'Password', 'trim|required|password');
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

            $this->usermodel->add($img_name);
            $this->session->set_flashdata('success', 'New User Added Successfully.');
            redirect('user/add/', 'refresh');
        }

        $data = array(
            'main_content' => $main_content,
        );
        $this->load->view('form_wrapper', $data);
    }

    public function edit($id = false) {
        $main_content = 'edit';

        if (!$id) {
            $this->session->set_flashdata('error', "Id can't be empty.");
            redirect('user/index', 'refresh');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('emp_fname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('emp_lname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('emp_marital_status', 'Marital Status', 'trim|required');
        $this->form_validation->set_rules('emp_type', 'Employee Type', 'trim|required');
        $this->form_validation->set_rules('designation_name', 'Designation', 'trim|required');
        $this->form_validation->set_rules('department_name', 'Department', 'trim|required');
        $this->form_validation->set_rules('emp_mobile_no', 'Mobile Number', 'trim|min_length[10]|max_length[13]|required');
        $this->form_validation->set_rules('emp_login_id', 'Email', 'trim|required|email|xss_clean');
        $this->form_validation->set_rules('emp_password', 'Password', 'trim|required|password');

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
                    redirect('user/edit/' . $id, 'refresh');
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

            $this->usermodel->edit($img_name);
            $this->session->set_flashdata('success', 'User Edited Successfully.');
            redirect('user/edit/' . $id, 'refresh');
        }

        $record = $this->usermodel->getUserById($id);
        $data = array(
            'main_content' => $main_content,
            'record' => $record,
        );
        $this->load->view('form_wrapper', $data);
    }

    // view user info/role/permission detail
    public function detail() {
// 		if(!$this->rbacmodel->checkPermission()) {
//     		$main_content = 'insufficientpermission/insufficientpermission';
//     	} else {
//     		$main_content = 'detail';
//     	}
        $main_content = 'detail';

        $uid = floatval($this->uri->segment(3));
        $params = array('userID' => $uid);
        $this->load->library('gcacl', $params);

        $data = array(
            'main_content' => $main_content,
            'info' => $this->usermodel->getUserById(floatval($uid)),
            'userlist' => $this->usermodel->getUser(),
            'uid' => $uid,
        );
        $this->load->view('detail_wrapper', $data);
    }

    ####### delete action

    public function delete() {
        //$this->rbacmodel->checkPermission();

        $id = $this->uri->segment(3);
        $this->usermodel->deleteRecord($id);

        $this->session->set_flashdata('success', 'Record deleted successfully.');

        $uripart = '';
        //$uripart = $this->_buildURIPart();
        redirect('user/index' . $uripart, 'refresh');
    }

    public function bulkdelete() {
        //$this->rbacmodel->checkPermission();

        $id = $this->input->post('check_all');
        $del = $this->usermodel->deleteRecordBulk($id);
        if ($del) {
            $this->session->set_flashdata('success', 'Record(s) deleted successfully.');
        } else {
            $this->session->set_flashdata('error', 'Sorry, record(s) delete failed. Please try again later.');
        }

        $uripart = '';
        //$uripart = $this->_buildURIPart();
        redirect('user/index' . $uripart, 'refresh');
    }

    //activate the user
    function activate($id, $code = false) {
        if ($code !== false) {
            $activation = $this->ion_auth->activate($id, $code);
        } else if ($this->ion_auth->is_admin()) {
            $activation = $this->ion_auth->activate($id);
        }

        if ($activation) {
            //redirect them to the auth page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("login2", 'refresh');
        } else {
            //redirect them to the forgot password page
            $this->session->set_flashdata('message', $this->ion_auth->errors());
            redirect("login2/forgot_password", 'refresh');
        }
    }

    //deactivate the user
    function deactivate($id = NULL) {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            //redirect them to the home page because they must be an administrator to view this
            return show_error('You must be an administrator to view this page.');
        }

        $id = (int) $id;

        $this->load->library('form_validation');
        $this->form_validation->set_rules('confirm', $this->lang->line('deactivate_validation_confirm_label'), 'required');
        $this->form_validation->set_rules('id', $this->lang->line('deactivate_validation_user_id_label'), 'required|alpha_numeric');

        if ($this->form_validation->run() == FALSE) {
            // insert csrf check
            $this->data['csrf'] = $this->_get_csrf_nonce();
            $this->data['user'] = $this->ion_auth->user($id)->row();

            $this->_render_page('login2/deactivate_user', $this->data);
        } else {
            // do we really want to deactivate?
            if ($this->input->post('confirm') == 'yes') {
                // do we have a valid request?
                if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id')) {
                    show_error($this->lang->line('error_csrf'));
                }

                // do we have the right userlevel?
                if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin()) {
                    $this->ion_auth->deactivate($id);
                }
            }

            //redirect them back to the auth page
            redirect('login2', 'refresh');
        }
    }

    //create a new user
    function create_user() {
        $this->data['title'] = "Create User";

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('login2', 'refresh');
        }

        $tables = $this->config->item('tables', 'ion_auth');

        //validate form input
        $this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required|xss_clean');
        $this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required|xss_clean');
        $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
        $this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'required|xss_clean');
        $this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'required|xss_clean');
        $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

        if ($this->form_validation->run() == true) {
            $username = strtolower($this->input->post('first_name')) . ' ' . strtolower($this->input->post('last_name'));
            $email = strtolower($this->input->post('email'));
            $password = $this->input->post('password');

            $additional_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'company' => $this->input->post('company'),
                'phone' => $this->input->post('phone'),
            );
        }
        if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data)) {
            //check to see if we are creating the user
            //redirect them back to the admin page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("login2", 'refresh');
        } else {
            //display the create user form
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['first_name'] = array(
                'name' => 'first_name',
                'id' => 'first_name',
                'type' => 'text',
                'value' => $this->form_validation->set_value('first_name'),
            );
            $this->data['last_name'] = array(
                'name' => 'last_name',
                'id' => 'last_name',
                'type' => 'text',
                'value' => $this->form_validation->set_value('last_name'),
            );
            $this->data['email'] = array(
                'name' => 'email',
                'id' => 'email',
                'type' => 'text',
                'value' => $this->form_validation->set_value('email'),
            );
            $this->data['company'] = array(
                'name' => 'company',
                'id' => 'company',
                'type' => 'text',
                'value' => $this->form_validation->set_value('company'),
            );
            $this->data['phone'] = array(
                'name' => 'phone',
                'id' => 'phone',
                'type' => 'text',
                'value' => $this->form_validation->set_value('phone'),
            );
            $this->data['password'] = array(
                'name' => 'password',
                'id' => 'password',
                'type' => 'password',
                'value' => $this->form_validation->set_value('password'),
            );
            $this->data['password_confirm'] = array(
                'name' => 'password_confirm',
                'id' => 'password_confirm',
                'type' => 'password',
                'value' => $this->form_validation->set_value('password_confirm'),
            );

            $this->_render_page('login2/create_user', $this->data);
        }
    }

    //edit a user
    function edit_user($id) {
        $this->data['title'] = "Edit User";

        if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id))) {
            redirect('login2', 'refresh');
        }

        $user = $this->ion_auth->user($id)->row();
        $groups = $this->ion_auth->groups()->result_array();
        $currentGroups = $this->ion_auth->get_users_groups($id)->result();

        //validate form input
        $this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required|xss_clean');
        $this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'required|xss_clean');
        $this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'required|xss_clean');
        $this->form_validation->set_rules('company', $this->lang->line('edit_user_validation_company_label'), 'required|xss_clean');
        $this->form_validation->set_rules('groups', $this->lang->line('edit_user_validation_groups_label'), 'xss_clean');

        if (isset($_POST) && !empty($_POST)) {
            // do we have a valid request?
            if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id')) {
                show_error($this->lang->line('error_csrf'));
            }

            //update the password if it was posted
            if ($this->input->post('password')) {
                $this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
                $this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');
            }

            if ($this->form_validation->run() === TRUE) {
                $data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'company' => $this->input->post('company'),
                    'phone' => $this->input->post('phone'),
                );

                //update the password if it was posted
                if ($this->input->post('password')) {
                    $data['password'] = $this->input->post('password');
                }



                // Only allow updating groups if user is admin
                if ($this->ion_auth->is_admin()) {
                    //Update the groups user belongs to
                    $groupData = $this->input->post('groups');

                    if (isset($groupData) && !empty($groupData)) {

                        $this->ion_auth->remove_from_group('', $id);

                        foreach ($groupData as $grp) {
                            $this->ion_auth->add_to_group($grp, $id);
                        }
                    }
                }

                //check to see if we are updating the user
                if ($this->ion_auth->update($user->id, $data)) {
                    //redirect them back to the admin page if admin, or to the base url if non admin
                    $this->session->set_flashdata('message', $this->ion_auth->messages());
                    if ($this->ion_auth->is_admin()) {
                        redirect('login2', 'refresh');
                    } else {
                        redirect('/', 'refresh');
                    }
                } else {
                    //redirect them back to the admin page if admin, or to the base url if non admin
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
                    if ($this->ion_auth->is_admin()) {
                        redirect('login2', 'refresh');
                    } else {
                        redirect('/', 'refresh');
                    }
                }
            }
        }

        //display the edit user form
        $this->data['csrf'] = $this->_get_csrf_nonce();

        //set the flash data error message if there is one
        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

        //pass the user to the view
        $this->data['user'] = $user;
        $this->data['groups'] = $groups;
        $this->data['currentGroups'] = $currentGroups;

        $this->data['first_name'] = array(
            'name' => 'first_name',
            'id' => 'first_name',
            'type' => 'text',
            'value' => $this->form_validation->set_value('first_name', $user->first_name),
        );
        $this->data['last_name'] = array(
            'name' => 'last_name',
            'id' => 'last_name',
            'type' => 'text',
            'value' => $this->form_validation->set_value('last_name', $user->last_name),
        );
        $this->data['company'] = array(
            'name' => 'company',
            'id' => 'company',
            'type' => 'text',
            'value' => $this->form_validation->set_value('company', $user->company),
        );
        $this->data['phone'] = array(
            'name' => 'phone',
            'id' => 'phone',
            'type' => 'text',
            'value' => $this->form_validation->set_value('phone', $user->phone),
        );
        $this->data['password'] = array(
            'name' => 'password',
            'id' => 'password',
            'type' => 'password'
        );
        $this->data['password_confirm'] = array(
            'name' => 'password_confirm',
            'id' => 'password_confirm',
            'type' => 'password'
        );

        $this->_render_page('auth/edit_user', $this->data);
    }

    // create a new group
    function create_group() {
        $this->data['title'] = $this->lang->line('create_group_title');

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('auth', 'refresh');
        }

        //validate form input
        $this->form_validation->set_rules('group_name', $this->lang->line('create_group_validation_name_label'), 'required|alpha_dash|xss_clean');
        $this->form_validation->set_rules('description', $this->lang->line('create_group_validation_desc_label'), 'xss_clean');

        if ($this->form_validation->run() == TRUE) {
            $new_group_id = $this->ion_auth->create_group($this->input->post('group_name'), $this->input->post('description'));
            if ($new_group_id) {
                // check to see if we are creating the group
                // redirect them back to the admin page
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect("auth", 'refresh');
            }
        } else {
            //display the create group form
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['group_name'] = array(
                'name' => 'group_name',
                'id' => 'group_name',
                'type' => 'text',
                'value' => $this->form_validation->set_value('group_name'),
            );
            $this->data['description'] = array(
                'name' => 'description',
                'id' => 'description',
                'type' => 'text',
                'value' => $this->form_validation->set_value('description'),
            );

            $this->_render_page('auth/create_group', $this->data);
        }
    }

    //edit a group
    function edit_group($id) {
        // bail if no group id given
        if (!$id || empty($id)) {
            redirect('auth', 'refresh');
        }

        $this->data['title'] = $this->lang->line('edit_group_title');

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('auth', 'refresh');
        }

        $group = $this->ion_auth->group($id)->row();

        //validate form input
        $this->form_validation->set_rules('group_name', $this->lang->line('edit_group_validation_name_label'), 'required|alpha_dash|xss_clean');
        $this->form_validation->set_rules('group_description', $this->lang->line('edit_group_validation_desc_label'), 'xss_clean');

        if (isset($_POST) && !empty($_POST)) {
            if ($this->form_validation->run() === TRUE) {
                $group_update = $this->ion_auth->update_group($id, $_POST['group_name'], $_POST['group_description']);

                if ($group_update) {
                    $this->session->set_flashdata('message', $this->lang->line('edit_group_saved'));
                } else {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
                }
                redirect("auth", 'refresh');
            }
        }

        //set the flash data error message if there is one
        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

        //pass the user to the view
        $this->data['group'] = $group;

        $this->data['group_name'] = array(
            'name' => 'group_name',
            'id' => 'group_name',
            'type' => 'text',
            'value' => $this->form_validation->set_value('group_name', $group->name),
        );
        $this->data['group_description'] = array(
            'name' => 'group_description',
            'id' => 'group_description',
            'type' => 'text',
            'value' => $this->form_validation->set_value('group_description', $group->description),
        );

        $this->_render_page('auth/edit_group', $this->data);
    }

    function _get_csrf_nonce() {
        $this->load->helper('string');
        $key = random_string('alnum', 8);
        $value = random_string('alnum', 20);
        $this->session->set_flashdata('csrfkey', $key);
        $this->session->set_flashdata('csrfvalue', $value);

        return array($key => $value);
    }

    function _valid_csrf_nonce() {
        if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
                $this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function _render_page($view, $data = null, $render = false) {

        $this->viewdata = (empty($data)) ? $this->data : $data;

        $view_html = $this->load->view($view, $this->viewdata, $render);

        if (!$render)
            return $view_html;
    }

}
