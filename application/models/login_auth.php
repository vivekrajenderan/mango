<?php

class Login_auth extends CI_Model {

    function __construct() {
        parent::__construct();

        date_default_timezone_set('America/New_York');
        $this->load->helper('url');
        $this->load->library('table', 'session');
        $this->load->database();
    }

    function login_verify($username, $password) {
        $row = array();

        $this->db->select('u.*,ug.groupname,ug.padmin,ug.pdelete,ug.preport');
        $this->db->from('users as u');
        $this->db->join('usergroups ug', 'ug.id = u.fk_usergroups_id');
        $this->db->where('username', $username);
        $this->db->where('password', AES_Encode($password));
        $query = $this->db->get();

        if ($query->num_rows > 0) {
            $row = $query->result_array();
            $session_data = array(
                'log_id' => $row[0]['id'],
                'log_user' => $row[0]['username'],
                'log_ugroup' => $row[0]['groupname'],
                'log_admin' => $row[0]['padmin'],
                'log_delete' => $row[0]['pdelete'],
                'log_report' => $row[0]['preport'],
                'log_time' => time()
            );
            $this->session->set_userdata($session_data);            
        } 
        return $row;
    }

    public function adduser($data) {

        $this->db->insert('users', $data);
        if ($this->db->affected_rows() >= 0) {
            return 1;
        } else {
            return 0;
        }
    }

}
