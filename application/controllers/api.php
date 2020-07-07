<?php

/**
 * 
 */
require_once(APPPATH . 'libraries/REST_Controller.php');

class Api extends REST_Controller {

    public $getrequest;

    function __construct() {
        parent::__construct();
        /* Key authndication start */


        $reqHeaders = $this->input->request_headers();
        if (!isset($reqHeaders['Authtoken'])) {
            echo 'Invalid Request';
            exit;
        }
        $auth_token = $reqHeaders['Authtoken'];

        if (empty($reqHeaders['Authtoken'])) {
            // Return Error Result
            $this->response(array('result' => array('msg' => "Auth token not empty")), 406);
        }
        if ($reqHeaders['Authtoken'] != AUTH_TOKEN) {
            // Return Error Result
            $this->response(array('result' => array('msg' => "Auth token invalid")), 401);
        }
        /* Key authndication end */

        $post_request = file_get_contents('php://input');
        $this->getrequest = json_decode($post_request, true);        
        $this->load->helper(array('form', 'url'));
        $this->load->model(array('dbmodel', 'login_auth'));
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('', '');
    }

    public function login_post() {

        $request = $this->getrequest;        
        // Mandatory Fields validation
        $mandatoryKeys = array('username' => 'User Name', 'password' => 'Password');
        $nonMandatoryValueKeys = array();
        $check_request = mandatoryArray($request, $mandatoryKeys, $nonMandatoryValueKeys);
        if (!empty($check_request)) {
            // Return Error Result
            $this->response(array("msg" => $check_request["msg"], 'status' => false), 200);
        } else {
            $_POST = $request;
            $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[30]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|maxn_length[30]');
            if ($this->form_validation->run() == FALSE) {
                // Return Error Result
                $this->response(array("msg" => validation_errors(), 'status' => false), 200);
            } else {
                $userDetails = $this->login_auth->login_verify(trim($this->input->post('username')), trim($this->input->post('password')));
                if (count($userDetails)>0) {
                    $this->response(array('status' => true, "user" => $userDetails), 200);
                } else {
                    $this->response(array('status' => false, "msg" => "Invalid User"), 200);
                }
            }
        }
    }

}

?>