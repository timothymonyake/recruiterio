<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Occupations extends CI_Controller {

    public function __construct()
    {
        //on load load helpers and libss
        parent::__construct();
        $this->load->helper('url','session');    
        $this->load->model('occupations/Occupation');
    }
    
    public function index()
    {		
           $data['data'] = $this->Occupation->retrieveOccupations();
           $this->load->view('occupations/avail_occ',$data);                
    }
    
    public function addOccupation()
    {		
       
        
		//return $this->load->view('occupations/avail_occ'); 
            if(($this->input->post('submit')) ==True)
            {
                $data = array(
                     'title' => $this->input->post('title'),
                    'description '=>$this->input->post('description')
                );                
                
               $added =  $this->Occupation->insertOccupation($data);
               if($added){
                    $this->session->set_flashdata('added','Record successfully added');
                    redirect('Occupations/index');
                   //print('added');
                  
               }
               else{
                    $this->session->set_flashdata('not_added','Record not added');
                    redirect('Occupations/index');
                   print('nt added');}
            } //aadd soe code to occuoation
            
    }
    /*
    public function getOccupations()
    {
       $occupations = $this->Occupation->retrieveOccupations();
       
       if($occupations==null)
       {
           print("sorry there are currently no occupations");
       }
       else
       {
           $data['data'] = $this->Occupation->retrieveOccupations();
           $this->load->view('occupations/avail_occ',$data);
       }
    }*/
    
    public function deleteO($id)
    {
       
            $res = $this->Occupation->dOccupation($id);
            if($res)
            {
                $this->session->set_flashdata('deleted','Record successfully deleted');
                redirect('Occupations/index');
                //print('deleted');
            }
            else{
                $this->session->set_flashdata('not_deleted','Record not deleted');
                redirect('Occupations/index');
            }
        
    }
    
    public function updateO()
    {
        if($this->input->post('submit')==True)
        {
                $id = $this->input->post('uid');
                $data = array(
                    'title'=> $this->input->post('utitle'),
                    'description' => $this->input->post('udescription')
                );

                $res = $this->Occupation->editOccupation($id,$data);
                if($res)
                {
                    $this->session->set_flashdata('updated','Record successfully updated');
                    redirect('Occupations','refresh');
                }
                else{
                    $this->session->set_flashdata('error_edit','Record not updated');
                    redirect('Occupations','refresh');
                }
                
        }
    }
    
    
}
