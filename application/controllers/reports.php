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
        $params['filtercustom']["date(transdate)='" . date('Y-m-d') . "'"] = '';
        $params['select'] = array('id', 'status', 'acctype', 'transdate', 'transamount', 'refno', 'transtext');
        $data['list'] = $this->dbmodel->getGridAll('overalltransaction', $params);
        $this->load->view('includes/header');
        $this->load->view('reports/daily', $data);
        $this->load->view('includes/footer');
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
