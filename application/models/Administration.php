<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Administration extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
    
    public function retrieveApplications()
    {
        $this->db->select('*');
         $this->db->from('applicants');
         // $this->db->where('id',$id);
          
          $result = $this->db->get();
          if($result)
          {
             return $result->result_array(); //row_array if u want only one row
          }
          else{return false;}
    }
    
    public function editApplication($id,$data)
    {
        $this->db->where('id',$id);
        $this->db->update('applicants',$data);
        
        return true;
    }
    
    public function dApplication($id)
    {
      
        //$this->db->delete('mytable', array('id' => $id));  // Produces: // DELETE FROM mytable  // WHERE id = $id
        $res = $this->db->delete('applicants',array('id' => $id));
        if($res)
        {
            return true;
        }
        else{return false;}
    } 
    
    public function correctDetails($username,$password)
    {
        //basic select query on codeigniter
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username',$username);  
        $this->db->where('password',$password);
        $res = $this->db->get();
        if($res)
        {
            return true;
        }
        else{return false;}
    }
}