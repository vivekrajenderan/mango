<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('customer_model'));
        if ($this->session->userdata('log_id') == "") {
            redirect(base_url() . 'login/', 'refresh');
        }
    }

    public function index() {
        $data['set_cur']=getFeild('set_value','settings','id',$this->config->item('settingshortname')['SET_CUR']);       
        $data['customeroverdue']= $this->customer_model->getCustomerOverdue();        
        $data['customertransoverdue']= $this->customer_model->getLtransOverdue();  
        $this->load->view('includes/header');
        $this->load->view('dashboard',$data);
        $this->load->view('includes/footer', array('jsfile' => array_merge($this->config->item('jsfile')['datatable'])));
    }

}
