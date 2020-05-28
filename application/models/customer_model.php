<?php

class Customer_model extends CI_Model {

    public function getCustomerOverdue($params = array()) {
        $result = array();
        $last_subscr = time() - convertDays(365);
        $this->db->select('c.*');
        $this->db->from('customer c');
        $this->db->where('c.status', 1);
        $where = "c.mdate < " . $last_subscr;
        $this->db->where($where);
        $this->db->order_by('c.mdate, c.id');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }

    public function getLtransOverdue($params = array()) {
        $result = array();
        $timestamp = time();
        $this->db->select('lt.*,ls.loan_no,c.cust_name');
        $this->db->from('ltrans as lt');
        $this->db->join('loans AS ls', 'lt.fk_loans_id = ls.id');
        $this->db->join('customer AS c', 'ls.fk_customer_id = c.id');
        $this->db->where('c.cust_active', 1);
        $where = "lt.ltrans_due <= $timestamp AND lt.ltrans_date IS NULL AND fk_loanstatus_id = " . $this->config->item('loanstatus')['approved'];
        $this->db->where($where);
        $this->db->order_by('lt.ltrans_due');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }

}
