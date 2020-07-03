<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reports extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('dbmodel', 'report_model'));
        if ($this->session->userdata('log_id') == "") {
            redirect(base_url() . 'login/', 'refresh');
        }
    }

    public function daily() {
        $params['filtercustom']["date(dateofpaid)='" . date('Y-m-d') . "'"] = '';
        if(isset($_GET['fk_loan_id']) && !empty($_GET['fk_loan_id'])){
            $params['filtercustom']["fk_loan_id"] = $_GET['fk_loan_id'];
        }
        if(isset($_GET['fk_customer_id']) && !empty($_GET['fk_customer_id'])){
            $params['filtercustom']["fk_customer_id"] = $_GET['fk_customer_id'];
        }
        if(isset($_GET['date']) && !empty($_GET['date'])){
            $params['filtercustom']["date(dateofpaid)='" . cdatentodb($_GET['date']) . "'"] = '';
        }
        $params['sorting']["dateofpaid"] = 'desc';
        $params['select'] = array('fk_customer_id','fk_customer_cusname','fk_loan_id','fk_loan_loanreferenceno', 'billreferenceno', 'fineamount', 'amount', 'dateduepaid', 'dateofpaid','case when date(dateofpaid)>date(dateduepaid) then DATEDIFF(dateofpaid,dateduepaid) else 0 end as diffdays');
        $data['list'] = $this->dbmodel->getGridAll('loan_payment', $params);
        $data['customers'] = Getdropdowns('customer', 'cusname');
        $data['loan'] = Getdropdowns('loan', 'loanreferenceno');
        $this->load->view('includes/header');
        $this->load->view('reports/daily', $data);
        $this->load->view('includes/footer', array('jsfile' => array_merge($this->config->item('jsfile')['datepicker'], $this->config->item('jsfile')['report'])));
    } 

    public function dailydownloadexcel() {
        $this->load->library('excel');
        $returnArr = array();
        $params['filtercustom']["date(dateofpaid)='" . date('Y-m-d') . "'"] = '';
        if(isset($_POST['fk_loan_id']) && !empty($_POST['fk_loan_id'])){
            $params['filtercustom']["fk_loan_id"] = $_POST['fk_loan_id'];
        }
        if(isset($_POST['fk_customer_id']) && !empty($_POST['fk_customer_id'])){
            $params['filtercustom']["fk_customer_id"] = $_POST['fk_customer_id'];
        }
        if(isset($_GET['date']) && !empty($_GET['date'])){
            $params['filtercustom']["date(dateofpaid)='" . cdatentodb($_GET['date']) . "'"] = '';
        }
        $params['sorting']["dateofpaid"] = 'desc';
        $params['select'] = array('fk_customer_id','fk_customer_cusname','fk_loan_id','fk_loan_loanreferenceno', 'billreferenceno', 'fineamount', 'amount', 'dateduepaid', 'dateofpaid','case when date(dateofpaid)>date(dateduepaid) then DATEDIFF(dateofpaid,dateduepaid) else 0 end as diffdays');
        $returnArr['list'] = $this->dbmodel->getGridAll('loan_payment', $params);
        $returnArr['headingname'] = array('fk_loan_loanreferenceno' => 'Document No.', "billreferenceno" => "Bill No.", "amount" => 'Paid Amount', "fineamount" => 'Fine Amount');
        $filenametext = 'Daily_Report_';
        $data['filename'] = $filenametext . date('d-m-y') . '.xls';
        if(!empty($returnArr['list'])){
            $this->excel->streamCustom($data['filename'], $returnArr);
            $data['filename'] = 'export/' . $data['filename'];
            echo json_encode(array('status' => true, 'filename' => $data['filename']));
        } else {
            echo json_encode(array('status' => false, 'msg' =>'No data found'));
        }
    } 

    public function loandetailedreport() {
        if(isset($_GET['fk_loan_id']) && !empty($_GET['fk_loan_id'])){
            $params['filtercustom']["fk_loan_id"] = $_GET['fk_loan_id'];
        }
        if(isset($_GET['fk_customer_id']) && !empty($_GET['fk_customer_id'])){
            $params['filtercustom']["fk_customer_id"] = $_GET['fk_customer_id'];
        }
        if((isset($_GET['fdate']) && !empty($_GET['fdate'])) && (isset($_GET['edate']) && !empty($_GET['edate']))) {
            $data['fdate']=cdatentodb($_GET['fdate']) ;
            $data['edate']=cdatentodb($_GET['edate']) ;
        } else {
            $data['fdate']=date('Y-m-d',strtotime('-10 days'));
            $data['edate']=date('Y-m-d');
            
        }
        $params['filtercustom']["date(requestdate)>='" . $data['fdate'] . "' and date(requestdate)<='" . ($data['edate']) . "' "] = '';
        // pre($params);
        $data['fdate']=cdatedbton($data['fdate']) ;
        $data['edate']=cdatedbton($data['edate']) ;
        $params['sorting']["loan.cdate"] = 'desc';
        $params['select'] = array('fk_customer_id','fk_customer_cusname','fk_employee_id','fk_employee_empname', 'loanreferenceno', 'originalloanamount','commission','\'-\' as document_charge');
        $data['list'] = $this->dbmodel->getGridAll('loan', $params);
        $data['customers'] = Getdropdowns('customer', 'cusname');
        $data['loan'] = Getdropdowns('loan', 'loanreferenceno');
        $data['agent'] = Getdropdowns('employee', 'empname',array('emp_type'=>'agent'));
        $this->load->view('includes/header');
        $this->load->view('reports/loandetailedreport', $data);
        $this->load->view('includes/footer', array('jsfile' => array_merge($this->config->item('jsfile')['datepicker'], $this->config->item('jsfile')['report'])));
    } 

    public function loandetaileddownloadexcel() {
        $this->load->library('excel');
        if(isset($_GET['fk_loan_id']) && !empty($_GET['fk_loan_id'])){
            $params['filtercustom']["fk_loan_id"] = $_GET['fk_loan_id'];
        }
        if(isset($_GET['fk_customer_id']) && !empty($_GET['fk_customer_id'])){
            $params['filtercustom']["fk_customer_id"] = $_GET['fk_customer_id'];
        }
        if((isset($_GET['fdate']) && !empty($_GET['fdate'])) && (isset($_GET['edate']) && !empty($_GET['edate']))) {
            $data['fdate']=cdatentodb($_GET['fdate']) ;
            $data['edate']=cdatentodb($_GET['edate']) ;
        } else {
            $data['fdate']=date('Y-m-d',strtotime('-10 days'));
            $data['edate']=date('Y-m-d');
            
        }
        $params['filtercustom']["date(requestdate)>='" . $data['fdate'] . "' and date(requestdate)<='" . ($data['edate']) . "' "] = '';
        $params['sorting']["loan.cdate"] = 'desc';
        $params['select'] = array('fk_customer_id','fk_customer_cusname','fk_employee_id','fk_employee_empname', 'loanreferenceno', 'originalloanamount','commission','\'-\' as document_charge');
        $returnArr['list'] = $this->dbmodel->getGridAll('loan', $params);
        $returnArr['headingname'] = array('fk_customer_cusname' => 'Customer Name','fk_loan_loanreferenceno' => 'Document No.', "fk_employee_empname" => "Agent", "originalloanamount" => 'Amount', "commission" => 'CO Amount', "document_charge" => 'Document Charge');
        $filenametext = 'Loan_Report_';
        $data['filename'] = $filenametext . date('d-m-y') . '.xls';
        if(!empty($returnArr['list'])){
            $this->excel->streamCustom($data['filename'], $returnArr);
            $data['filename'] = 'export/' . $data['filename'];
            echo json_encode(array('status' => true, 'filename' => $data['filename']));
        } else {
            echo json_encode(array('status' => false, 'msg' =>'No data found'));
        }
    } 

    public function monthlypaymentreport() {
        if(isset($_GET['fk_loan_id']) && !empty($_GET['fk_loan_id'])){
            $params['filtercustom']["fk_loan_id"] = $_GET['fk_loan_id'];
        }
        if(isset($_GET['fk_customer_id']) && !empty($_GET['fk_customer_id'])){
            $params['filtercustom']["fk_customer_id"] = $_GET['fk_customer_id'];
        }
        if((isset($_GET['fdate']) && !empty($_GET['fdate'])) && (isset($_GET['edate']) && !empty($_GET['edate']))) {
            $data['fdate']=cdatentodb($_GET['fdate']) ;
            $data['edate']=cdatentodb($_GET['edate']) ;
        } else {
            $data['fdate']=date('Y-m-01');
            $data['edate']=date('Y-m-d');
        }
        $params['filtercustom']["date(nextduedate)>='" . $data['fdate'] . "' and date(nextduedate)<='" . ($data['edate']) . "' "] = '';
        $params['filtercustom']["loanstatus"] = 'approved';
        $data['fdate']=cdatedbton($data['fdate']) ;
        $data['edate']=cdatedbton($data['edate']) ;
        $params['sorting']["loan.cdate"] = 'desc';
        $params['select'] = array('fk_customer_id','fk_customer_cusname','fk_employee_id','fk_employee_empname', 'loanreferenceno', 'originalloanamount','commission','\'-\' as document_charge');
        $data['list'] = $this->dbmodel->getGridAll('loan', $params);

        $data['customers'] = Getdropdowns('customer', 'cusname');
        $data['loan'] = Getdropdowns('loan', 'loanreferenceno');
        $data['agent'] = Getdropdowns('employee', 'empname',array('emp_type'=>'agent'));
        $this->load->view('includes/header');
        $this->load->view('reports/monthlypaymentreport', $data);
        $this->load->view('includes/footer', array('jsfile' => array_merge($this->config->item('jsfile')['datepicker'], $this->config->item('jsfile')['report'])));
    } 

    public function monthly() {
        $this->load->view('includes/header');
        $this->load->view('reports/monthly');
        $this->load->view('includes/footer', array('jsfile' => array_merge($this->config->item('jsfile')['datepicker'], $this->config->item('jsfile')['report'])));
    }

    public function ajaxMonthlyReport() {
        if (($this->input->server('REQUEST_METHOD') == 'POST')) {
            $this->form_validation->set_rules('monthdate', 'Month Date', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                echo json_encode(array('status' => false, 'msg' => validation_errors()));
                return false;
            } else {
                $monthdate = $this->input->post('monthdate');
                $ts = strtotime($monthdate);
                $total_dates = date('t', $ts) - 1;
                $start_date = date('Y-m-d', strtotime($monthdate));
                $end_date = date('Y-m-d', strtotime("+" . $total_dates . " days", strtotime($start_date)));
                $month_formats = date("M-y", strtotime($monthdate));
                $results = $this->report_model->getMonthlyReport(array('startdate' => $start_date, 'enddate' => $end_date));
                $html = '<div class="table-responsive"><table class="table table-bordered"><thead><tr><th>Trans Date</th>
                    <th>Income</th><th>Expense</th></tr></thead><tbody>';
                foreach ($results as $key => $value) {
                    $html .= '<tr><td>' . $value['transdate'] . '</td><td>' . $value['income'] . '</td><td>' . $value['expense'] . '</td></tr>';
                }

                $html .= '</tbody></table></div>';

                echo json_encode(array('status' => true, 'content' => $html));
                return false;
            }
        }
    }
    
    public function yearly() {
        $this->load->view('includes/header');
        $this->load->view('reports/yearly');
        $this->load->view('includes/footer', array('jsfile' => array_merge($this->config->item('jsfile')['datepicker'], $this->config->item('jsfile')['report'])));
    }
    
    public function ajaxYearlyReport() {
        if (($this->input->server('REQUEST_METHOD') == 'POST')) {
            $this->form_validation->set_rules('year', 'Year', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                echo json_encode(array('status' => false, 'msg' => validation_errors()));
                return false;
            } else {               
                $results = $this->report_model->getYearlyReport(array('year' => $this->input->post('year')));
                $html = '<div class="table-responsive"><table class="table table-bordered"><thead><tr><th>Trans Date</th>
                    <th>Income</th><th>Expense</th></tr></thead><tbody>';
                foreach ($results as $key => $value) {
                    $html .= '<tr><td>' . $value['m'] . '</td><td>' . $value['income'] . '</td><td>' . $value['expense'] . '</td></tr>';
                }

                $html .= '</tbody></table></div>';

                echo json_encode(array('status' => true, 'content' => $html));
                return false;
            }
        }
    }

}
