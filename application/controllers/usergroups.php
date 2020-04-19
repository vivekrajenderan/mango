<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usergroups extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('dbmodel'));
        if ($this->session->userdata('log_id') == "") {
            redirect(base_url() . 'login/', 'refresh');
        }
    }

    public function index() {
        //$params['filtercustom']["empl_out > " . time() . " OR empl_out IS NULL"] = '';
        $params['select'] = array('id', 'status', 'groupname', 'permission_admin', 'permission_delete', 'permission_report');
        $data['list'] = $this->dbmodel->getGridAll('usergroups', $params);
        $this->load->view('includes/header');
        $this->load->view('usergroups/list', $data);
        $this->load->view('includes/footer', array('jsfile' => array_merge($this->config->item('jsfile')['datatable'], $this->config->item('jsfile')['validation'], $this->config->item('jsfile')['usergroups'])));
    }

    public function add($id = NULL) {
        $data['list'] = array();
        if (!empty($id)) {
            $condition_array['md5(id)'] = $id;
            $data_list = $this->dbmodel->getAll('usergroups', $condition_array);
            if (count($data_list) > 0) {
                $data['list'] = $data_list[0];
            } else {
                
            }
        }
        $this->load->view('includes/header');
        $this->load->view('usergroups/add', $data);
        $this->load->view('includes/footer', array('jsfile' => array_merge($this->config->item('jsfile')['datatable'], $this->config->item('jsfile')['validation'], $this->config->item('jsfile')['usergroups'])));
    }

    public function save() {
        if (($this->input->server('REQUEST_METHOD') == 'POST')) {
            $this->form_validation->set_rules('groupname', 'Group Name', 'trim|required|xss_clean|callback_uniquegroupname');
            if ($this->form_validation->run() == FALSE) {
                echo json_encode(array('status' => 0, 'msg' => validation_errors()));
                return false;
            } else {
                $setdata = array('groupname' => (isset($_POST['groupname']) && !empty($_POST['groupname'])) ? trim($_POST['groupname']) : "",
                    'permission_admin' => (isset($_POST['permission_admin']) && !empty($_POST['permission_admin'])) ? $_POST['permission_admin'] : "",
                    'permission_delete' => (isset($_POST['permission_delete']) && !empty($_POST['permission_delete'])) ? $_POST['permission_delete'] : "",
                    'permission_report' => (isset($_POST['permission_report']) && !empty($_POST['permission_report'])) ? $_POST['permission_report'] : "",
                    'fk_users_id' => $this->session->userdata('log_id')
                );
                $saved = "";
                if (isset($_POST['usergroupid']) && !empty($_POST['usergroupid'])) {
                    $saved = $this->dbmodel->update('usergroups', $setdata, array('id' => $_POST['usergroupid']));
                } else {                   
                    $saved = $this->dbmodel->insert('usergroups', $setdata);
                }
                if ($saved) {
                    $this->session->set_flashdata('SucMessage', ucfirst($this->input->post('empl_name')) . ' User Groups saved Successfully');
                    echo json_encode(array('status' => true, 'msg' => ucfirst($this->input->post('empl_name')) . ' User Groups saved Successfully'));
                } else {
                    echo json_encode(array('status' => false, 'msg' => 'User Groups Saved Not Successfully'));
                }
            }
        }
    }

    public function uniquegroupname() {
        $this->form_validation->set_message('uniquegroupname', 'This Group Name already exist please choose different one');
        $condition_arr['groupname'] = $_POST['groupname'];
        $not_condition = array();
        if (isset($_POST['usergroupid']))
            $not_condition["id"] = array('id' => $_POST['usergroupid']);
        return !$this->dbmodel->rowCheck('usergroups', $condition_arr, $not_condition);
    }


    public function delete($id) {
        if (!empty($id)) {            
            $condition_array['md5(id)'] = $id;
            $data_list = $this->dbmodel->getAll('usergroups', $condition_array);
            if (count($data_list) > 0) {
                $this->dbmodel->update('usergroups', array('dels' => '1'), array('id' => $data_list[0]->id));
                $this->session->set_flashdata('SucMessage', 'User Groups has been deleted successfully!!!');
            } else {
                $this->session->set_flashdata('ErrorMessages', 'User Groups has not been deleted successfully!!!');
            }
        }
        redirect(base_url() . 'usergroups');
    }

    public function changestatus() {
        if (isset($_POST['usergroupid']) && !empty($_POST['usergroupid'])) {
            $condition_array['md5(id)'] = $_POST['usergroupid'];
            $data_list = $this->dbmodel->getAll('usergroups', $condition_array);
            if (count($data_list) > 0) {
                $this->dbmodel->update('usergroups', array('status' => (isset($_POST['status']) && !empty($_POST['status'])) ? '0' : '1'), array('id' => $data_list[0]->id));
                echo json_encode(array('status' => true, 'msg' => (isset($_POST['status']) && !empty($_POST['status'])) ? 'User Groups Inactive Successfully' : 'User Groups Active Successfully'));
            } else {
                echo json_encode(array('status' => false, 'msg' => (isset($_POST['status']) && !empty($_POST['status'])) ? 'User Groups Inactive not Successfully' : 'User Groups Active not Successfully'));
            }
        }
    }

    public function deletepopup() {
        $loadhtml = "";
        if (isset($_POST['usergroupid']) && !empty($_POST['usergroupid'])) {
            $condition_array['md5(id)'] = $_POST['usergroupid'];
            $data_list = $this->dbmodel->getAll('usergroups', $condition_array);
            if (count($data_list) > 0) {
                $data['list'] = $data_list[0];
                $loadhtml = $this->load->view('usergroups/delete', $data, true);
            }
        }
        echo json_encode(array('status' => true, 'viewhtml' => $loadhtml));
    }

}
