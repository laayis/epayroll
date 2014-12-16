<?php 
if(!defined('BASEPATH')) die('Dont try to access it directly you maroon.');

class PermsModel extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function getPerms() {
        $this->db->order_by('permKey ASC');
        $q = $this->db->get('permissions');
        
        if($q->num_rows() > 0)
            return $q->result();
        
        $q->free_result();
    }
    
    public function getPermById($id) {
        $this->db->where('ID' , $id);
        $q = $this->db->get('permissions');
        
        if($q->num_rows() > 0)
            return $q->row();
        
        $q->free_result();
    }
    
    /**
     * add / edit permission 
     */
    public function savePerm() {
        $strSQL = sprintf("REPLACE INTO `permissions` SET `ID` = %u, `permName` = '%s', `permKey` = '%s'", $_POST['permID'], $_POST['permName'], $_POST['permKey']);
        $this->db->query($strSQL);
    }

    /**
     * delete permission 
     */
    public function delPerm() {
        $strSQL = sprintf("DELETE FROM `permissions` WHERE `ID` = %u LIMIT 1", $_POST['permID']);
        mysql_query($strSQL);
    }
}
?>