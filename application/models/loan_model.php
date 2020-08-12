<?php

class Loan_model extends CI_Model {

    public function getLoan($params = array()) {
        $this->db->select('l.*,c.cusname,v.vechilenumber,v.vechilename,v.vechilemodelyear,v.vechilemanufectureyear,v.vechilechessisno,v.vechileinsurenceno,v.vechileinsurensestartdate,v.vechileinsurenseduedate,'
                . 'v.vechileenginetype,v.rcdocument,v.insurencedocument,v.ischessed,v.chesseddate,v.chessedagainstloanid');
        $this->db->from('loan as l');
        $this->db->join('vechicle AS v', 'v.id = l.fk_vechicle_id');
        $this->db->join('customer AS c', 'l.fk_customer_id = c.id');
        $this->db->where('l.dels', '0');
        if (isset($params['id']) && !empty($params['id'])) {
            $this->db->where('md5(l.id)', $params['id']);
        }
        $this->db->order_by('l.requestdate');
        $query = $this->db->get();        
        return $result = $query->result();
    }

}
