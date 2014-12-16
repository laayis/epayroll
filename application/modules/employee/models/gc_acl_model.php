<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' ); ?>
<?php
/**
 * @author  : Sanjay Khadka
 * @link    : http://www.sanjaykhadka.com.np
 * @link    : http://www.geekscook.com 
 * Description: Role Based Access Control (RBAC)
 * (ACL) Access Control List
 */
class gc_ACL_model extends CI_Model
{
    public $perms = array();        //Array : Stores the permissions for the user
    public $userID = 0;            //Integer : Stores the ID of the current user
    public $userRoles = array();    //Array : Stores the roles of the current user
    
    public function __construct()
    {
        parent::__construct();
        
        
    }
    
    public function init($userID = '')
    {
        if ($userID != '')
        {
            $this->userID = floatval($userID);
        } else {
            $this->userID = floatval($_SESSION['userID']);
        }
        $this->userRoles = $this->getUserRoles('ids');
        $this->buildACL();
    }
    
    public function getUserRoles()
    {
        $this->db->where('userID' , floatval($this->userID));
        $this->db->order_by('addDate' ,  'ASC');
        $q = $this->db->get('employee_roles');
        
        if($q->num_rows() > 0)
            return $q->result();
        
        $q->free_result();
        
//        $strSQL = "SELECT * FROM `employee_roles` WHERE `userID` = " . floatval($this->userID) . " ORDER BY `addDate` ASC";
//        $data = mysql_query($strSQL);
//        $resp = array();
//        while($row = mysql_fetch_array($data))
//        {
//            $resp[] = $row['roleID'];
//        }
//        return $resp;
    }
    
    function getAllRoles($format='ids')
    {
        $format = strtolower($format);
        $this->db->order_by('roleName' , 'ASC');
        $q = $this->db->get('roles');
        
        if($q->num_rows() > 0)
        {
            $resp = array(); // responsibility
            while($row = $q->row())
            {
                if($format == 'full') { $resp[] = array("ID" => $row->ID,"Name" => $row->roleName); }
                else { $resp[] = $row->ID; }
            }
        }
        
        $q->free_result();
//        
//        $format = strtolower($format);
//        $strSQL = "SELECT * FROM `roles` ORDER BY `roleName` ASC";
//        $data = mysql_query($strSQL);
//        $resp = array(); // responsibility
//        while($row = mysql_fetch_array($data))
//        {
//            if ($format == 'full')
//            {
//                $resp[] = array("ID" => $row['ID'],"Name" => $row['roleName']);
//            } else {
//                $resp[] = $row['ID'];
//            }
//        }
//        return $resp;
    }
    
    function buildACL()
    {
        //first, get the rules for the user's role
        if (count($this->userRoles) > 0)
        {
            $this->perms = array_merge($this->perms,$this->getRolePerms($this->userRoles));
        }
        //then, get the individual user permissions
        $this->perms = array_merge($this->perms,$this->getUserPerms($this->userID));
    }
    
    function getPermKeyFromID($permID)
    {
        $this->db->select('permKey')->from('permissions')->where('ID',floatval($permID))->limit(1);
        $q = $this->db->get();
        
        if($q->num_rows > 0)
            return $q->row(0);
        
        $q->free_result();
        
//        $strSQL = "SELECT `permKey` FROM `permissions` WHERE `ID` = " . floatval($permID) . " LIMIT 1";
//        $data = mysql_query($strSQL);
//        $row = mysql_fetch_array($data);
//        return $row[0];
    }
    
    function getPermNameFromID($permID)
    {
        $this->db->select('permName')->from('permissions')->where('ID',floatval($permID))->limit(1);
        $q = $this->db->get();
        
        if($q->num_rows > 0)
            return $q->row(0);
        
        $q->free_result();
//        $strSQL = "SELECT `permName` FROM `permissions` WHERE `ID` = " . floatval($permID) . " LIMIT 1";
//        $data = mysql_query($strSQL);
//        $row = mysql_fetch_array($data);
//        return $row[0];
    }
    
    function getRoleNameFromID($roleID)
    {
        $this->db->select('roleName')->from('roles')->where('ID',floatval($roleID))->limit(1);
        $q = $this->db->get();
        
        if($q->num_rows > 0)
            return $q->row(0);
        
        $q->free_result();
//        $strSQL = "SELECT `roleName` FROM `roles` WHERE `ID` = " . floatval($roleID) . " LIMIT 1";
//        $data = mysql_query($strSQL);
//        $row = mysql_fetch_array($data);
//        return $row[0];
    }
    
    function getUsername($userID)
    {
        $this->db->select('username')->from('employee')->where('ID',floatval($userID))->limit(1);
        $q = $this->db->get();
        
        if($q->num_rows > 0)
            return $q->row(0);
        
        $q->free_result();
//        $strSQL = "SELECT `username` FROM `employee` WHERE `ID` = " . floatval($userID) . " LIMIT 1";
//        $data = mysql_query($strSQL);
//        $row = mysql_fetch_array($data);
//        return $row[0];
    }
   
    function getRolePerms($role)
    {
        if(is_array($role))
        {
            $this->db->where_in('roleID' , implode(",",$role));
            $this->db->order_by('ID' , 'ASC');
        }
        else
        {
            $this->db->where('roleID' , $role);
            $this->db->order_by('ID' , 'ASC');
        }
        $q = $this->db->get('role_perms');
        if($q->num > 0)
        {
            $perms = array();
            while($row = $q->row())
            {
                $pK = strtolower($this->getPermKeyFromID($row->permID));
                if ($pK == '') { continue; }
                if ($row->value === '1') {
                    $hP = true;
                } else {
                    $hP = false;
                }
                $perms[$pK] = array('perm' => $pK,'inheritted' => true,'value' => $hP,'Name' => $this->getPermNameFromID($row->permID),'ID' => $row->permID);
            }
            return $perms;
        }
        
        $q->free_result();
//        if (is_array($role))
//        {
//            $roleSQL = "SELECT * FROM `role_perms` WHERE `roleID` IN (" . implode(",",$role) . ") ORDER BY `ID` ASC";
//        } else {
//            $roleSQL = "SELECT * FROM `role_perms` WHERE `roleID` = " . floatval($role) . " ORDER BY `ID` ASC";
//        }
//        $data = mysql_query($roleSQL);
//        $perms = array();
//        while($row = mysql_fetch_assoc($data))
//        {
//            $pK = strtolower($this->getPermKeyFromID($row['permID']));
//            if ($pK == '') { continue; }
//            if ($row['value'] === '1') {
//                $hP = true;
//            } else {
//                $hP = false;
//            }
//            $perms[$pK] = array('perm' => $pK,'inheritted' => true,'value' => $hP,'Name' => $this->getPermNameFromID($row['permID']),'ID' => $row['permID']);
//        }
//        return $perms;
    }
    
    function getUserPerms($userID)
    {
        $this->db->where('userID' , floatval($userID));
        $this->db->order_by('addDate' , 'ASC');
        $q = $this->db->get('employee_perms');
        
        $perms = array();
        if($q->num_rows() > 0)
        {
            while($row = $q->row())
            {
                $pK = strtolower($this->getPermKeyFromID($row->permID));
                if ($pK == '') { continue; }
                if ($row->value == '1') {
                    $hP = true;
                } else {
                    $hP = false;
                }
                $perms[$pK] = array('perm' => $pK,'inheritted' => false,'value' => $hP,'Name' => $this->getPermNameFromID($row->permID),'ID' => $row->permID);
            }
        }
        return $perms;
//        $strSQL = "SELECT * FROM `employee_perms` WHERE `userID` = " . floatval($userID) . " ORDER BY `addDate` ASC";
//        $data = mysql_query($strSQL);
//        $perms = array();
//        while($row = mysql_fetch_assoc($data))
//        {
//            $pK = strtolower($this->getPermKeyFromID($row['permID']));
//            if ($pK == '') { continue; }
//            if ($row['value'] == '1') {
//                $hP = true;
//            } else {
//                $hP = false;
//            }
//            $perms[$pK] = array('perm' => $pK,'inheritted' => false,'value' => $hP,'Name' => $this->getPermNameFromID($row['permID']),'ID' => $row['permID']);
//        }
//        return $perms;
    }
    
    function getAllPerms($format='ids')
    {
        $format = strtolower($format);
        $this->db->order_by('permName' , 'ASC');
        $q = $this->db->get('permissions');
        
        $resp = array();
        if($q->num_rows > 0)
        {
            while($row = $q->row())
            {
                if ($format == 'full')
                {
                    $resp[$row->permKey] = array('ID' => $row->ID, 'Name' => $row->permName, 'Key' => $row->permKey);
                } else {
                    $resp[] = $row->ID;
                }
            }
        }
        return $resp;
        
//        $format = strtolower($format);
//        $strSQL = "SELECT * FROM `permissions` ORDER BY `permName` ASC";
//        $data = mysql_query($strSQL);
//        $resp = array();
//        while($row = mysql_fetch_assoc($data))
//        {
//            if ($format == 'full')
//            {
//                $resp[$row['permKey']] = array('ID' => $row['ID'], 'Name' => $row['permName'], 'Key' => $row['permKey']);
//            } else {
//                $resp[] = $row['ID'];
//            }
//        }
//        return $resp;
    }
    
    function userHasRole($roleID)
    {
        foreach($this->userRoles as $k => $v)
        {
            if (floatval($v) === floatval($roleID))
            {
                return true;
            }
        }
        return false;
    }
    
    function hasPermission($permKey)
    {
        $permKey = strtolower($permKey);
        if (array_key_exists($permKey,$this->perms))
        {
            if ($this->perms[$permKey]['value'] === '1' || $this->perms[$permKey]['value'] === true)
            {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
