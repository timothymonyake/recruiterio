<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Salary_range extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
    
    public function insertRange($range)
    {
        $this->db->insert('salary_range',$range);
        return true;
    }
    
    public function retrieveRanges()
    {
        $this->db->select('*');
         $this->db->from('salary_range');
         // $this->db->where('id',$id);
          
          $result = $this->db->get();
          if($result)
          {
             return $result->result_array(); //row_array if u want only one row
          }
          else{return false;}
    }
    
    public function editRange($id,$data)
    {
        $this->db->where('id',$id);
        $this->db->update('salary_range',$data);
        
        return true;
    }
    
    public function dRange($id)
    {
       
      
        //$this->db->delete('mytable', array('id' => $id));  // Produces: // DELETE FROM mytable  // WHERE id = $id
        $res = $this->db->delete('salary_range',array('id' => $id));
        if($res)
        {
            return true;
        }
        else{return false;}
    } 
}