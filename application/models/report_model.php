<?php

class Report_model extends CI_Model {

    public function getMonthlyReport($params = array()) {
        $result=array();
        $this->db->select("DATE(transdate) as transdate, SUM(CASE WHEN acctype = 'income' THEN transamount ELSE 0 END) income, SUM(CASE WHEN acctype = 'expense' THEN transamount ELSE 0 END) expense", FALSE);
        $this->db->from('financeoveralltransaction');
        $this->db->where('transdate >=', $params['startdate']);
        $this->db->where('transdate <=', $params['enddate']);
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
