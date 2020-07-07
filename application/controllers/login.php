<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

error_reporting(0);

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();        
        $this->load->library('session'); 
        $this->load->model('login_auth');
        $this->load->library('form_validation');
        if ($this->session->userdata('log_id') != "") {
            redirect(base_url() . 'dashboard', 'refresh');
        }
    }

    public function index() {
        $msg = "";
        $post_set['username'] = "";
        $post_set['password'] = "";

        if (($this->input->server('REQUEST_METHOD') == 'POST')) {
            $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[30]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|maxn_length[30]');
            if ($this->form_validation->run() === TRUE) {
                $login_verify = $this->login_auth->login_verify(trim($this->input->post('username')), trim($this->input->post('password')));
                if (count($login_verify)>0) {
                    redirect(base_url() . 'dashboard', 'refresh');
                } else {
                    $msg = "Invalid Credential";
                }
            } else {
                $post_set = $_POST;
            }
        }
        $data = array('post_set' => $post_set, 'msg' => $msg);

        $this->load->view('login', $data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */