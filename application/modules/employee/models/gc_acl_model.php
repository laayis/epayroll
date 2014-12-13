<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' ); ?>
<?php
/**
 * @author  : 
 * @link    : 
 * @link    : http://www.geekscook.com 
 * Description: Role Based Access Control (RBAC)
 * (ACL) Access Control List
 */
class gc_ACL_model extends CI_Model
{
    public $userID = 0;            //Integer : Stores the ID of the current user
    
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
        $this->buildACL();
    }
    
    
    
    function getUsername($userID)
    {
        $this->db->select('username')->from('users')->where('ID',floatval($userID))->limit(1);
        $q = $this->db->get();
        
        if($q->num_rows > 0)
            return $q->row(0);
        
        $q->free_result();
//        $strSQL = "SELECT `username` FROM `users` WHERE `ID` = " . floatval($userID) . " LIMIT 1";
//        $data = mysql_query($strSQL);
//        $row = mysql_fetch_array($data);
//        return $row[0];
    }    
}
