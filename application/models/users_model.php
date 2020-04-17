<?php

class Users_model extends CI_Model {

    function __construct() {
        parent::__construct();

        date_default_timezone_set('America/New_York');
        $this->load->helper('url');
        $this->load->library('table', 'session');
        $this->load->database();
    }


}
