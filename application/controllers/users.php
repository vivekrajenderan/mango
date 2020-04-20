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
        //$params['filtercustom']["empout > " . time() . " OR empout IS NULL"] = '';
        $params['select'] = array('id', 'status', 'fullname', 'username', 'fk_employee_id', 'fk_employee_empname','fk_usergroups_id', 'fk_usergroups_groupname');
        $data['list'] = $this->dbmodel->getGridAll('users', $params);
        $this->load->view('includes/header');
        $this->load->view('users/list', $data);
        $this->load->view('includes/footer', array('jsfile' => array_merge($this->config->item('jsfile')['datatable'], $this->config->item('jsfile')['validation'], $this->config->item('jsfile')['employee'])));
    }

}
