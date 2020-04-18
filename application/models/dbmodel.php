<?php

/**
 *  Description of dbmodel
 *  Author : VGS_104
 */
class dbmodel extends CI_Model {

    public function insert($tableName, $data) {        
        $this->db->insert($tableName, $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            $error = $this->db->last_query();
            return $error;
        }
    }

    public function insert_batch($tableName, $data) {
        $this->db->insert_batch($tableName, $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            $error = $this->db->last_query();
            return $error;
        }
    }

    public function update($tableName, $data, $condition_array = array()) {
        foreach ($condition_array as $col => $colvalue)
            if (is_array($colvalue)) {
                $this->db->where_in($col, $colvalue);
            } else {
                $this->db->where($col, $colvalue);
            }

        $this->db->update($tableName, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            $error = $this->db->last_query();
            return $error;
        }
    }

    public function usersTokenCheck($condition_array = array()) {
        $access_token = '';
        if (isset($condition_array['access_token']))
            $access_token = $condition_array['access_token'];

        $refresh_token = '';
        if (isset($condition_array['refresh_token']))
            $refresh_token = $condition_array['refresh_token'];

        $this->db->where("FIND_IN_SET('" . $access_token . "', access_token)");
        $this->db->where("refresh_token", $refresh_token);
        $result = $this->db->get('users_token');
        if ($result->num_rows > 0) {
            $UserAuthArr = $result->row_array();
            $UserTokenArr = explode(',', $UserAuthArr['access_token']);

            if (count($UserTokenArr) == 1000)
                array_shift($UserTokenArr);
            $this->endAccessToken = md5(time() . $UserAuthArr['id']);
            array_push($UserTokenArr, "OneTime " . $this->endAccessToken);

            $this->db->where("FIND_IN_SET('" . $access_token . "', access_token)");
            $this->db->where("refresh_token", $refresh_token);
            $this->db->where("id", $UserAuthArr['id']);
            $this->db->update('users_token', array('access_token' => implode(',', $UserTokenArr)));
            $UserAuthArr['access_token'] = $this->endAccessToken;
            return $UserAuthArr;
        } else
            return false;
    }

    public function rowCheck($tableName, $condition_array = array(), $not_condition = array()) {
        foreach ($condition_array as $col => $colvalue) {
            if (preg_match('/[\'^Â£$%&*()}{@#~?><>,|+Â¬-]/', $col)) {
                $this->db->where($col, NULL, FALSE);
            } else {
                $this->db->where($col, $colvalue);
            }
        }
        foreach ($not_condition as $col1 => $colvalue1) {
            $this->db->where_not_in($col1, $colvalue1);
        }
        $this->db->where('dels', '0');
        $result = $this->db->get($tableName);
        if ($result->num_rows > 0)
            return true;
        else
            return false;
    }
    
    public function rowCheck_unique($tableName, $condition_array = array(), $not_condition = array()) {
        foreach ($condition_array as $col => $colvalue) {
            if (preg_match('/[\'^Â£$%&*()}{@#~?><>,|+Â¬-]/', $col)) {
                $this->db->where($col, NULL, FALSE);
            } else {
                $this->db->where($col, $colvalue);
            }
        }
        foreach ($not_condition as $col1 => $colvalue1) {
            $this->db->where_not_in($col1, $colvalue1);
        }
       
        $result = $this->db->get($tableName);
        if ($result->num_rows > 0)
            return true;
        else
            return false;
    }

    public function getAll($tableName, $condition_array = array(), $select_array = array(), $group_array = array()) {
        if (count($select_array) > 0) {
            foreach ($select_array as $col => $colvalue)
                $this->db->select($col . ' as ' . $colvalue);
        } else {
            $this->db->select('*');
        }
        foreach ($condition_array as $col => $colvalue){
            if ($colvalue === FALSE) {
                $this->db->where($col, NULL, FALSE);
            } else {
                $this->db->where($col, $colvalue);
            }
        }
        foreach ($group_array as $col => $colvalue)
            $this->db->group_by($colvalue);

        $data = array();
        $this->db->where('dels', '0');
        $result = $this->db->get($tableName);
        foreach ($result->result() as $row) {
            if (isset($row->status))
                $row->status = $row->status === '0' ? FALSE : TRUE;
            $data[] = $row;
        }
        return $data;
    }

    public function getGridCountAll($tableName, $condition_array = array(), $conditioncustom_array = array()) {

        $joinQueryTable = array($tableName);
        if (isset($condition_array['select'])) {
            foreach ($condition_array['select'] as $Fkkey => $FKvalue) {
                $DropdownFieldArray = explode('_', $FKvalue);
                if ($DropdownFieldArray[0] == 'fk') {

                    if (!in_array($DropdownFieldArray[1], $joinQueryTable)) {
                        $this->db->join($DropdownFieldArray[1] . ' ' . $DropdownFieldArray[1], $this->db->dbprefix($tableName) . '.' . $FKvalue . '= ' . $DropdownFieldArray[1] . '.id', 'left');
                        array_push($joinQueryTable, $DropdownFieldArray[1]);
                    }
                }
            }
            $this->db->select('count(' . $this->db->dbprefix($tableName) . '.id) as num_rows');
        } else {
            $this->db->select('count(' . $this->db->dbprefix($tableName) . '.id) as num_rows');
        }

        if (isset($condition_array['filter']) && is_array($condition_array['filter'])) {
            foreach ($condition_array['filter'] as $col => $colvalue) {
                if (!empty($colvalue) || $colvalue == '0') {
                    $DropdownFieldArray = explode('_', $col);
                    if ($DropdownFieldArray[0] == 'fk') {
                        $this->db->like($DropdownFieldArray[1] . '.' . $DropdownFieldArray[2], $colvalue, 'both');
                    } else {
                        $this->db->like($tableName . '.' . $col, $colvalue, 'both');
                    }
                }
            }
        }
        if (isset($condition_array['filtercustom']) && is_array($condition_array['filtercustom'])) {
            foreach ($condition_array['filtercustom'] as $col => $colvalue) {
                if (!empty($colvalue) || $colvalue == '0') {
                    $DropdownFieldArray = explode('_', $col);
                    if ($DropdownFieldArray[0] == 'fk') {
                        if (is_numeric($colvalue)) {
                            $this->db->where($DropdownFieldArray[1] . '.' . $DropdownFieldArray[2], $colvalue);
                        } else {
                            $this->db->like($DropdownFieldArray[1] . '.' . $DropdownFieldArray[2], $colvalue, 'both');
                        }
                    } else {
                        if (is_numeric($colvalue)) {
                            $this->db->where($tableName . '.' . $col, $colvalue);
                        } else {
                            $this->db->like($tableName . '.' . $col, $colvalue, 'both');
                        }
                    }
                } else {
                        $this->db->where($col, NULL, FALSE);
                }
            }
        }
        $this->db->where($this->db->dbprefix($tableName) . '.dels', '0');
        $result = $this->db->get($tableName . ' ' . $this->db->dbprefix($tableName))->row();
        return isset($result->num_rows) ? $result->num_rows : 0;
    }

    public function getGridAll($tableName, $condition_array = array(), $where = true,$group_array=array()) {

        $joinQueryTable = array();
        if (isset($condition_array['select'])) {
            foreach ($condition_array['select'] as $Fkkey => $FKvalue) {
                $DropdownFieldArray = explode('_', $FKvalue);
                if ($DropdownFieldArray[0] == 'fk') {
                    $this->db->select($DropdownFieldArray[1] . '.' . $DropdownFieldArray[2] . ' as ' . $FKvalue);
                    if (!in_array($DropdownFieldArray[1], $joinQueryTable)) {
                        $this->db->join($DropdownFieldArray[1] . ' ' . $DropdownFieldArray[1], $this->db->dbprefix($tableName) . '.' . $FKvalue . '= ' . $DropdownFieldArray[1] . '.id', 'left');
                        array_push($joinQueryTable, $DropdownFieldArray[1]);
                    }
                } else {
                    if (preg_match('/[\'^Â£$%&*()}{@#~?><>,|+Â¬-]/', $FKvalue)) {
                        $this->db->select($FKvalue, FALSE);
                    } else {
                        $this->db->select($this->db->dbprefix($tableName) . '.' . $FKvalue);
                    }
                }
            }
        } else {
            $this->db->select('*');
        }
        if (isset($condition_array['filter']) && is_array($condition_array['filter'])) {
            foreach ($condition_array['filter'] as $col => $colvalue) {
                if (!empty($colvalue)) {
                    $DropdownFieldArray = explode('_', $col);
                    if ($DropdownFieldArray[0] == 'fk') {
                        $this->db->like($DropdownFieldArray[1] . '.' . $DropdownFieldArray[2], $colvalue, 'both');
                    } else {
                        $this->db->like($this->db->dbprefix($tableName) . '.' . $col, $colvalue, 'both');
                    }
                }
            }
        }
        if (isset($condition_array['filtercustom']) && is_array($condition_array['filtercustom'])) {
            foreach ($condition_array['filtercustom'] as $col => $colvalue) {
                if (!empty($colvalue) || $colvalue == '0') {
                    $DropdownFieldArray = explode('_', $col);
                    if ($DropdownFieldArray[0] == 'fk') {
                        if (is_numeric($colvalue)) {
                            $this->db->where($DropdownFieldArray[1] . '.' . $DropdownFieldArray[2], $colvalue);
                        } else {
                            $this->db->like($DropdownFieldArray[1] . '.' . $DropdownFieldArray[2], $colvalue, 'both');
                        }
                    } else {
                        if (is_numeric($colvalue) && $colvalue != '0') {
                            $this->db->where($this->db->dbprefix($tableName) . '.' . $col, $colvalue);
                        } else {
                            $this->db->like($this->db->dbprefix($tableName) . '.' . $col, $colvalue, 'both');
                        }
                    }
                } else {
                        $this->db->where($col, NULL, FALSE);
                }
            }
        }
        foreach ($group_array as $col => $colvalue)
            $this->db->group_by($colvalue);

        if (isset($condition_array['sorting']) && count($condition_array['sorting']) > 0) {
            foreach ($condition_array['sorting'] as $col => $colvalue) {
                $DropdownFieldArray = explode('_', $col);
                if ($DropdownFieldArray[0] == 'fk') {
                    $this->db->order_by($DropdownFieldArray[1] . '.' . $DropdownFieldArray[2], $colvalue);
                } else {
                    $this->db->order_by($col, $colvalue);
                }
            }
        } else {
            $this->db->order_by($this->db->dbprefix($tableName) . '.mdate', 'desc');
        }



        if (isset($_POST['count']) && isset($_POST['page'])) {
            $params['count'] = isset($_POST['count']) ? $_POST['count'] : 10;
            $params['page'] = isset($_POST['page']) ? (($_POST['page'] - 1) * $params['count']) : 0;
            $this->db->limit($params['count'], ($params['page']));
        }
        $data = array();
        $this->db->where($this->db->dbprefix($tableName) . '.dels', '0');
        $this->db->from($tableName . ' ' . $this->db->dbprefix($tableName));
        $result = $this->db->get();
        foreach ($result->result() as $row) {
            if (isset($row->status))
                $row->status = $row->status === '0' ? FALSE : TRUE;
            if (isset($row->id))
                $row->ecodeid = md5($row->id);
            $data[] = $row;
        }
        return $data;
    }

    public function getCountAll($tableName, $condition_array = array()) {
        $joinQueryTable = array();
        foreach ($condition_array as $col => $colvalue) {
            if (!empty($colvalue)) {
                $this->db->like($tableName . '.' . $col, $colvalue, 'both');
            }
        }
        $this->db->where($this->db->dbprefix($tableName) . '.dels', '0');
        $result = $this->db->get($tableName . ' ' . $this->db->dbprefix($tableName));
        return $result->num_rows;
    }

    public function executeQuery($sql) {
        $q = $this->db->query($sql);
        $data = array();
        foreach ($q->result() as $row) {
            if (isset($row->status))
                $row->status = $row->status === '0' ? FALSE : TRUE;
            $data[] = $row;
        }
        return $data;
    }

    public function delete($tableName, $condition_array = array()) {
        foreach ($condition_array as $col => $colvalue)
            $this->db->where($col, $colvalue);
        $this->db->delete($tableName);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            $error = $this->db->last_query();
            return $error;
        }
    }
    

}
