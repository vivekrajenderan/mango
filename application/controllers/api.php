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
        $this->load->model(array('dbmodel', 'login_auth','customer_model','report_model'));
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
    public function logout_post() {
        $this->session->sess_destroy(); 
        $this->response(array('status' => true, "msg" => "Logout Successfully"), 200);
    }
    public function dashboardCount_post() {
        $data['set_cur']='INR';             
        $data['customercount']= $this->customer_model->getCustomerCount();  
        $data['approvecount']= $this->customer_model->getLoanCount($status='approved');  
        $data['clearedcount']= $this->customer_model->getLoanCount($status='cleared');
        $this->response(array('status' => true, "data" => $data), 200);
    }
    public function customer_post() {
        $data['customer'] = $this->report_model->getMonthlyPaymentReport();  
        $this->response(array('status' => true, "data" => $data), 200);
    }
    public function loan_post() {
        $params['select'] = array('id', 'status', 'loanreferenceno', 'requestdate', 'originalloanamount', 'approveddate', 'fk_customer_id', 'fk_customer_cusname', 'fk_employee_id', 'fk_employee_empname', 'fk_vechicle_id', 'fk_vechicle_vechilenumber', 'emiamount', 'lastduedate', 'nextduedate', '(nextduedate<CURRENT_DATE) as extendduedate', 'loanstatus','fk_vechicle_id','fk_vechicle_vechileinsurenseduedate');
        $data['list'] = $this->dbmodel->getGridAll('loan', $params); 
        if(!empty($data['list'])){
            foreach ($data['list'] as $key => $value) {
                $data['list'][$key]->extendduedate=($value->extendduedate>0)?'#ff3131c7':'';
                $data['list'][$key]->vechileinsurenseduedate_color=($value->fk_vechicle_vechileinsurenseduedate<date('Y-m-d'))?'#FFFF00':'';
            }
        }
        $this->response(array('status' => true, "data" => $data), 200);
    }
}

?>