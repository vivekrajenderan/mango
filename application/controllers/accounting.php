<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Accounting extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('dbmodel'));
        if ($this->session->userdata('log_id') == "") {
            redirect(base_url() . 'login/', 'refresh');
        }
    }

    public function index() {
        //$params['filtercustom']["empout > " . time() . " OR empout IS NULL"] = '';
        $params['select'] = array('id', 'status', 'acctype', 'transdate', 'transamount', 'refno', 'transtext');
        $params['sorting'] = array('transdate'=>'desc');
        $data['list'] = $this->dbmodel->getGridAll('overalltransaction', $params);
        $this->load->view('includes/header');
        $this->load->view('accounting/list', $data);
        $this->load->view('includes/footer', array('jsfile' => array_merge($this->config->item('jsfile')['datatable'], $this->config->item('jsfile')['validation'], $this->config->item('jsfile')['accounting'])));
    }

    public function add($id = NULL) {
        $data['list'] = array();
        if (!empty($id)) {
            $condition_array['md5(id)'] = $id;
            $data_list = $this->dbmodel->getAll('overalltransaction', $condition_array);
            if (count($data_list) > 0) {                
                $data['list'] = $data_list[0];
            } else {
                
            }
        }
        $data['acctypelist'] = $this->config->item('acctype');
        $this->load->view('includes/header');
        $this->load->view('accounting/add', $data);
        $this->load->view('includes/footer', array('jsfile' => array_merge($this->config->item('jsfile')['datatable'], $this->config->item('jsfile')['validation'], $this->config->item('jsfile')['datepicker'], $this->config->item('jsfile')['accounting'])));
    }

    public function save() {
        if (($this->input->server('REQUEST_METHOD') == 'POST')) {            
            $this->form_validation->set_rules('acctype', 'Account Type', 'trim|required');
            $this->form_validation->set_rules('transamount', 'Transaction Amount', 'trim|required');
            $this->form_validation->set_rules('refno', 'Reference No', 'trim|required');
            $this->form_validation->set_rules('transtext', 'Transaction Comment', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                echo json_encode(array('status' => 0, 'msg' => validation_errors()));
                return false;
            } else {                          
                $setdata = array('acctype' => (isset($_POST['acctype']) && !empty($_POST['acctype'])) ? trim($_POST['acctype']) : "",
                    'transamount' => (isset($_POST['transamount']) && !empty($_POST['transamount'])) ? trim($_POST['transamount']) : "",                    
                    'refno' => (isset($_POST['refno']) && !empty($_POST['refno'])) ? trim($_POST['refno']) : "",
                    'transtext' => (isset($_POST['transtext']) && !empty($_POST['transtext'])) ? trim($_POST['transtext']) : "",                    
                    'updatedby' => $this->session->userdata('log_id')
                );
                
                $saved = "";
                if (isset($_POST['account_id']) && !empty($_POST['account_id'])) {
                    $saved = $this->dbmodel->update('overalltransaction', $setdata, array('id' => $_POST['account_id']));
                } else {                    
                    $setdata['createdby'] = $this->session->userdata('log_id');
                    $setdata['transdate'] = date('Y-m-d H:i:s');
                    $saved = $this->dbmodel->insert('overalltransaction', $setdata);
                }
                if ($saved) {
                    $this->session->set_flashdata('SucMessage', ucfirst($this->input->post('acctype')) . ' Accounting saved Successfully');
                    echo json_encode(array('status' => true, 'msg' => ucfirst($this->input->post('acctype')) . ' Accounting saved Successfully'));
                } else {
                    echo json_encode(array('status' => false, 'msg' => 'Accounting Saved Not Successfully'));
                }
            }
        }
    }

    public function view() {
        $loadhtml = "";
        if (isset($_POST['accountid']) && !empty($_POST['accountid'])) {
            $condition_array['md5(id)'] = $_POST['accountid'];
            $data_list = $this->dbmodel->getAll('overalltransaction', $condition_array);
            if (count($data_list) > 0) {                
                $data_list[0]->transdate = cdatedbton($data_list[0]->transdate);
                $data['list'] = $data_list[0];
                $loadhtml = $this->load->view('accounting/view', $data, true);
            }
        }
        echo json_encode(array('status' => true, 'viewhtml' => $loadhtml));
    }

    public function delete($id) {
        if (!empty($id)) {
            $condition_array['md5(id)'] = $id;
            $data_list = $this->dbmodel->getAll('overalltransaction', $condition_array);
            if (count($data_list) > 0) {
                $this->dbmodel->update('overalltransaction', array('dels' => '1'), array('id' => $data_list[0]->id));
                $this->session->set_flashdata('SucMessage', 'Accounting has been deleted successfully!!!');
            } else {
                $this->session->set_flashdata('ErrorMessages', 'Accounting has not been deleted successfully!!!');
            }
        }
        redirect(base_url() . 'accounting');
    }

    public function changestatus() {
        if (isset($_POST['accountid']) && !empty($_POST['accountid'])) {
            $condition_array['md5(id)'] = $_POST['accountid'];
            $data_list = $this->dbmodel->getAll('overalltransaction', $condition_array);
            if (count($data_list) > 0) {
                $this->dbmodel->update('overalltransaction', array('status' => (isset($_POST['status']) && !empty($_POST['status'])) ? '0' : '1'), array('id' => $data_list[0]->id));
                echo json_encode(array('status' => true, 'msg' => (isset($_POST['status']) && !empty($_POST['status'])) ? 'Accounting Inactive Successfully' : 'Accounting Active Successfully'));
            } else {
                echo json_encode(array('status' => false, 'msg' => (isset($_POST['status']) && !empty($_POST['status'])) ? 'Accounting Inactive not Successfully' : 'Accounting Active not Successfully'));
            }
        }
    }

    public function deletepopup() {
        $loadhtml = "";
        if (isset($_POST['accountid']) && !empty($_POST['accountid'])) {
            $condition_array['md5(id)'] = $_POST['accountid'];
            $data_list = $this->dbmodel->getAll('overalltransaction', $condition_array);
            if (count($data_list) > 0) {
                $data['list'] = $data_list[0];
                $loadhtml = $this->load->view('accounting/delete', $data, true);
            }
        }
        echo json_encode(array('status' => true, 'viewhtml' => $loadhtml));
    }

    public function downloadexcel() {
        $this->load->library('excel');
        $returnArr = array();
        $params['select'] = array('id', 'status', 'acctype', 'transdate', 'transamount', 'refno', 'transtext');
        $accountinglist = $this->dbmodel->getGridAll('overalltransaction', $params);
        $returnArr['list'] = $accountinglist;
        $returnArr['headingname'] = array('acctype' => 'Account Type', "transdate" => 'Trans Date', 'transamount' => 'Transaction Amount', 'refno' => 'Reference No', 'transtext' => 'Comment');
        $filenametext = 'Account_Report_';
        $data['filename'] = $filenametext . date('d-m-y') . '.xls';
        if(!empty($returnArr['list'])){
            $this->excel->streamCustom($data['filename'], $returnArr);
            $data['filename'] = 'export/' . $data['filename'];
            echo json_encode(array('status' => true, 'filename' => $data['filename']));
        } else {
            echo json_encode(array('status' => false, 'msg' =>'No data found'));
        }
    }

}
