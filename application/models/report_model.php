<?php

class Report_model extends CI_Model {
    public function getMonthlyPaymentReport($params = array()) {
        $month=(isset($_GET['month'])&& !empty($_GET['month']))? $_GET['month'] :date('Y-m');
        
        $SQL="SELECT cusname,cusmobileno,loanreferenceno, case when financeloanpayment.dateduepaid is null then DATE_FORMAT(nextduedate, '%d/%m/%Y') else DATE_FORMAT(financeloanpayment.dateduepaid, '%d/%m/%Y') end as dateduepaid, case when financeloanpayment.dateduepaid is null then '#ff3b6c' else (case when date(dateofpaid)>date(dateduepaid) then '#FFFF00' else '#fff' end) end as colorcode, case when financeloanpayment.dateofpaid is null then '-' else DATE_FORMAT(financeloanpayment.dateofpaid, '%d/%m/%Y') end as dateofpaid
        FROM financeloan 
        left join financecustomer on financeloan.fk_customer_id=financecustomer.id
        left join financeloanpayment on financeloanpayment.fk_loan_id=financeloan.id and DATE_FORMAT(dateduepaid, '%Y-%m')='".$month."'
        where loanstatus in ('approved','cleared') and (DATE_FORMAT(nextduedate, '%Y-%m')='".$month."' or financeloan.id in (SELECT fk_loan_id FROM financeloanpayment where DATE_FORMAT(dateduepaid, '%Y-%m')='".$month."'))";
        
        if(isset($_GET['fk_loan_id']) && !empty($_GET['fk_loan_id'])){
            $SQL.= " and financeloan.id=".$_GET['fk_loan_id']." ";
        }
        if(isset($_GET['fk_customer_id']) && !empty($_GET['fk_customer_id'])){
            $SQL.= " and financecustomer.id=".$_GET['fk_customer_id']." ";
        }
        $result=array();
        $query = $this->db->query($SQL);
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }
    public function getMonthlyReport($params = array()) {
        $result=array();
        $this->db->select("DATE(transdate) as transdate, SUM(CASE WHEN acctype = 'income' THEN transamount ELSE 0 END) income, SUM(CASE WHEN acctype = 'expense' THEN transamount ELSE 0 END) expense", FALSE);
        $this->db->from('financeoveralltransaction');
        $this->db->where('DATE(transdate) >=', $params['startdate']);
        $this->db->where('DATE(transdate) <=', $params['enddate']);
        $this->db->group_by('DATE(transdate)');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }

    public function getYearlyReport($params = array()) {
        $result=array();
        $this->db->select("MONTHNAME(transdate) as m, SUM(CASE WHEN acctype = 'income' THEN transamount ELSE 0 END) income, SUM(CASE WHEN acctype = 'expense' THEN transamount ELSE 0 END) expense", FALSE);
        $this->db->from('financeoveralltransaction');
        $this->db->where('YEAR(transdate)', $params['year']);
        $this->db->group_by('m');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }

}
