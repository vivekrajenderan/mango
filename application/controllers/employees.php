<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employees extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('dbmodel'));
        if ($this->session->userdata('log_id') == "") {
            redirect(base_url() . 'login/', 'refresh');
        }
    }

    public function index() {
        //$params['filtercustom']["empl_out > " . time() . " OR empl_out IS NULL"] = '';
        $params['select'] = array('id', 'status', 'empl_no', 'empl_name', 'empl_dob', 'emplsex', 'empl_position', 'empl_salary', 'empl_address', 'empl_phone', 'empl_email', 'empl_in', 'empl_out', 'fk_employeestatus_id', 'fk_employeestatus_statusname');
        $data['list'] = $this->dbmodel->getGridAll('employee', $params);
        $this->load->view('includes/header');
        $this->load->view('employee/list', $data);
        $this->load->view('includes/footer', array('jsfile' => array_merge($this->config->item('jsfile')['datatable'], $this->config->item('jsfile')['validation'], $this->config->item('jsfile')['employee'])));
    }

    public function add($id = NULL) {
        $data['list'] = array();
        if (!empty($id)) {
            $condition_array['md5(id)'] = $id;
            $data_list = $this->dbmodel->getAll('employee', $condition_array);
            if (count($data_list) > 0) {
                $data_list[0]->empl_dob = cdatedbton($data_list[0]->empl_dob);
                $data['list'] = $data_list[0];
            } else {
                
            }
        }
        $data['genderlist'] = $this->config->item('gender');
        $data['maritalstatus'] = Getdropdowns('employeestatus', 'statusname');
        $this->load->view('includes/header');
        $this->load->view('employee/add', $data);
        $this->load->view('includes/footer', array('jsfile' => array_merge($this->config->item('jsfile')['datatable'], $this->config->item('jsfile')['validation'], $this->config->item('jsfile')['datepicker'], $this->config->item('jsfile')['employee'])));
    }

    public function save() {
        if (($this->input->server('REQUEST_METHOD') == 'POST')) {
            $this->form_validation->set_rules('empl_name', 'Employee Name', 'trim|required');
            $this->form_validation->set_rules('emplsex', 'Gender', 'trim|required');
            $this->form_validation->set_rules('empl_dob', 'D.O.B', 'trim|required');
            $this->form_validation->set_rules('fk_employeestatus_id', 'Marital Status', 'trim|required');
            $this->form_validation->set_rules('empl_address', 'Address', 'trim|required');
            $this->form_validation->set_rules('empl_phone', 'Mobile No', 'trim|required|min_length[10]|max_length[10]|xss_clean|callback_uniquemobileno');
            if ($this->form_validation->run() == FALSE) {
                echo json_encode(array('status' => 0, 'msg' => validation_errors()));
                return false;
            } else {
                $employeelist = array();
                if (isset($_POST['emp_id']) && !empty($_POST['emp_id'])) {
                    $employeelist = $this->dbmodel->getAll('employee', array('id' => $_POST['emp_id']));
                }
                if (isset($_FILES['empl_pic']['name']) && (!empty($_FILES['empl_pic']['name']))) {
                    $upload_image = do_upload_image('empl_pic', UPLOADPATH . 'profile/');
                    if ($upload_image['image_message'] == "success") {
                        if (isset($employeelist[0]->empl_pic) && !empty($employeelist[0]->empl_pic)) {
                            $image_file = './assets/upload/profile/' . $employeelist[0]->empl_pic;
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
                    $file_name = (isset($employeelist[0]->empl_pic) && !empty($employeelist[0]->empl_pic)) ? $employeelist[0]->empl_pic : "";
                }
                $setdata = array('empl_name' => (isset($_POST['empl_name']) && !empty($_POST['empl_name'])) ? trim($_POST['empl_name']) : "",
                    'emplsex' => (isset($_POST['emplsex']) && !empty($_POST['emplsex'])) ? trim($_POST['emplsex']) : "",
                    'empl_dob' => (isset($_POST['empl_dob']) && !empty($_POST['empl_dob'])) ? cdatentodb($_POST['empl_dob']) : "",
                    'fk_employeestatus_id' => (isset($_POST['fk_employeestatus_id']) && !empty($_POST['fk_employeestatus_id'])) ? trim($_POST['fk_employeestatus_id']) : "",
                    'empl_position' => (isset($_POST['empl_position']) && !empty($_POST['empl_position'])) ? trim($_POST['empl_position']) : "",
                    'empl_salary' => (isset($_POST['empl_salary']) && !empty($_POST['empl_salary'])) ? trim($_POST['empl_salary']) : "",
                    'empl_phone' => (isset($_POST['empl_phone']) && !empty($_POST['empl_phone'])) ? trim($_POST['empl_phone']) : "",
                    'empl_email' => (isset($_POST['empl_email']) && !empty($_POST['empl_email'])) ? trim($_POST['empl_email']) : "",
                    'empl_address' => (isset($_POST['empl_address']) && !empty($_POST['empl_address'])) ? trim($_POST['empl_address']) : "",
                    'empl_pic' => trim($file_name),
                    'fk_users_id' => $this->session->userdata('log_id')
                );
                $saved = "";
                if (isset($_POST['emp_id']) && !empty($_POST['emp_id'])) {
                    $saved = $this->dbmodel->update('employee', $setdata, array('id' => $_POST['emp_id']));
                } else {
                    $setdata['empl_no'] = getRefId(array('doctype' => 'employee'));
                    $setdata['empl_in'] = date('Y-m-d H:i:s');
                    $saved = $this->dbmodel->insert('employee', $setdata);
                }
                if ($saved) {
                    $this->session->set_flashdata('SucMessage', ucfirst($this->input->post('empl_name')) . ' Employee saved Successfully');
                    echo json_encode(array('status' => true, 'msg' => ucfirst($this->input->post('empl_name')) . ' Employee saved Successfully'));
                } else {
                    echo json_encode(array('status' => false, 'msg' => 'Employee Saved Not Successfully'));
                }
            }
        }
    }

    public function uniquemobileno() {
        $this->form_validation->set_message('uniquemobileno', 'This Mobile No already exist please choose different one');
        $condition_arr['empl_phone'] = $_POST['empl_phone'];
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
                $data_list[0]->employeestatus = getFeild('statusname', 'employeestatus', 'id', $data_list[0]->fk_employeestatus_id);
                $data_list[0]->empl_dob = cdatedbton($data_list[0]->empl_dob);
                $data['list'] = $data_list[0];
                $loadhtml = $this->load->view('employee/view', $data, true);
            }
        }
        echo json_encode(array('status' => true, 'viewhtml' => $loadhtml));
    }

    public function delete($id) {
        if (!empty($id)) {
            $condition_array['md5(id)'] = $id;
            $data_list = $this->dbmodel->getAll('employee', $condition_array);
            if (count($data_list) > 0) {
                $this->dbmodel->update('employee', array('dels' => '1'), array('id' => $data_list[0]->id));
                $this->session->set_flashdata('SucMessage', 'Employee has been deleted successfully!!!');
            } else {
                $this->session->set_flashdata('ErrorMessages', 'Employee has not been deleted successfully!!!');
            }
        }
        redirect(base_url() . 'employees');
    }

    public function changestatus() {
        if (isset($_POST['empid']) && !empty($_POST['empid'])) {
            $condition_array['md5(id)'] = $_POST['empid'];
            $data_list = $this->dbmodel->getAll('employee', $condition_array);
            if (count($data_list) > 0) {
                $this->dbmodel->update('employee', array('status' => (isset($_POST['status']) && !empty($_POST['status'])) ? '0' : '1'), array('id' => $data_list[0]->id));
                echo json_encode(array('status' => true, 'msg' => (isset($_POST['status']) && !empty($_POST['status'])) ? 'Employee Inactive Successfully' : 'Employee Active Successfully'));
            } else {
                echo json_encode(array('status' => false, 'msg' => (isset($_POST['status']) && !empty($_POST['status'])) ? 'Employee Inactive not Successfully' : 'Employee Active not Successfully'));
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
                $loadhtml = $this->load->view('employee/delete', $data, true);
            }
        }
        echo json_encode(array('status' => true, 'viewhtml' => $loadhtml));
    }

}
