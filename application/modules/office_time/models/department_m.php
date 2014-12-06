<?php

class Department_m extends MY_Model {

    public $_table_name = 'department';
    protected $_primary_key = 'department_id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'department_id';
    protected $_timestamps = FALSE;

    public function __construct() {
        parent::__construct();
    }

    public function getTableName() {
        return $this->_table_name;
    }

    public function setTableName($tbl) {
        if (trim($tbl))
            $this->_table_name = $tbl;
    }

//    public function deleteRecord($id) {
//        $this->db->delete('attribute', array('attribute_id' => $id));
//    }
  
}
