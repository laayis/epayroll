<?php 
if(!defined('BASEPATH')) die('Dont try to access it directly you maroon.');

class RolesModel extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function getRoles() {
        $q = $this->db->get('roles');
        
        if($q->num_rows() > 0)
            return $q->result();
        
        $q->free_result();
    }
    
    public function getRoleById($id) {
        $this->db->where('ID' , $id);
        $q = $this->db->get('roles');
        
        if($q->num_rows() > 0)
            return $q->row();
        
        $q->free_result();
    }
    
    public function saveRole() {
        $strSQL = sprintf("REPLACE INTO `roles` SET `ID` = %u, `roleName` = '%s'", $_POST['roleID'], $_POST['roleName']);
        $this->db->query($strSQL);
        //echo $this->db->affected_rows();
        
        if ($this->db->affected_rows() > 1) {
            $roleID = $_POST['roleID'];
        } else {
            $roleID = $this->db->insert_id();
        }
        foreach ($_POST as $k => $v) {
            if (substr($k, 0, 5) == "perm_") {
                $permID = str_replace("perm_", "", $k);
                if ($v == 'X') {
                    $strSQL = sprintf("DELETE FROM `role_perms` WHERE `roleID` = %u AND `permID` = %u", $roleID, $permID);
                    //mysql_query($strSQL);
                    $this->db->query($strSQL);
                    continue;
                }
                $strSQL = sprintf("REPLACE INTO `role_perms` SET `roleID` = %u, `permID` = %u, `value` = %u, `addDate` = '%s'", $roleID, $permID, $v, date("Y-m-d H:i:s"));
                mysql_query($strSQL);
            }
        }
    }
    
    public function delRole()
    {
        $strSQL = sprintf("DELETE FROM `roles` WHERE `ID` = %u LIMIT 1", $_POST['roleID']);
        $this->db->query($strSQL);//mysql_query($strSQL);
        $strSQL = sprintf("DELETE FROM `user_roles` WHERE `roleID` = %u", $_POST['roleID']);
        $this->db->query($strSQL);//mysql_query($strSQL);
        $strSQL = sprintf("DELETE FROM `role_perms` WHERE `roleID` = %u", $_POST['roleID']);
        $this->db->query($strSQL);//mysql_query($strSQL);
    }
}
?>