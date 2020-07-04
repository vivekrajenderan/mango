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
        $params['select'] = array('id', 'status', 'loanreferenceno', 'requestdate', 'originalloanamount', 'approveddate', 'fk_customer_id', 'fk_customer_cusname', 'fk_employee_id', 'fk_employee_empname', 'fk_vechicle_id', 'fk_vechicle_vechilenumber', 'emiamount', 'lastduedate', 'nextduedate', '(nextduedate<CURRENT_DATE) as extendduedate', 'loanstatus');
        $data['list'] = $this->dbmodel->getGridAll('loan', $params);
        $this->load->view('includes/header');
        $this->load->view('loan/list', $data);
        $this->load->view('includes/footer', array('jsfile' => array_merge($this->config->item('jsfile')['datatable'], $this->config->item('jsfile')['validation'], $this->config->item('jsfile')['datepicker'], $this->config->item('jsfile')['loan'])));
    }

    public function add($id = NULL) {
        $data['list'] = array();
        if (!empty($id)) {
            $data_list = $this->loan_model->getLoan(array('id' => $id));
            if (count($data_list) > 0) {
                $data_list[0]->vechileinsurenseduedate = (isset($data_list[0]->vechileinsurenseduedate) && !empty($data_list[0]->vechileinsurenseduedate)) ? cdatedbton($data_list[0]->vechileinsurenseduedate) : '';
                $data_list[0]->vechileinsurensestartdate = (isset($data_list[0]->vechileinsurensestartdate) && !empty($data_list[0]->vechileinsurensestartdate)) ? cdatedbton($data_list[0]->vechileinsurensestartdate) : '';
                $data['list'] = $data_list[0];
            }
        }
        $data['loanperiodfrequency'] = $this->config->item('loanperiodfrequency');
        $data['customers'] = Getdropdowns('customer', 'cusname');

        $condition_array['emp_type'] = 'agent';
        $condition_array['status'] = '1';
        $data['employee'] = $this->dbmodel->getAll('employee', $condition_array, array('id' => 'id', 'empname' => 'empname', 'salary' => 'salary'));
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
                //Rc Document
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

                //Security Image
                if (isset($_FILES['security1profile']['name']) && (!empty($_FILES['security1profile']['name']))) {
                    $upload_image = do_upload_image('security1profile', UPLOADPATH . 'profile/');
                    if ($upload_image['image_message'] == "success") {
                        if (isset($loanlist[0]->security1profile) && !empty($loanlist[0]->security1profile)) {
                            $image_file = './assets/upload/profile/' . $loanlist[0]->security1profile;
                            if (file_exists($image_file)) {
                                unlink($image_file);
                            }
                        }
                        $security1_file_name = trim($upload_image['image_file_name']);
                    } else {
                        echo json_encode(array('status' => 0, 'msg' => "<p>Please upload only image</p>"));
                        return false;
                    }
                } else {
                    $security1_file_name = (isset($loanlist[0]->security1profile) && !empty($loanlist[0]->security1profile)) ? $loanlist[0]->security1profile : "";
                }

                $setdata = array(
                    'fk_customer_id' => (isset($_POST['fk_customer_id']) && !empty($_POST['fk_customer_id'])) ? trim($_POST['fk_customer_id']) : "",
                    'fk_employee_id' => (isset($_POST['fk_employee_id']) && !empty($_POST['fk_employee_id'])) ? trim($_POST['fk_employee_id']) : "",
                    'originalloanamount' => (isset($_POST['originalloanamount']) && !empty($_POST['originalloanamount'])) ? trim($_POST['originalloanamount']) : "",
                    'commission' => (isset($_POST['commission']) && !empty($_POST['commission'])) ? trim($_POST['commission']) : 0,
                    'loanperiod' => (isset($_POST['loanperiod']) && !empty($_POST['loanperiod'])) ? trim($_POST['loanperiod']) : "",
                    'loanperiodfrequency' => (isset($_POST['loanperiodfrequency']) && !empty($_POST['loanperiodfrequency'])) ? trim($_POST['loanperiodfrequency']) : "",
                    'loanintrestrate' => (isset($_POST['loanintrestrate']) && !empty($_POST['loanintrestrate'])) ? trim($_POST['loanintrestrate']) : "",
                    'security1name' => (isset($_POST['security1name']) && !empty($_POST['security1name'])) ? trim($_POST['security1name']) : "",
                    'security1aadhar' => (isset($_POST['security1aadhar']) && !empty($_POST['security1aadhar'])) ? trim($_POST['security1aadhar']) : "",
                    'security1mobileno' => (isset($_POST['security1mobileno']) && !empty($_POST['security1mobileno'])) ? trim($_POST['security1mobileno']) : "",
                    'security2name' => (isset($_POST['security2name']) && !empty($_POST['security2name'])) ? trim($_POST['security2name']) : "",
                    'security2aadhar' => (isset($_POST['security2aadhar']) && !empty($_POST['security2aadhar'])) ? trim($_POST['security2aadhar']) : "",
                    'security2mobileno' => (isset($_POST['security2mobileno']) && !empty($_POST['security2mobileno'])) ? trim($_POST['security2mobileno']) : "",
                    'security1profile' => trim($security1_file_name),
                    'createdby' => $this->session->userdata('log_id')
                );

                $vehicledata = array('fk_customer_id' => (isset($_POST['fk_customer_id']) && !empty($_POST['fk_customer_id'])) ? trim($_POST['fk_customer_id']) : "",
                    'vechilenumber' => (isset($_POST['vechilenumber']) && !empty($_POST['vechilenumber'])) ? trim($_POST['vechilenumber']) : "",
                    'vechilename' => (isset($_POST['vechilename']) && !empty($_POST['vechilename'])) ? trim($_POST['vechilename']) : "",
                    'vechilemodelyear' => (isset($_POST['vechilemodelyear']) && !empty($_POST['vechilemodelyear'])) ? trim($_POST['vechilemodelyear']) : "",
                    'vechilemodel' => (isset($_POST['vechilemodel']) && !empty($_POST['vechilemodel'])) ? trim($_POST['vechilemodel']) : "",
                    'vechilercno' => (isset($_POST['vechilercno']) && !empty($_POST['vechilercno'])) ? trim($_POST['vechilercno']) : "",
                    'vechileinsurenceno' => (isset($_POST['vechileinsurenceno']) && !empty($_POST['vechileinsurenceno'])) ? trim($_POST['vechileinsurenceno']) : "",
                    'vechileinsurensestartdate' => (isset($_POST['vechileinsurensestartdate']) && !empty($_POST['vechileinsurensestartdate'])) ? cdatentodb($_POST['vechileinsurensestartdate']) : "",
                    'vechileinsurenseduedate' => (isset($_POST['vechileinsurenseduedate']) && !empty($_POST['vechileinsurenseduedate'])) ? cdatentodb($_POST['vechileinsurenseduedate']) : "",
                    'vechileenginetype' => (isset($_POST['vechileenginetype']) && !empty($_POST['vechileenginetype'])) ? trim($_POST['vechileenginetype']) : "",
                    'rcdocument' => trim($file_name),
                    'createdby' => $this->session->userdata('log_id')
                );

                $saved = "";
                if (isset($_POST['loan_id']) && !empty($_POST['loan_id'])) {
                    $setdata['mdate'] = $vehicledata['mdate'] = $this->session->userdata('log_id');
                    $setdata['updatedby'] = $vehicledata['updatedby'] = time();
                    $amount = $setdata['originalloanamount'];
                    $rate = $setdata['loanintrestrate'] / 1200; // Monthly interest rate
                    $term = $setdata['loanperiod']; // Term in months
                    $emi = ceil($amount * $rate * (pow(1 + $rate, $term) / (pow(1 + $rate, $term) - 1)));
                    $setdata['emiamount'] = $emi;
                    $saved = $this->dbmodel->update('loan', $setdata, array('id' => $_POST['loan_id']));
                    if (isset($vehiclelist[0]->id) && !empty($vehiclelist[0]->id)) {
                        $saved = $this->dbmodel->update('vechicle', $vehicledata, array('id' => $vehiclelist[0]->id));
                    }
                } else {
                    $setdata['loanreferenceno'] = getRefId(array('doctype' => 'loan'));
                    $setdata['requestdate'] = date('Y-m-d');
                    $amount = $setdata['originalloanamount'];
                    $rate = $setdata['loanintrestrate'] / 1200; // Monthly interest rate
                    $term = $setdata['loanperiod']; // Term in months
                    $emi = ceil($amount * $rate * (pow(1 + $rate, $term) / (pow(1 + $rate, $term) - 1)));
                    $setdata['emiamount'] = $emi;
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

    public function emiview() {
        if (($this->input->server('REQUEST_METHOD') == 'POST')) {
            $this->form_validation->set_rules('originalloanamount', 'Loan Amount', 'trim|required');
            $this->form_validation->set_rules('loanperiod', 'Loan Period', 'trim|required');
            $this->form_validation->set_rules('loanintrestrate', 'Loan Interest Rate', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                echo json_encode(array('status' => 0, 'msg' => validation_errors()));
                return false;
            } else {
                $amount = $_POST['originalloanamount'];
                $rate = $_POST['loanintrestrate'] / 1200; // Monthly interest rate
                $term = $_POST['loanperiod']; // Term in months
                $emi = ceil($amount * $rate * (pow(1 + $rate, $term) / (pow(1 + $rate, $term) - 1)));
                echo json_encode(array('status' => true, 'emiamount' => $emi, 'totalemiamount' => $emi * $term, 'profit' => (($emi * $term) - $amount)));
            }
        }
    }

    public function view() {
        $loadhtml = "";
        if (isset($_POST['loanid']) && !empty($_POST['loanid'])) {
            $data_list = $this->loan_model->getLoan(array('id' => $_POST['loanid']));
            if (count($data_list) > 0) {
                $data_list[0]->vechileinsurenseduedate = (isset($data_list[0]->vechileinsurenseduedate) && !empty($data_list[0]->vechileinsurenseduedate)) ? cdatedbton($data_list[0]->vechileinsurenseduedate) : '';
                $data_list[0]->vechileinsurensestartdate = (isset($data_list[0]->vechileinsurensestartdate) && !empty($data_list[0]->vechileinsurensestartdate)) ? cdatedbton($data_list[0]->vechileinsurensestartdate) : '';
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
            $condition_array['id'] = $_POST['loanid'];
            $data_list = $this->dbmodel->getAll('loan', $condition_array);            
            if (count($data_list) > 0) {
                $date = $nextduedate=(isset($_POST['duedate']) && !empty($_POST['duedate'])) ? cdatentodb($_POST['duedate']) : date('Y-m-d');
                //$nextduedate = nextDueDateCalc($data_list[0]->loanperiod, $data_list[0]->loanperiodfrequency, $date);
                $lastduedate = date('Y-m-d', strtotime($date . ' + ' . $data_list[0]->loanperiod . ' ' . $data_list[0]->loanperiodfrequency));                
                $this->dbmodel->update('loan', array('approveddate' => $date, 'approvedamount' => $data_list[0]->originalloanamount, 'loanstatus' => $this->config->item('loanstatus')['approved'], 'activateddate' => date('Y-m-d'), 'nextduedate' => $nextduedate, 'lastduedate' => $lastduedate), array('id' => $data_list[0]->id));
                echo json_encode(array('status' => true));

                $this->session->set_flashdata('SucMessage', $data_list[0]->loanreferenceno . ' Loan has been approved successfully!!!');
            } else {
                echo json_encode(array('status' => false, 'msg' => 'Loan has not been approved successfully'));
            }
        }
    }

    public function payment($id = NULL) {
        if (isset($id) && !empty($id)) {
            $data_list = $this->loan_model->getLoan(array('id' => $id));
            $settings_list = $this->dbmodel->getAll('settings', array('id' => 1));
            if (count($data_list) > 0) {
                $data_list[0]->nextduedate = (isset($data_list[0]->nextduedate) && !empty($data_list[0]->nextduedate)) ? cdatedbton($data_list[0]->nextduedate) : '';
                $data_list[0]->fineintrest = $settings_list[0]->fine_percentage;
                $data_list[0]->fineamount = ($data_list[0]->emiamount * ($settings_list[0]->fine_percentage / 100));
                $data_list[0]->fine_days = $settings_list[0]->fine_days;
                $data['list'] = $data_list[0];
            }
        }
        $this->load->view('includes/header');
        $this->load->view('loan/payment', $data);
        $this->load->view('includes/footer', array('jsfile' => array_merge($this->config->item('jsfile')['datatable'], $this->config->item('jsfile')['validation'], $this->config->item('jsfile')['datepicker'], $this->config->item('jsfile')['loan'])));
    }

    public function paymenthistory() {
        if (isset($_POST['loanid']) && !empty($_POST['loanid'])) {
            $data_list = $this->loan_model->getLoan(array('id' => $_POST['loanid']));
            if (count($data_list) > 0) {
                $history_list = $this->dbmodel->getAll('loan_payment', array('fk_loan_id' => $data_list[0]->id));
                $data['history_list'] = array();
                foreach ($history_list as $key => $value) {
                    $data['history_list'][$key] = $value;
                    $data['history_list'][$key]->dateduepaid = cdatedbton($value->dateduepaid);
                    $data['history_list'][$key]->dateofpaid = cdatedbton($value->dateofpaid);
                }
                $data_list[0]->vechileinsurenseduedate = (isset($data_list[0]->vechileinsurenseduedate) && !empty($data_list[0]->vechileinsurenseduedate)) ? cdatedbton($data_list[0]->vechileinsurenseduedate) : '';
                $data_list[0]->vechileinsurensestartdate = (isset($data_list[0]->vechileinsurensestartdate) && !empty($data_list[0]->vechileinsurensestartdate)) ? cdatedbton($data_list[0]->vechileinsurensestartdate) : '';
                $data['list'] = $data_list[0];
                $loadhtml = $this->load->view('loan/paymentview', $data, true);
            }
        }
        echo json_encode(array('status' => true, 'viewhtml' => $loadhtml));
    }

    public function makepayment() {
        if (isset($_POST['loan_id']) && !empty($_POST['loan_id'])) {
            $condition_array['id'] = $_POST['loan_id'];
            $data_list = $this->dbmodel->getAll('loan', $condition_array);
            $settings_list = $this->dbmodel->getAll('settings', array('id' => 1));
            if (count($data_list) > 0) {
                $lastduedate = $data_list[0]->lastduedate;
                $nextduedate = $data_list[0]->nextduedate;
                $emiamount = $data_list[0]->emiamount;
                $updateduedate = date('Y-m-d');

                $insertdata = array(
                    'fk_customer_id' => $_POST['fk_customer_id'],
                    'fk_vechicle_id' => $_POST['fk_vechicle_id'],
                    'fk_loan_id' => $_POST['loan_id'],
                    'dateduepaid' => $nextduedate,
                    'dateofpaid' => date('Y-m-d'),
                    'subamount' => $_POST['subamount'],
                    'amount' => $_POST['subamount'],
                    'billreferenceno'=>getRefId(array('doctype' => 'bill'))
                );
                if (isset($_POST['fineintrestcheck']) && $_POST['fineintrestcheck'] == 1) {
                    $insertdata['fineintrest'] = $_POST['fineintrest'];
                    $insertdata['fineamount'] = ($_POST['subamount'] * ($_POST['fineintrest'] / 100));
                    $insertdata['amount'] += $insertdata['fineamount'];
                }
                $financeloanpayment = $this->dbmodel->insert('financeloanpayment', $insertdata);
                $nextduedate = nextDueDateCalc($data_list[0]->loanperiod, $data_list[0]->loanperiodfrequency, $data_list[0]->nextduedate);
                $updatearray = array(
                    'nextduedate' => (strtotime($lastduedate) <= strtotime($nextduedate)) ? $lastduedate : $nextduedate,
                );
                if ((strtotime($lastduedate) <= strtotime($nextduedate))) {
                    $updatearray['loanstatus'] = $this->config->item('loanstatus')['cleared'];
                }
                $setdata = array(
                    'fk_customer_id' => $_POST['fk_customer_id'],
                    'fk_loan_payment_id' => $financeloanpayment,
                    'fk_loan_id' => $_POST['loan_id'],
                    'acctype' => "income",
                    'transamount' => $_POST['subamount'],
                    'refno' => $data_list[0]->loanreferenceno,
                    'transtext' => "Loan Repayment",
                    'updatedby' => $this->session->userdata('log_id')
                );
                $setdata['createdby'] = $this->session->userdata('log_id');
                $setdata['transdate'] = date('Y-m-d H:i:s');
                $saved = $this->dbmodel->insert('overalltransaction', $setdata);
                if (isset($_POST['fineintrestcheck']) && $_POST['fineintrestcheck'] == 1) {
                    $setdata['transamount'] = $insertdata['fineamount'];
                    $setdata['transtext'] = "Fine Amount";
                    $saved = $this->dbmodel->insert('overalltransaction', $setdata);
                }
                $this->dbmodel->update('loan', $updatearray, array('id' => $data_list[0]->id));
                echo json_encode(array('status' => true));
                $this->session->set_flashdata('SucMessage', $data_list[0]->loanreferenceno . ' Loan has been payment successfully!!!');
            } else {
                echo json_encode(array('status' => false, 'msg' => 'Loan has not been payment successfully'));
            }
        } else {
            echo json_encode(array('status' => false, 'msg' => 'Loan has not exists'));
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

    public function approvepopup() {
        $loadhtml = "";
        if (isset($_POST['loanid']) && !empty($_POST['loanid'])) {
            $condition_array['md5(id)'] = $_POST['loanid'];
            $data_list = $this->dbmodel->getAll('loan', $condition_array);
            if (count($data_list) > 0) {
                $data['list'] = $data_list[0];
                $loadhtml = $this->load->view('loan/approve', $data, true);
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
            'vechileinsurensestartdate' => 'Insurance Start Date',
            'vechileinsurenseduedate' => 'Insurance Due Date', 'vechileenginetype' => 'Engine Type', 'loanperiod' => 'Loan Period',
            'loanperiodfrequency' => 'Loan Period Frequency', 'loanintrestrate' => 'Loan Interest Rate', 'security1name' => 'Security1 Name',
            'security1aadhar' => 'Security1 Aadhar', 'security1mobileno' => 'Security1 Mobile No', 'security2name' => 'Security2 Name', 'security2aadhar' => 'Security2 Aadhar',
            'security2mobileno' => 'Security2 Mobile No');
        $filenametext = 'Loan_Report_';
        $data['filename'] = $filenametext . date('d-m-y') . '.xls';
        if (!empty($returnArr['list'])) {
            $this->excel->streamCustom($data['filename'], $returnArr);
            $data['filename'] = 'export/' . $data['filename'];
            echo json_encode(array('status' => true, 'filename' => $data['filename']));
        } else {
            echo json_encode(array('status' => false, 'msg' => 'No data found'));
        }
    }

}
