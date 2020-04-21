<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//error_reporting(0);

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('users_model', 'dbmodel'));
        if ($this->session->userdata('log_id') == "") {
            redirect(base_url() . 'login/', 'refresh');
        }
    }

    public function index() {
        $params['filtercustom']["prefix_users.id != 1"] = '';
        $params['select'] = array('id', 'status', 'fullname', 'username', 'fk_employee_id', 'fk_employee_empname', 'fk_usergroups_id', 'fk_usergroups_groupname');
        $data['list'] = $this->dbmodel->getGridAll('users', $params);
        $this->load->view('includes/header');
        $this->load->view('users/list', $data);
        $this->load->view('includes/footer', array('jsfile' => array_merge($this->config->item('jsfile')['datatable'], $this->config->item('jsfile')['validation'], $this->config->item('jsfile')['users'])));
    }

    public function add($id = NULL) {
        $data['list'] = array();
        if (!empty($id)) {
            $condition_array['md5(id)'] = $id;
            $data_list = $this->dbmodel->getAll('users', $condition_array);
            if (count($data_list) > 0) {
                $data_list[0]->password = AES_Decode($data_list[0]->password);
                $data['list'] = $data_list[0];
            } else {
                
            }
        }
        $data['usergroups'] = Getdropdowns('usergroups', 'groupname');
        $data['employeelist'] = Getdropdowns('employee', 'empname');
        $this->load->view('includes/header');
        $this->load->view('users/add', $data);
        $this->load->view('includes/footer', array('jsfile' => array_merge($this->config->item('jsfile')['datatable'], $this->config->item('jsfile')['validation'], $this->config->item('jsfile')['datepicker'], $this->config->item('jsfile')['users'])));
    }

    public function save() {
        if (($this->input->server('REQUEST_METHOD') == 'POST')) {
            $this->form_validation->set_rules('fullname', 'Full Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('username', 'User Name', 'trim|required|xss_clean|callback_uniqueusername');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
            $this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'required|matches[password]');
            $this->form_validation->set_rules('fk_usergroups_id', 'User Group', 'trim|required|xss_clean');
            $this->form_validation->set_rules('fk_employee_id', 'Employee', 'trim|xss_clean|callback_uniqueuseremployee');
            if ($this->form_validation->run() == FALSE) {
                echo json_encode(array('status' => 0, 'msg' => validation_errors()));
                return false;
            } else {
                $setdata = array('fullname' => (isset($_POST['fullname']) && !empty($_POST['fullname'])) ? trim($_POST['fullname']) : "",
                    'username' => (isset($_POST['username']) && !empty($_POST['username'])) ? $_POST['username'] : "",
                    'password' => (isset($_POST['password']) && !empty($_POST['password'])) ? AES_Encode($_POST['password']) : "",
                    'fk_usergroups_id' => (isset($_POST['fk_usergroups_id']) && !empty($_POST['fk_usergroups_id'])) ? $_POST['fk_usergroups_id'] : "",
                    'fk_employee_id' => (isset($_POST['fk_employee_id']) && !empty($_POST['fk_employee_id'])) ? $_POST['fk_employee_id'] : "",
                    'fk_users_id' => $this->session->userdata('log_id')
                );
                $saved = "";
                if (isset($_POST['userid']) && !empty($_POST['userid'])) {
                    $saved = $this->dbmodel->update('users', $setdata, array('id' => $_POST['userid']));
                } else {
                    $saved = $this->dbmodel->insert('users', $setdata);
                }
                if ($saved) {
                    $this->session->set_flashdata('SucMessage', ucfirst($this->input->post('fullname')) . ' User saved Successfully');
                    echo json_encode(array('status' => true, 'msg' => ucfirst($this->input->post('fullname')) . ' User saved Successfully'));
                } else {
                    echo json_encode(array('status' => false, 'msg' => 'User Saved Not Successfully'));
                }
            }
        }
    }

    public function uniqueuseremployee() {
        if (isset($_POST['fk_employee_id']) && !empty($_POST['fk_employee_id'])) {
            $this->form_validation->set_message('uniqueuseremployee', 'This Employee already exist please choose different one');
            $condition_arr['fk_employee_id'] = $_POST['fk_employee_id'];
            $not_condition = array();
            if (isset($_POST['userid']) && !empty($_POST['userid']))
                $not_condition["id"] = array('id' => $_POST['userid']);
            return !$this->dbmodel->rowCheck('users', $condition_arr, $not_condition);
        }
    }

    public function uniqueusername() {
        $this->form_validation->set_message('uniqueusername', 'This Username already exist please choose different one');
        $condition_arr['username'] = $_POST['username'];
        $not_condition = array();
        if (isset($_POST['userid']) && !empty($_POST['userid']))
            $not_condition["id"] = array('id' => $_POST['userid']);
        return !$this->dbmodel->rowCheck('users', $condition_arr, $not_condition);
    }

    public function view() {
        $loadhtml = "";
        if (isset($_POST['userid']) && !empty($_POST['userid'])) {
            $condition_array['md5(id)'] = $_POST['userid'];
            $data_list = $this->dbmodel->getAll('users', $condition_array);
            if (count($data_list) > 0) {
                $data_list[0]->empname = "";
                if (isset($data_list[0]->fk_employee_id) && !empty($data_list[0]->fk_employee_id)) {
                    $data_list[0]->empname = getFeild('empname', 'employee', 'id', $data_list[0]->fk_employee_id);
                }
                $data_list[0]->groupname = getFeild('groupname', 'usergroups', 'id', $data_list[0]->fk_usergroups_id);
                $data['list'] = $data_list[0];
                $loadhtml = $this->load->view('users/view', $data, true);
            }
        }
        echo json_encode(array('status' => true, 'viewhtml' => $loadhtml));
    }

    public function delete($id) {
        if (!empty($id)) {
            $condition_array['md5(id)'] = $id;
            $data_list = $this->dbmodel->getAll('users', $condition_array);
            if (count($data_list) > 0) {
                $this->dbmodel->update('users', array('dels' => '1'), array('id' => $data_list[0]->id));
                $this->session->set_flashdata('SucMessage', 'Users has been deleted successfully!!!');
            } else {
                $this->session->set_flashdata('ErrorMessages', 'Users has not been deleted successfully!!!');
            }
        }
        redirect(base_url() . 'users');
    }

    public function changestatus() {
        if (isset($_POST['userid']) && !empty($_POST['userid'])) {
            $condition_array['md5(id)'] = $_POST['userid'];
            $data_list = $this->dbmodel->getAll('users', $condition_array);
            if (count($data_list) > 0) {
                $this->dbmodel->update('users', array('status' => (isset($_POST['status']) && !empty($_POST['status'])) ? '0' : '1'), array('id' => $data_list[0]->id));
                echo json_encode(array('status' => true, 'msg' => (isset($_POST['status']) && !empty($_POST['status'])) ? 'Users Inactive Successfully' : 'Users Active Successfully'));
            } else {
                echo json_encode(array('status' => false, 'msg' => (isset($_POST['status']) && !empty($_POST['status'])) ? 'Users Inactive not Successfully' : 'Users Active not Successfully'));
            }
        }
    }

    public function deletepopup() {
        $loadhtml = "";
        if (isset($_POST['userid']) && !empty($_POST['userid'])) {
            $condition_array['md5(id)'] = $_POST['userid'];
            $data_list = $this->dbmodel->getAll('users', $condition_array);
            if (count($data_list) > 0) {
                $data['list'] = $data_list[0];
                $loadhtml = $this->load->view('users/delete', $data, true);
            }
        }
        echo json_encode(array('status' => true, 'viewhtml' => $loadhtml));
    }

    public function downloadexcel() {
        $this->load->library('excel');
        $returnArr = array();
        $params['filtercustom']["prefix_users.id != 1"] = '';
        $params['select'] = array('id', 'status', 'fullname', 'username', 'fk_employee_id', 'fk_employee_empname', 'fk_usergroups_id', 'fk_usergroups_groupname');
        $userlist = $this->dbmodel->getGridAll('users', $params);
        $returnArr['list'] = $userlist;        
        $returnArr['headingname'] = array('fullname' => 'Full Name', "username" => 'User Name', 'fk_employee_empname' => 'Employee Name', 'fk_usergroups_groupname' => 'User Group Name', 'status' => 'Active');
        $filenametext = 'Users_Report_';
        $data['filename'] = $filenametext . date('d-m-y') . '.xls';
        $this->excel->streamCustom($data['filename'], $returnArr);
        $data['filename'] = 'export/' . $data['filename'];
        echo json_encode(array('status' => true, 'filename' => $data['filename']));
    }

}
