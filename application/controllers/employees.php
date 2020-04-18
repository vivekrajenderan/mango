<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employees extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('dbmodel'));
        if ($this->session->userdata('log_id') == "") {
            redirect(base_url() . 'login/', 'refresh');
        }
    }

    public function index() {
        //$params['filtercustom']["empl_out > " . time() . " OR empl_out IS NULL"] = '';
        $params['select'] = array('id', 'status', 'empl_no', 'empl_name', 'empl_dob', 'emplsex', 'empl_position', 'empl_salary', 'empl_address', 'empl_phone', 'empl_email', 'empl_in', 'empl_out', 'fk_employeestatus_id', 'fk_employeestatus_statusname');
        $data['list'] = $this->dbmodel->getGridAll('employee', $params);
        $this->load->view('includes/header');
        $this->load->view('employee/list', $data);
        $this->load->view('includes/footer');
    }
    public function add() {
        $data['maritalstatus']= Getdropdowns('employeestatus', 'statusname');        
        $this->load->view('includes/header');
        $this->load->view('employee/add', $data);
        $this->load->view('includes/footer');
    }

}
