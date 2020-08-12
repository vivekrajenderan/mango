<?php

class Report_model extends CI_Model {
    public function getMonthlyPaymentReport($params = array()) {
        $month=(isset($_GET['month'])&& !empty($_GET['month']))? $_GET['month'] :date('Y-m');
        
        $SQL="SELECT financeloan.id,cusname,cusmobileno,loanreferenceno,financevechicle.vechilenumber, case when financeloanpayment.dateduepaid is null then DATE_FORMAT(nextduedate, '%d/%m/%Y') else DATE_FORMAT(financeloanpayment.dateduepaid, '%d/%m/%Y') end as dateduepaid, case when financeloanpayment.dateduepaid is null then (case when (nextduedate<CURRENT_DATE)  then  (case when loanstatus='cleared' then '#fff' else '#ff0000' end) else '#FFFF00' end) else (case when date(dateofpaid)>date(dateduepaid) then '#ff3b6c' else '#fff' end) end as colorcode, case when financeloanpayment.dateofpaid is null then '-' else DATE_FORMAT(financeloanpayment.dateofpaid, '%d/%m/%Y') end as dateofpaid
        FROM financeloan 
        left join financevechicle on financeloan.fk_vechicle_id=financevechicle.id
        left join financecustomer on financeloan.fk_customer_id=financecustomer.id
        left join financeloanpayment on financeloanpayment.fk_loan_id=financeloan.id and DATE_FORMAT(dateduepaid, '%Y-%m')='".$month."'
        where loanstatus in ('approved','cleared') and (DATE_FORMAT(nextduedate, '%Y-%m')<='".$month."' or financeloan.id in (SELECT fk_loan_id FROM financeloanpayment where DATE_FORMAT(dateduepaid, '%Y-%m')='".$month."'))";
        
        if(isset($_GET['fk_loan_id']) && !empty($_GET['fk_loan_id'])){
            $SQL.= " and financeloan.id=".$_GET['fk_loan_id']." ";
        }
        if(isset($_GET['fk_customer_id']) && !empty($_GET['fk_customer_id'])){
            $SQL.= " and financecustomer.id=".$_GET['fk_customer_id']." ";
        }
        if(isset($_GET['payment_status']) && !empty($_GET['payment_status'])){
            $SQL.= " and (case when financeloanpayment.dateduepaid is null then (case when (nextduedate<CURRENT_DATE) and  loanstatus!=\'cleared\' then 3 else 1 end) else (case when date(dateofpaid)>date(dateduepaid) then 2 else 4 end) end)=".$_GET['payment_status']." ";
        }
        $result=array();
        $query = $this->db->query($SQL);
        if ($query->num_rows() > 0) {
            $result = array();
            foreach ($query->result() as $row) {
                if (isset($row->id))
                    $row->ecodeid = md5($row->id);
                $result[] = $row;
            }
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
    public function getPendingPaymentReport($params = array()) {
        $SQL="SELECT financeloan.id,cusname,cusmobileno,loanreferenceno,financevechicle.vechilenumber, financecustomer.regioncolor, DATE_FORMAT(financeloan.nextduedate, '%d/%m/%Y') as nextduedate, TIMESTAMPDIFF(MONTH, nextduedate, CURRENT_DATE) as differencemonth FROM 
        financeloan 
                left join financevechicle on financeloan.fk_vechicle_id=financevechicle.id
                left join financecustomer on financeloan.fk_customer_id=financecustomer.id
          where financeloan.dels='0' and financeloan.status='1' and financeloan.nextduedate<CURRENT_DATE and financeloan.loanstatus='approved'";
        
        if(isset($_GET['fk_loan_id']) && !empty($_GET['fk_loan_id'])){
            $SQL.= " and financeloan.id=".$_GET['fk_loan_id']." ";
        }
        if(isset($_GET['regioncolor']) && !empty($_GET['regioncolor'])){
            $SQL.= " and financecustomer.regioncolor='".$_GET['regioncolor']."' ";
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
}
