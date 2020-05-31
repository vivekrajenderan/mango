<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Loan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('dbmodel', 'loan_model'));
        if ($this->session->userdata('log_id') == "") {
            redirect(base_url() . 'login/', 'refresh');
        }
    }

    public function index() {
        $params['select'] = array('id', 'status', 'loanreferenceno', 'requestdate', 'originalloanamount', 'approveddate', 'fk_customer_id', 'fk_customer_cusname', 'fk_vechicle_id', 'fk_vechicle_vechilenumber');
        $data['list'] = $this->dbmodel->getGridAll('loan', $params);
        $this->load->view('includes/header');
        $this->load->view('loan/list', $data);
        $this->load->view('includes/footer', array('jsfile' => array_merge($this->config->item('jsfile')['datatable'], $this->config->item('jsfile')['validation'], $this->config->item('jsfile')['loan'])));
    }

    public function add($id = NULL) {
        $data['list'] = array();
        if (!empty($id)) {
            $data_list = $this->loan_model->getLoan(array('id' => $id));
            if (count($data_list) > 0) {
                $data_list[0]->vechileinsurenseduedate = (isset($data_list[0]->vechileinsurenseduedate) && !empty($data_list[0]->vechileinsurenseduedate)) ? cdatedbton($data_list[0]->vechileinsurenseduedate) : '';
                $data['list'] = $data_list[0];
            }
        }
        $data['loanperiodfrequency'] = $this->config->item('loanperiodfrequency');
        $data['customers'] = Getdropdowns('customer', 'cusname');
        $this->load->view('includes/header');
        $this->load->view('loan/add', $data);
        $this->load->view('includes/footer', array('jsfile' => array_merge($this->config->item('jsfile')['datatable'], $this->config->item('jsfile')['validation'], $this->config->item('jsfile')['datepicker'], $this->config->item('jsfile')['loan'])));
    }

    public function save() {
        if (($this->input->server('REQUEST_METHOD') == 'POST')) {
            $this->form_validation->set_rules('fk_customer_id', 'Customer', 'trim|required');
            $this->form_validation->set_rules('vechilenumber', 'Vehicle Number', 'trim|required');
            $this->form_validation->set_rules('vechilename', 'Vehicle Name', 'trim|required');
            $this->form_validation->set_rules('vechilemodelyear', 'Vehicle Model Year', 'trim|required');
            $this->form_validation->set_rules('vechilercno', 'Vehicle RC No', 'trim|required');
            $this->form_validation->set_rules('originalloanamount', 'Loan Amount', 'trim|required');
            $this->form_validation->set_rules('loanperiod', 'Loan Period', 'trim|required');
            $this->form_validation->set_rules('loanperiodfrequency', 'Loan Period Frequency', 'trim|required');
            $this->form_validation->set_rules('loanintrestrate', 'Loan Interest Rate', 'trim|required');
            $this->form_validation->set_rules('security1name', 'Security1 Name', 'trim|required');
            $this->form_validation->set_rules('security1aadhar', 'Security1 Aadhar', 'trim|required');
            $this->form_validation->set_rules('security1mobileno', 'Security1 Mobile No', 'trim|required|min_length[10]|max_length[10]|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                echo json_encode(array('status' => 0, 'msg' => validation_errors()));
                return false;
            } else {
                $vehiclelist = array();
                if (isset($_POST['loan_id']) && !empty($_POST['loan_id'])) {
                    $loanlist = $this->loan_model->getLoan(array('id' => md5($_POST['loan_id'])));
                    if (count($loanlist) > 0) {
                        $vehiclelist = $this->dbmodel->getAll('vechicle', array('id' => $loanlist[0]->fk_vechicle_id));
                    }
                }
                if (isset($_FILES['rcdocument']['name']) && (!empty($_FILES['rcdocument']['name']))) {
                    $upload_image = do_upload_image('rcdocument', UPLOADPATH . 'rcdocument/');
                    if ($upload_image['image_message'] == "success") {
                        if (isset($vehiclelist[0]->rcdocument) && !empty($vehiclelist[0]->rcdocument)) {
                            $image_file = './assets/upload/rcdocument/' . $vehiclelist[0]->rcdocument;
                            if (file_exists($image_file)) {
                                unlink($image_file);
                            }
                        }
                        $file_name = trim($upload_image['image_file_name']);
                    } else {
                        echo json_encode(array('status' => 0, 'msg' => "<p>Please upload only image</p>"));
                        return false;
                    }
                } else {
                    $file_name = (isset($vehiclelist[0]->rcdocument) && !empty($vehiclelist[0]->rcdocument)) ? $vehiclelist[0]->rcdocument : "";
                }
                $setdata = array('fk_customer_id' => (isset($_POST['fk_customer_id']) && !empty($_POST['fk_customer_id'])) ? trim($_POST['fk_customer_id']) : "",
                    'originalloanamount' => (isset($_POST['originalloanamount']) && !empty($_POST['originalloanamount'])) ? trim($_POST['originalloanamount']) : "",
                    'loanperiod' => (isset($_POST['loanperiod']) && !empty($_POST['loanperiod'])) ? trim($_POST['loanperiod']) : "",
                    'loanperiodfrequency' => (isset($_POST['loanperiodfrequency']) && !empty($_POST['loanperiodfrequency'])) ? trim($_POST['loanperiodfrequency']) : "",
                    'loanintrestrate' => (isset($_POST['loanintrestrate']) && !empty($_POST['loanintrestrate'])) ? trim($_POST['loanintrestrate']) : "",
                    'security1name' => (isset($_POST['security1name']) && !empty($_POST['security1name'])) ? trim($_POST['security1name']) : "",
                    'security1aadhar' => (isset($_POST['security1aadhar']) && !empty($_POST['security1aadhar'])) ? trim($_POST['security1aadhar']) : "",
                    'security1mobileno' => (isset($_POST['security1mobileno']) && !empty($_POST['security1mobileno'])) ? trim($_POST['security1mobileno']) : "",
                    'security2name' => (isset($_POST['security2name']) && !empty($_POST['security2name'])) ? trim($_POST['security2name']) : "",
                    'security2aadhar' => (isset($_POST['security2aadhar']) && !empty($_POST['security2aadhar'])) ? trim($_POST['security2aadhar']) : "",
                    'security2mobileno' => (isset($_POST['security2mobileno']) && !empty($_POST['security2mobileno'])) ? trim($_POST['security2mobileno']) : "",
                    'createdby' => $this->session->userdata('log_id')
                );

                $vehicledata = array('fk_customer_id' => (isset($_POST['fk_customer_id']) && !empty($_POST['fk_customer_id'])) ? trim($_POST['fk_customer_id']) : "",
                    'vechilenumber' => (isset($_POST['vechilenumber']) && !empty($_POST['vechilenumber'])) ? trim($_POST['vechilenumber']) : "",
                    'vechilename' => (isset($_POST['vechilename']) && !empty($_POST['vechilename'])) ? trim($_POST['vechilename']) : "",
                    'vechilemodelyear' => (isset($_POST['vechilemodelyear']) && !empty($_POST['vechilemodelyear'])) ? trim($_POST['vechilemodelyear']) : "",
                    'vechilemodel' => (isset($_POST['vechilemodel']) && !empty($_POST['vechilemodel'])) ? trim($_POST['vechilemodel']) : "",
                    'vechilercno' => (isset($_POST['vechilercno']) && !empty($_POST['vechilercno'])) ? trim($_POST['vechilercno']) : "",
                    'vechileinsurenceno' => (isset($_POST['vechileinsurenceno']) && !empty($_POST['vechileinsurenceno'])) ? trim($_POST['vechileinsurenceno']) : "",
                    'vechileinsurenseduedate' => (isset($_POST['vechileinsurenseduedate']) && !empty($_POST['vechileinsurenseduedate'])) ? cdatentodb($_POST['vechileinsurenseduedate']) : "",
                    'vechileenginetype' => (isset($_POST['vechileenginetype']) && !empty($_POST['vechileenginetype'])) ? trim($_POST['vechileenginetype']) : "",
                    'rcdocument' => trim($file_name),
                    'createdby' => $this->session->userdata('log_id')
                );

                $saved = "";
                if (isset($_POST['loan_id']) && !empty($_POST['loan_id'])) {
                    $setdata['mdate'] = $vehicledata['mdate'] = $this->session->userdata('log_id');
                    $setdata['updatedby'] = $vehicledata['updatedby'] = time();
                    $saved = $this->dbmodel->update('loan', $setdata, array('id' => $_POST['loan_id']));
                    if (isset($vehiclelist[0]->id) && !empty($vehiclelist[0]->id)) {
                        $saved = $this->dbmodel->update('vechicle', $vehicledata, array('id' => $vehiclelist[0]->id));
                    }
                } else {
                    $setdata['loanreferenceno'] = getRefId(array('doctype' => 'loan'));
                    $setdata['requestdate'] = date('Y-m-d');
                    $setdata['loanstatus'] = $this->config->item('loanstatus')['pending'];
                    $setdata['cdate'] = $setdata['mdate'] = $vehicledata['cdate'] = $vehicledata['mdate'] = time();

                    $vehicleid = $this->dbmodel->insert('vechicle', $vehicledata);
                    $setdata['fk_vechicle_id'] = $vehicleid;
                    $saved = $this->dbmodel->insert('loan', $setdata);
                }
                if ($saved) {
                    $this->session->set_flashdata('SucMessage', $_POST['vechilenumber'] . ' Loan saved Successfully');
                    echo json_encode(array('status' => true, 'msg' => ucfirst($this->input->post('empname')) . ' Loan saved Successfully'));
                } else {
                    echo json_encode(array('status' => false, 'msg' => 'Loan Saved Not Successfully'));
                }
            }
        }
    }

    public function view() {
        $loadhtml = "";
        if (isset($_POST['loanid']) && !empty($_POST['loanid'])) {
            $data_list = $this->loan_model->getLoan(array('id' => $_POST['loanid']));
            if (count($data_list) > 0) {
                $data_list[0]->vechileinsurenseduedate = (isset($data_list[0]->vechileinsurenseduedate) && !empty($data_list[0]->vechileinsurenseduedate)) ? cdatedbton($data_list[0]->vechileinsurenseduedate) : '';
                $data['list'] = $data_list[0];
                $loadhtml = $this->load->view('loan/view', $data, true);
            }
        }
        echo json_encode(array('status' => true, 'viewhtml' => $loadhtml));
    }

    public function delete($id) {
        if (!empty($id)) {
            $condition_array['md5(id)'] = $id;
            $data_list = $this->dbmodel->getAll('loan', $condition_array);
            if (count($data_list) > 0) {
                $this->dbmodel->update('loan', array('dels' => '1'), array('id' => $data_list[0]->id));
                $this->session->set_flashdata('SucMessage', 'Loan has been deleted successfully!!!');
            } else {
                $this->session->set_flashdata('ErrorMessages', 'Loan has not been deleted successfully!!!');
            }
        }
        redirect(base_url() . 'loan');
    }

    public function changestatus() {
        if (isset($_POST['loanid']) && !empty($_POST['loanid'])) {
            $condition_array['md5(id)'] = $_POST['loanid'];
            $data_list = $this->dbmodel->getAll('loan', $condition_array);
            if (count($data_list) > 0) {
                $this->dbmodel->update('loan', array('status' => (isset($_POST['status']) && !empty($_POST['status'])) ? '0' : '1'), array('id' => $data_list[0]->id));
                echo json_encode(array('status' => true, 'msg' => (isset($_POST['status']) && !empty($_POST['status'])) ? 'Loan Inactive Successfully' : 'Loan Active Successfully'));
            } else {
                echo json_encode(array('status' => false, 'msg' => (isset($_POST['status']) && !empty($_POST['status'])) ? 'Loan Inactive not Successfully' : 'Loan Active not Successfully'));
            }
        }
    }

    public function approve() {
        if (isset($_POST['loanid']) && !empty($_POST['loanid'])) {
            $condition_array['md5(id)'] = $_POST['loanid'];
            $data_list = $this->dbmodel->getAll('loan', $condition_array);
            if (count($data_list) > 0) {
                $this->dbmodel->update('loan', array('approveddate' => date('Y-m-d'), 'approvedamount' => $data_list[0]->originalloanamount), array('id' => $data_list[0]->id));
                echo json_encode(array('status' => true));
                $this->session->set_flashdata('SucMessage', $data_list[0]->loanreferenceno.' Loan has been approved successfully!!!');
            } else {
                echo json_encode(array('status' => false, 'msg' => 'Loan has not been approved successfully'));
            }
        }
    }

    public function deletepopup() {
        $loadhtml = "";
        if (isset($_POST['loanid']) && !empty($_POST['loanid'])) {
            $condition_array['md5(id)'] = $_POST['loanid'];
            $data_list = $this->dbmodel->getAll('loan', $condition_array);
            if (count($data_list) > 0) {
                $data['list'] = $data_list[0];
                $loadhtml = $this->load->view('loan/delete', $data, true);
            }
        }
        echo json_encode(array('status' => true, 'viewhtml' => $loadhtml));
    }

    public function downloadexcel() {
        $this->load->library('excel');
        $returnArr = array();
        $loanlist = $this->loan_model->getLoan();
        $returnArr['list'] = $loanlist;
        $returnArr['headingname'] = array('loanreferenceno' => 'Loan No', "cusname" => "Customer Name", "requestdate" => 'Request Date', 'originalloanamount' => 'Loan Amount',
            'approveddate' => 'Approved Date', 'approvedamount' => 'Approved Amount', 'vechilenumber' => 'Vehicle Number', 'vechilename' => 'Vehicle Name', 'vechilemodelyear' => 'Vehicle Model Year',
            'vechilemodel' => 'Vehicle Model', 'vechilercno' => 'Vehicle RC No', 'vechileinsurenceno' => "Vehicle Insurance No",
            'vechileinsurenseduedate' => 'Insurance Due Date', 'vechileenginetype' => 'Engine Type', 'loanperiod' => 'Loan Period',
            'loanperiodfrequency' => 'Loan Period Frequency', 'loanintrestrate' => 'Loan Interest Rate', 'security1name' => 'Security1 Name',
            'security1aadhar' => 'Security1 Aadhar', 'security1mobileno' => 'Security1 Mobile No', 'security2name' => 'Security2 Name', 'security2aadhar' => 'Security2 Aadhar',
            'security2mobileno' => 'Security2 Mobile No');
        $filenametext = 'Loan_Report_';
        $data['filename'] = $filenametext . date('d-m-y') . '.xls';
        $this->excel->streamCustom($data['filename'], $returnArr);
        $data['filename'] = 'export/' . $data['filename'];
        echo json_encode(array('status' => true, 'filename' => $data['filename']));
    }

}
