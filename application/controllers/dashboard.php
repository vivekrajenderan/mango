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
        $data['set_cur']='INR';       
        $data['customeroverdue']= $this->customer_model->getCustomerOverdue();        
        $data['customercount']= $this->customer_model->getCustomerCount();  
        $data['approvecount']= $this->customer_model->getLoanCount($status='approved');  
        $data['clearedcount']= $this->customer_model->getLoanCount($status='cleared');
        $data['customertransoverdue']=array();         
        $this->load->view('includes/header');
        $this->load->view('dashboard',$data);
        $this->load->view('includes/footer', array('jsfile' => array_merge($this->config->item('jsfile')['datatable'])));
    }
    
    public function DeleteDown($Getfoleder = FALSE, $GetModuleName = FALSE) {
        if (file_exists('export/' . $GetModuleName)) {
            unlink('export/' . $GetModuleName);            
        }
    }

}
