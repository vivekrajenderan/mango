<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Agent extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('dbmodel'));
        if ($this->session->userdata('log_id') == "") {
            redirect(base_url() . 'login/', 'refresh');
        }
    }

    public function index() {
        $params['filtercustom']['emp_type']='agent';
        $params['select'] = array('id', 'status', 'empno', 'empname', 'dob', 'emplsex', 'position', 'salary', 'address', 'phone', 'email', 'empin', 'empout', 'fk_maritalstatus_id', 'fk_maritalstatus_statusname');
        $data['list'] = $this->dbmodel->getGridAll('employee', $params);
        $this->load->view('includes/header');
        $this->load->view('agent/list', $data);
        $this->load->view('includes/footer', array('jsfile' => array_merge($this->config->item('jsfile')['datatable'], $this->config->item('jsfile')['validation'], $this->config->item('jsfile')['agent'])));
    }

    public function add($id = NULL) {
        $data['list'] = array();
        if (!empty($id)) {
            $condition_array['md5(id)'] = $id;
            $condition_array['emp_type']='agent';
            $data_list = $this->dbmodel->getAll('employee', $condition_array);
            if (count($data_list) > 0) {
                $data_list[0]->dob = cdatedbton($data_list[0]->dob);
                $data['list'] = $data_list[0];
            } else {
                
            }
        }
        $data['genderlist'] = $this->config->item('gender');
        $data['maritalstatus'] = Getdropdowns('maritalstatus', 'statusname');
        $this->load->view('includes/header');
        $this->load->view('agent/add', $data);
        $this->load->view('includes/footer', array('jsfile' => array_merge($this->config->item('jsfile')['datatable'], $this->config->item('jsfile')['validation'], $this->config->item('jsfile')['datepicker'], $this->config->item('jsfile')['agent'])));
    }

    public function save() {
        if (($this->input->server('REQUEST_METHOD') == 'POST')) {
            $this->form_validation->set_rules('empname', 'Agent Name', 'trim|required');
            $this->form_validation->set_rules('emplsex', 'Gender', 'trim|required');
            $this->form_validation->set_rules('dob', 'D.O.B', 'trim|required');
            $this->form_validation->set_rules('address', 'Address', 'trim|required');
            $this->form_validation->set_rules('phone', 'Mobile No', 'trim|required|min_length[10]|max_length[10]|xss_clean|callback_uniquemobileno');
            if ($this->form_validation->run() == FALSE) {
                echo json_encode(array('status' => 0, 'msg' => validation_errors()));
                return false;
            } else {
                $employeelist = array();
                if (isset($_POST['emp_id']) && !empty($_POST['emp_id'])) {
                    $employeelist = $this->dbmodel->getAll('employee', array('id' => $_POST['emp_id']));
                }
                if (isset($_FILES['profileimage']['name']) && (!empty($_FILES['profileimage']['name']))) {
                    $upload_image = do_upload_image('profileimage', UPLOADPATH . 'profile/');
                    if ($upload_image['image_message'] == "success") {
                        if (isset($employeelist[0]->profileimage) && !empty($employeelist[0]->profileimage)) {
                            $image_file = './assets/upload/profile/' . $employeelist[0]->profileimage;
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
                    $file_name = (isset($employeelist[0]->profileimage) && !empty($employeelist[0]->profileimage)) ? $employeelist[0]->profileimage : "";
                }
                $setdata = array(
                    'empname' => (isset($_POST['empname']) && !empty($_POST['empname'])) ? trim($_POST['empname']) : "",
                    'emp_type' => 'agent',
                    'emplsex' => (isset($_POST['emplsex']) && !empty($_POST['emplsex'])) ? trim($_POST['emplsex']) : "",
                    'dob' => (isset($_POST['dob']) && !empty($_POST['dob'])) ? cdatentodb($_POST['dob']) : "",
                    'fk_maritalstatus_id' => (isset($_POST['fk_maritalstatus_id']) && !empty($_POST['fk_maritalstatus_id'])) ? trim($_POST['fk_maritalstatus_id']) : 0,
                    'position' => (isset($_POST['position']) && !empty($_POST['position'])) ? trim($_POST['position']) : "",
                    'salary' => (isset($_POST['salary']) && !empty($_POST['salary'])) ? trim($_POST['salary']) : "",
                    'phone' => (isset($_POST['phone']) && !empty($_POST['phone'])) ? trim($_POST['phone']) : "",
                    'email' => (isset($_POST['email']) && !empty($_POST['email'])) ? trim($_POST['email']) : "",
                    'address' => (isset($_POST['address']) && !empty($_POST['address'])) ? trim($_POST['address']) : "",
                    'profileimage' => trim($file_name),
                    'fk_users_id' => $this->session->userdata('log_id')
                );
                $saved = "";
                if (isset($_POST['emp_id']) && !empty($_POST['emp_id'])) {
                    $saved = $this->dbmodel->update('employee', $setdata, array('id' => $_POST['emp_id']));
                } else {
                    $setdata['empno'] = getRefId(array('doctype' => 'agent'));
                    $setdata['empin'] = date('Y-m-d H:i:s');
                    $saved = $this->dbmodel->insert('employee', $setdata);
                }
                if ($saved) {
                    $this->session->set_flashdata('SucMessage', ucfirst($this->input->post('empname')) . ' Agent saved Successfully');
                    echo json_encode(array('status' => true, 'msg' => ucfirst($this->input->post('empname')) . ' Agent saved Successfully'));
                } else {
                    echo json_encode(array('status' => false, 'msg' => 'Agent Saved Not Successfully'));
                }
            }
        }
    }

    public function uniquemobileno() {
        $this->form_validation->set_message('uniquemobileno', 'This Mobile No already exist please choose different one');
        $condition_arr['phone'] = $_POST['phone'];
        $not_condition = array();
        if (isset($_POST['emp_id']))
            $not_condition["id"] = array('id' => $_POST['emp_id']);
        return !$this->dbmodel->rowCheck('employee', $condition_arr, $not_condition);
    }

    public function view() {
        $loadhtml = "";
        if (isset($_POST['empid']) && !empty($_POST['empid'])) {
            $condition_array['md5(id)'] = $_POST['empid'];
            $data_list = $this->dbmodel->getAll('employee', $condition_array);
            if (count($data_list) > 0) {
                $data_list[0]->maritalstatus = getFeild('statusname', 'maritalstatus', 'id', $data_list[0]->fk_maritalstatus_id);
                $data_list[0]->dob = cdatedbton($data_list[0]->dob);
                $data['list'] = $data_list[0];
                $loadhtml = $this->load->view('agent/view', $data, true);
            }
        }
        echo json_encode(array('status' => true, 'viewhtml' => $loadhtml));
    }

    public function delete($id) {
        if (!empty($id)) {
            $condition_array['md5(id)'] = $id;
            $condition_array['emp_type']='agent';
            $data_list = $this->dbmodel->getAll('employee', $condition_array);
            if (count($data_list) > 0) {
                $this->dbmodel->update('employee', array('dels' => '1'), array('id' => $data_list[0]->id));
                $this->session->set_flashdata('SucMessage', 'Agent has been deleted successfully!!!');
            } else {
                $this->session->set_flashdata('ErrorMessages', 'Agent has not been deleted successfully!!!');
            }
        }
        redirect(base_url() . 'agent');
    }

    public function changestatus() {
        if (isset($_POST['empid']) && !empty($_POST['empid'])) {
            $condition_array['md5(id)'] = $_POST['empid'];
            $data_list = $this->dbmodel->getAll('employee', $condition_array);
            if (count($data_list) > 0) {
                $this->dbmodel->update('employee', array('status' => (isset($_POST['status']) && !empty($_POST['status'])) ? '0' : '1'), array('id' => $data_list[0]->id));
                echo json_encode(array('status' => true, 'msg' => (isset($_POST['status']) && !empty($_POST['status'])) ? 'Agent Inactive Successfully' : 'Agent Active Successfully'));
            } else {
                echo json_encode(array('status' => false, 'msg' => (isset($_POST['status']) && !empty($_POST['status'])) ? 'Agent Inactive not Successfully' : 'Agent Active not Successfully'));
            }
        }
    }

    public function deletepopup() {
        $loadhtml = "";
        if (isset($_POST['empid']) && !empty($_POST['empid'])) {
            $condition_array['md5(id)'] = $_POST['empid'];
            $data_list = $this->dbmodel->getAll('employee', $condition_array);
            if (count($data_list) > 0) {
                $data['list'] = $data_list[0];
                $loadhtml = $this->load->view('agent/delete', $data, true);
            }
        }
        echo json_encode(array('status' => true, 'viewhtml' => $loadhtml));
    }

    public function downloadexcel() {
        $this->load->library('excel');
        $returnArr = array();
        $params['select'] = array('id', 'status', 'empno', 'empname', 'dob', 'emplsex', 'salary', 'address', 'phone', 'email');
        $params['filtercustom']['emp_type']='agent';
        $employeelist = $this->dbmodel->getGridAll('employee', $params);
        $returnArr['list'] = $employeelist;
        $returnArr['headingname'] = array('empno' => 'Agent No', "empname" => 'Agent Name', 'dob' => 'D.O.B', 'emplsex' => 'Gender','salary'=>'Commission','address'=>'Address','phone'=>'Phone','email'=>'Email');
        $filenametext = 'Agent_Report_';
        $data['filename'] = $filenametext . date('d-m-y') . '.xls';
        if(!empty($returnArr['list'])){
            $this->excel->streamCustom($data['filename'], $returnArr);
            $data['filename'] = 'export/' . $data['filename'];
            echo json_encode(array('status' => true, 'filename' => $data['filename']));
        } else {
            echo json_encode(array('status' => false, 'msg' =>'No data found'));
        }
        
    }

}
