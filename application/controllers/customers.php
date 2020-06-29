<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customers extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('dbmodel'));
        if ($this->session->userdata('log_id') == "") {
            redirect(base_url() . 'login/', 'refresh');
        }
    }

    public function index() {
        //$params['filtercustom']["empout > " . time() . " OR empout IS NULL"] = '';
        $params['select'] = array('id', 'status', 'cusreferenceno', 'cusname', 'cusmobileno', 'cusemail');
        $data['list'] = $this->dbmodel->getGridAll('customer', $params);
        $this->load->view('includes/header');
        $this->load->view('customer/list', $data);
        $this->load->view('includes/footer', array('jsfile' => array_merge($this->config->item('jsfile')['datatable'], $this->config->item('jsfile')['validation'], $this->config->item('jsfile')['customer'])));
    }

    public function add($id = NULL) {
        $data['list'] = array();
        if (!empty($id)) {
            $condition_array['md5(id)'] = $id;
            $data_list = $this->dbmodel->getAll('customer', $condition_array);
            if (count($data_list) > 0) {
                $data_list[0]->cusdob = cdatedbton($data_list[0]->cusdob);
                $data['list'] = $data_list[0];
            } else {
                
            }
        }
        $data['genderlist'] = $this->config->item('gender');        
        $this->load->view('includes/header');
        $this->load->view('customer/add', $data);
        $this->load->view('includes/footer', array('jsfile' => array_merge($this->config->item('jsfile')['datatable'], $this->config->item('jsfile')['validation'], $this->config->item('jsfile')['datepicker'], $this->config->item('jsfile')['customer'])));
    }

    public function save() {
        if (($this->input->server('REQUEST_METHOD') == 'POST')) {           
            $this->form_validation->set_rules('cusname', 'Customer Name', 'trim|required');
            $this->form_validation->set_rules('cussex', 'Gender', 'trim|required');
            $this->form_validation->set_rules('cusdob', 'D.O.B', 'trim|required');
            $this->form_validation->set_rules('pan', 'PAN No', 'trim|required');
            $this->form_validation->set_rules('aadhar', 'Aadhar No', 'trim|required');
            $this->form_validation->set_rules('cusaddress', 'Address', 'trim|required');
            $this->form_validation->set_rules('cusmobileno', 'Mobile No', 'trim|required|min_length[10]|max_length[10]|xss_clean|callback_uniquemobileno');
            $this->form_validation->set_rules('accountno', 'Account No', 'trim|required|min_length[5]|max_length[30]|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                echo json_encode(array('status' => 0, 'msg' => validation_errors()));
                return false;
            } else {
                $customerlist = array();
                if (isset($_POST['cust_id']) && !empty($_POST['cust_id'])) {
                    $customerlist = $this->dbmodel->getAll('customer', array('id' => $_POST['cust_id']));
                }
                // Profile 
                if (isset($_FILES['profile']['name']) && (!empty($_FILES['profile']['name']))) {
                    $upload_image = do_upload_image('profile', UPLOADPATH . 'profile/');
                    if ($upload_image['image_message'] == "success") {
                        if (isset($customerlist[0]->profile) && !empty($customerlist[0]->profile)) {
                            $image_file = './assets/upload/profile/' . $customerlist[0]->profile;
                            if (file_exists($image_file)) {
                                unlink($image_file);
                            }
                        }
                        $profile_file_name = trim($upload_image['image_file_name']);
                    } else {
                        echo json_encode(array('status' => 0, 'msg' => "<p>Please upload only image</p>"));
                        return false;
                    }
                } else {
                    $profile_file_name = (isset($customerlist[0]->profile) && !empty($customerlist[0]->profile)) ? $customerlist[0]->profile : "";
                }
                
                //Aadhar document
                if (isset($_FILES['aadhardocument']['name']) && (!empty($_FILES['aadhardocument']['name']))) {
                    $upload_image = do_upload_image('aadhardocument', UPLOADPATH . 'document/');
                    if ($upload_image['image_message'] == "success") {
                        if (isset($customerlist[0]->aadhardocument) && !empty($customerlist[0]->aadhardocument)) {
                            $image_file = './assets/upload/document/' . $customerlist[0]->aadhardocument;
                            if (file_exists($image_file)) {
                                unlink($image_file);
                            }
                        }
                        $file_name = trim($upload_image['image_file_name']);
                    } else {
                        echo json_encode(array('status' => 0, 'msg' => "<p>Please upload only image</p>"));
                        return false;
                    }
                } else {
                    $file_name = (isset($customerlist[0]->aadhardocument) && !empty($customerlist[0]->aadhardocument)) ? $customerlist[0]->aadhardocument : "";
                }
                $setdata = array('cusname' => (isset($_POST['cusname']) && !empty($_POST['cusname'])) ? trim($_POST['cusname']) : "",
                    'cussex' => (isset($_POST['cussex']) && !empty($_POST['cussex'])) ? trim($_POST['cussex']) : "",
                    'cusdob' => (isset($_POST['cusdob']) && !empty($_POST['cusdob'])) ? cdatentodb($_POST['cusdob']) : "",                    
                    'occup' => (isset($_POST['occup']) && !empty($_POST['occup'])) ? trim($_POST['occup']) : "",
                    'pan' => (isset($_POST['pan']) && !empty($_POST['pan'])) ? trim($_POST['pan']) : "",
                    'aadhar' => (isset($_POST['aadhar']) && !empty($_POST['aadhar'])) ? trim($_POST['aadhar']) : "",
                    'cusmobileno' => (isset($_POST['cusmobileno']) && !empty($_POST['cusmobileno'])) ? trim($_POST['cusmobileno']) : "",
                    'cusemail' => (isset($_POST['cusemail']) && !empty($_POST['cusemail'])) ? trim($_POST['cusemail']) : "",
                    'cusaddress' => (isset($_POST['cusaddress']) && !empty($_POST['cusaddress'])) ? trim($_POST['cusaddress']) : "",
                    'accountno' => (isset($_POST['accountno']) && !empty($_POST['accountno'])) ? trim($_POST['accountno']) : "",
                    'drivinglicence' => (isset($_POST['drivinglicence']) && !empty($_POST['drivinglicence'])) ? trim($_POST['drivinglicence']) : "",
                    'aadhardocument' => trim($file_name),
                    'profile' => trim($profile_file_name),
                    'updatedby' => $this->session->userdata('log_id')
                );
                $saved = "";
                if (isset($_POST['cust_id']) && !empty($_POST['cust_id'])) {
                    $saved = $this->dbmodel->update('customer', $setdata, array('id' => $_POST['cust_id']));
                } else {
                    $setdata['cusreferenceno'] = getRefId(array('doctype' => 'customer'));                    
                    $saved = $this->dbmodel->insert('customer', $setdata);
                }
                if ($saved) {
                    $this->session->set_flashdata('SucMessage', ucfirst($this->input->post('cusname')) . ' Customer saved Successfully');
                    echo json_encode(array('status' => true, 'msg' => ucfirst($this->input->post('cusname')) . ' Customer saved Successfully'));
                } else {
                    echo json_encode(array('status' => false, 'msg' => 'Customer Saved Not Successfully'));
                }
            }
        }
    }

    public function uniquemobileno() {
        $this->form_validation->set_message('uniquemobileno', 'This Mobile No already exist please choose different one');
        $condition_arr['cusmobileno'] = $_POST['cusmobileno'];
        $not_condition = array();
        if (isset($_POST['cust_id']))
            $not_condition["id"] = array('id' => $_POST['cust_id']);
        return !$this->dbmodel->rowCheck('customer', $condition_arr, $not_condition);
    }

    public function view() {
        $loadhtml = "";
        if (isset($_POST['custid']) && !empty($_POST['custid'])) {
            $condition_array['md5(id)'] = $_POST['custid'];
            $data_list = $this->dbmodel->getAll('customer', $condition_array);
            if (count($data_list) > 0) {                
                $data_list[0]->cusdob = cdatedbton($data_list[0]->cusdob);
                $data['list'] = $data_list[0];
                $loadhtml = $this->load->view('customer/view', $data, true);
            }
        }
        echo json_encode(array('status' => true, 'viewhtml' => $loadhtml));
    }

    public function delete($id) {
        if (!empty($id)) {
            $condition_array['md5(id)'] = $id;
            $data_list = $this->dbmodel->getAll('customer', $condition_array);
            if (count($data_list) > 0) {
                $this->dbmodel->update('customer', array('dels' => '1'), array('id' => $data_list[0]->id));
                $this->session->set_flashdata('SucMessage', 'Customer has been deleted successfully!!!');
            } else {
                $this->session->set_flashdata('ErrorMessages', 'Customer has not been deleted successfully!!!');
            }
        }
        redirect(base_url() . 'customers');
    }

    public function changestatus() {
        if (isset($_POST['custid']) && !empty($_POST['custid'])) {
            $condition_array['md5(id)'] = $_POST['custid'];
            $data_list = $this->dbmodel->getAll('customer', $condition_array);
            if (count($data_list) > 0) {
                $this->dbmodel->update('customer', array('status' => (isset($_POST['status']) && !empty($_POST['status'])) ? '0' : '1'), array('id' => $data_list[0]->id));
                echo json_encode(array('status' => true, 'msg' => (isset($_POST['status']) && !empty($_POST['status'])) ? 'Customer Inactive Successfully' : 'Customer Active Successfully'));
            } else {
                echo json_encode(array('status' => false, 'msg' => (isset($_POST['status']) && !empty($_POST['status'])) ? 'Customer Inactive not Successfully' : 'Customer Active not Successfully'));
            }
        }
    }

    public function deletepopup() {
        $loadhtml = "";
        if (isset($_POST['custid']) && !empty($_POST['custid'])) {
            $condition_array['md5(id)'] = $_POST['custid'];
            $data_list = $this->dbmodel->getAll('customer', $condition_array);
            if (count($data_list) > 0) {
                $data['list'] = $data_list[0];
                $loadhtml = $this->load->view('customer/delete', $data, true);
            }
        }
        echo json_encode(array('status' => true, 'viewhtml' => $loadhtml));
    }

    public function downloadexcel() {
        $this->load->library('excel');
        $returnArr = array();
        $params['select'] = array('id', 'status', 'cusreferenceno', 'cusname', 'cusdob', 'cussex', 'occup', 'aadhar', 'cusaddress', 'cusmobileno', 'cusemail', 'accountno', 'pan','drivinglicence');
        $customerlist = $this->dbmodel->getGridAll('customer', $params);
        $returnArr['list'] = $customerlist;
        $returnArr['headingname'] = array('cusreferenceno' => 'Customer No', "cusname" => 'Customer Name', 'cusdob' => 'D.O.B', 'cussex' => 'Gender', 'occup' => 'Occupation','aadhar'=>'Aadhar','cusaddress'=>'Address','cusmobileno'=>'Phone','cusemail'=>'Email','accountno'=>'Account No','pan'=>'PAN NO','drivinglicence'=>'Driving License');
        $filenametext = 'Customer_Report_';
        $data['filename'] = $filenametext . date('d-m-y') . '.xls';
        $this->excel->streamCustom($data['filename'], $returnArr);
        $data['filename'] = 'export/' . $data['filename'];
        echo json_encode(array('status' => true, 'filename' => $data['filename']));
    }

}
