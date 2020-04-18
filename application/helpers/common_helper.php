<?php

// convert to print array and Stop 
function pr($param) {
    echo "<pre>";
    print_r($param);
    echo "</pre>";
}

// convert to print array and Stop 
function pre($param) {
    echo "<pre>";
    print_r($param);
    echo "</pre>";
    exit();
}

function cdatentodb($d) {
    $d = explode("/", $d);
    return $d[2] . '-' . $d[1] . '-' . $d[0];
}

function ctimetodb($d) {
    $d = explode(" ", $d);
    $d2 = explode(":", $d[0]);
    return sprintf("%02d", ($d2[0] + (($d[1] == 'PM') ? 12 : 0))) . ':' . sprintf("%02d", $d2[1]) . ':00';
}

function cdatedbton($d = FALSE) {
    if (!$d)
        $d = insdate();
    return date('d/m/Y', strtotime($d));
}

function ctimetono($d = FALSE) {
    if (!$d)
        return "12:00 AM";
    else {
        $d2 = explode(":", $d);
        //pr($d2);
        return (($d2[0] > 12) ? sprintf("%02d", ($d2[0] - 12)) : sprintf("%02d", $d2[0])) . ":" . (sprintf("%02d", $d2[1])) . " " . (($d2[0] > 12) ? 'PM' : 'AM');
    }
}

function insdate() {
    return date('Y-m-d H:i:s');
}

function Getdropdowns($table, $selecting = 'text', $where = array(), $group_by = array(), $where_not_in = array()) {

    $CI = & get_instance();
    $CI->load->database();

    if (!empty($where)) {
        foreach ($where as $key => $value) {
            if (is_array($value)) {
                if (count($value) > 0)
                    $CI->db->where_in($key, $value);
            } else {
                $CI->db->where($key, $value);
            }
        }
    }
    if (!empty($where_not_in)) {
        foreach ($where_not_in as $key => $value) {
            if (is_array($value)) {
                if (count($value) > 0)
                    $CI->db->where_not_in($key, $value);
            }else {
                $CI->db->where_not_in($key, $value);
            }
        }
    }
    $CI->db->where('dels', '0');
    if (count($group_by) > 0) {
        $CI->db->select(array($group_by[0] . ' as id', $selecting));
        $CI->db->group_by($group_by);
    } else {
        $CI->db->select(array('id', $selecting));
    }
    $result = $CI->db->get($table)->result_array();
    $re = array();
    foreach ($result as $key => $value) {
        $re[$value['id']] = $value[$selecting];
    }
    return $re;
}

function getFeild($select, $table, $feild, $value) {
    $CI = & get_instance();
    $CI->load->database();
    $rs = $CI->db->select($select)->get_where($table, array($feild => $value))->row_array();
    return isset($rs[$select]) ? $rs[$select] : '';
}

if (!function_exists('apache_request_headers')) {

    function apache_request_headers() {
        $arh = array();
        $rx_http = '/\AHTTP_/';
        foreach ($_SERVER as $key => $val) {
            if (preg_match($rx_http, $key)) {
                $arh_key = preg_replace($rx_http, '', $key);
                $rx_matches = array();
                // do some nasty string manipulations to restore the original letter case
                // this should work in most cases
                $rx_matches = explode('_', $arh_key);
                if (count($rx_matches) > 0 and strlen($arh_key) > 2) {
                    foreach ($rx_matches as $ak_key => $ak_val)
                        $rx_matches[$ak_key] = ucfirst($ak_val);
                    $arh_key = implode('-', $rx_matches);
                }
                $arh[$arh_key] = $val;
            }
        }
        return( $arh );
    }

}

// ---------Injecting a Audit Log
function InjAudittrailLog($dataArr = array()) {
    $CI = & get_instance();
    $CI->load->database();
    $dataArr["datetime"] = date('Y-m-d H:i:s');
    $dataArr["ip"] = $_SERVER['REMOTE_ADDR'];
    $dataArr['cdate'] = $dataArr['mdate'] = time();
    if (!isset($dataArr['fk_users_id']))
        $dataArr['fk_users_id'] = '';

    if (!isset($dataArr['action']))
        $dataArr['action'] = '';

    if (!isset($dataArr['reftext']))
        $dataArr['reftext'] = '';

    if (!isset($dataArr['referenceid']))
        $dataArr['referenceid'] = '';

    if (!isset($dataArr['url']))
        $dataArr['url'] = '';

    $CI->db->insert('audittrail', $dataArr);
}

function randomPassword($chars_min = 6, $chars_max = 8, $use_upper_case = false, $include_numbers = false, $include_special_chars = false) {
    $length = rand($chars_min, $chars_max);
    $selection = 'aeuoyibcdfghjklmnpqrstvwxz';
    if ($include_numbers) {
        $selection .= "1234567890";
    }
    if ($include_special_chars) {
        $selection .= '!@\"#$%&[]{}';
    }

    $password = "";
    for ($i = 0; $i < $length; $i++) {
        $current_letter = $use_upper_case ? (rand(0, 1) ? strtoupper($selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))];
        $password .= $current_letter;
    }

    return $password;
}

function validateDate($date) {
    $d = DateTime::createFromFormat('Y-m-d', $date);
    return $d && $d->format('Y-m-d') == $date;
}

function mandatoryArray($requestArray, $mandatoryKeys, $nonMandatoryValueKeys) {

    if (isset($requestArray['sort']) || isset($requestArray['search'])) {
        unset($requestArray['sort']);
        unset($requestArray['search']);
    }


    $requestArray = array_map('trim', (array) $requestArray);

    $error = array();



    foreach ($mandatoryKeys as $key => $val) {

        if (!array_key_exists($key, $requestArray)) {

            $error["msg"] = "Request must contain " . $key;

            $error["statusCode"] = 406;

            break;
        }

        if ((empty($requestArray[$key])) && (!in_array($key, $nonMandatoryValueKeys)) && ($requestArray[$key] != '0')) {

            $error["msg"] = $val . " should not be empty";
            $error["statusCode"] = 422;
            break;
        }
    }



    return $error;
}

function gettimediffdameday($ftime, $ttime) {
    $date = date("Y-m-d");
    $start_date = new DateTime($date . ' ' . $ftime);
    $since_start = $start_date->diff(new DateTime($date . ' ' . $ttime));
    return $since_start->invert;
}

function convertDays($days) {
    return $seconds = $days * 86400;
}

function importCsv($rn, $storeFolder = "uploads") {
    if (!is_dir($storeFolder)) {
        mkdir($storeFolder, 0777, TRUE);
    }
    header('Content-type: text/html; charset=utf-8');
    if (isset($rn['file']) && !empty($rn['file'])) {
        $file_name = time() . $rn['name'];
        $csv = $rn['file'];
        $csv = str_replace("data:" . $_POST['type'] . ";base64,", "", $csv);
        if ($_POST['type'] == '') {
            $csv = str_replace("data:application/octet-stream;base64,", "", $csv);
            //$csv = preg_replace('/^data:.*?;base64', "", $csv);
        }

        $data = base64_decode($csv);

        $CI = & get_instance();
        file_put_contents($storeFolder . '/' . $file_name, $data);
        $CI->load->library('Excel');
//read file from path
        $objPHPExcel = PHPExcel_IOFactory::load($storeFolder . '/' . $file_name);
//get only the Cell Collection
        $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
        //$cell_collection = $objPHPExcel->getActiveSheet()->getCellIterator();
        //$objPHPExcel->getActiveSheet()->getSecurity()->setWorkbookPassword("12345");
//extract to a PHP readable array format
        $datain = array();
        $datainvalue = array();
        foreach ($cell_collection as $cell) {
            $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
            $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
            $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
            //header will/should be in row 1 only. of course this can be modified to suit your need.
            if ($row == 1) {
                $header[$row][$column] = $data_value;
                $datainvalue[] = '';
                $datain[] = $column;
            } else {
                if (!isset($arr_data[$row]))
                    $arr_data[$row] = $datainvalue;
                $arr_data[$row][array_search($column, $datain)] = $data_value;
            }
        }
        $dataup['header'] = $header;
        $dataup['values'] = $arr_data;
        unlink($storeFolder . '/' . $file_name);
        return $dataup;
    }
    return false;
}

function do_upload_image($field_name, $uploadpath) {
    $CI = & get_instance();
    $msg = array();
    $file_name = "";
    $message = "";
    $image_new_name = time() . "-" . $field_name;
    $config['upload_path'] = './' . $uploadpath;
    $config['upload_url'] = base_url() . $uploadpath;
    $config['allowed_types'] = "gif|jpg|png|jpeg";
    $config['file_name'] = $image_new_name;
    $CI->load->library('upload', $config);
    $CI->upload->initialize($config);
    if (!$CI->upload->do_upload($field_name)) {
        $error = array('error' => $CI->upload->display_errors());
        $message = $error['error'];
    } else {
        $data = array('upload_data' => $CI->upload->data());
        $file_name = $data['upload_data']['orig_name'];
        $message = "success";
    }
    $msg = array("image_message" => $message, "image_file_name" => $file_name);
    return $msg;
}

function getRefId($condition = array()) {
    $CI = & get_instance();
    $CI->load->database();
    $CI->db->select('prefix,current');
    $CI->db->where($condition);
    $result = $CI->db->get('docprefix')->row_array();
    if (count($result) > 0) {
        $CI->db->where($condition)->update('docprefix', array('current' => ($result['current'] + 1), 'mdate' => time()));
        if (isset($condition['doctype']) && $condition['doctype'] == 'order') {
            $result['prefix'] .= date('ymd');
        }
        return $result['prefix'] . $result['current'];
    } else {
        $documenttypearr = array('employee' => 'EMP', 'customer' => 'CUST');
        $temdoc = isset($documenttypearr[$condition['doctype']]) ? $documenttypearr[$condition['doctype']] : $condition['doctype'];
        $condition['prefix'] = str_replace('_', '', strtoupper($temdoc));
        $condition['start'] = 10000;
        $condition['current'] = $condition['start'] + 2;
        $condition['cdate'] = $condition['mdate'] = time();
        $CI->db->insert('docprefix', $condition);

        if (isset($condition['doctype']) && $condition['doctype'] == 'employee') {
            $condition['prefix'] .= date('ymd');
        }
        return $condition['prefix'] . ($condition['start'] + 1);
    }
}

?>