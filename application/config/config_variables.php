<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



$config['loanstatus'] = array(
    'pending' => '1', //Pending
    'approved' => '2', //Approved
    'refused' => '3', //Refused
    'abandoned' => '4', //Abandoned
    'cleared' => '5', //Cleared
);
$config['settingshortname'] = array(
    'SET_MSB' => '1', //Minimum Savings Balance
    'SET_MLP' => '2', //Minimum Loan Principal
    'SET_XLP' => '3', //Maximum Loan Principal
    'SET_CUR' => '4', //Currency Abbreviation
    'SET_AUF' => '5', //Auto-fine Defaulters
    'SET_DEA' => '6', //Account Deactivation
    'SET_DBL' => '7', //Dashboard Left
    'SET_DBR' => '8', //Dashboard Right
    'SET_ICL' => '9', //Interest Calculation
    'SET_GUA' => '10', //Guarantor Limit
    'SET_MEM' => '11', //Minimum Membership
    'SET_PSR' => '12', //Maximum Principal-Savings Ratio
    'SET_CNO' => '13', //Customer Number Format
    'SET_ENO' => '14', //Employee Number Format
    'SET_XL1' => '15', //Additional Field Loans
    'SET_SFX' => '16', //Fixed Savings
    'SET_CSI' => '17', //Customer Search by ID
    'SET_F4F' => '18', //Use Fixed Deposits for Fine
);

$config['gender'] = array('male' => 'Male', 'female' => 'Female', 'others' => 'Others');
$config['jsfile'] = array(
    'datatable' => array('assets/admin/js/datatable/jquery.dataTables.min.js', 'assets/admin/js/datatable/DT_bootstrap.js'),
    'datepicker' => array('assets/admin/js/datepicker/bootstrap-datepicker.js'),
    'validation' => array('assets/admin/js/lib/jquery.validate.js'),
    'usergroups' => array('assets/admin/js/usergroups.js'),
    'users' => array('assets/admin/js/users.js'),
    'tax' => array('assets/admin/js/tax.js'),
    'employee' => array('assets/admin/js/employee.js'));
