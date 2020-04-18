<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//error_reporting(0);

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->helper('form');

        $this->load->model('users_model');
        $this->load->library('form_validation');
        if ($this->session->userdata('userid') == "") {
            redirect(base_url() . 'login', 'refresh');
        }
    }

    public function index() {
        $data['PurchaseShopList'] = $this->users_model->Purchase_shopList();
        //echo "<pre>";print_r($data['PurchaseShopList']);die; 
        $this->load->view('includes/header');
        $this->load->view('user/ShopList', $data);
        $this->load->view('includes/footer');
    }

}
