<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Application extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
    
    public function sendApplication($application)
    {
        $this->db->insert('applicants',$application);
        return true;
    }
    
    public function retrieveOccupations()
    {
        $this->db->select('*');
         $this->db->from('occupation');
         // $this->db->where('id',$id);
          
          $result = $this->db->get();
          if($result)
          {
             return $result->result_array(); //row_array if u want only one row
          }
          else{return false;}
    }
    
    public function editOccupation($id,$data)
    {
        $this->db->where('id',$id);
        $this->db->update('occupation',$data);
        
        return true;
    }
    
    public function dOccupation($id)
    {
      
        //$this->db->delete('mytable', array('id' => $id));  // Produces: // DELETE FROM mytable  // WHERE id = $id
        $res = $this->db->delete('occupation',array('id' => $id));
        if($res)
        {
            return true;
        }
        else{return false;}
    } 
}