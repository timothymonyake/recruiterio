<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salary_ranges extends CI_Controller {

    //basic CRUD on the salary rabges displayed on the form   
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');    
        $this->load->model('salary_range/Salary_range');
    }
    
    //loads when salary range is clicked in the nav bar
    public function index()
    {		
           $data['data'] = $this->Salary_range->retrieveRanges();
           if($data==NULL)
           {
               print('no yet added');
               $this->load->view('salary_range/avail_range'); 
           }
           else{
               $this->load->view('salary_range/avail_range',$data); 
           }
                          
    }
    
    public function addRange()
    {	
        //adds a new salary range to db      
        
		//return $this->load->view('occupations/avail_occ'); 
            if(($this->input->post('submit')) ==True)
            {
                $data = array(
                     's_range' => $this->input->post('s_range'),
               
                );                
                
               $added =  $this->Salary_range->insertRange($data);
               if($added){
                   $this->session->set_flashdata('added','Record successfully added');
                   redirect('Salary_ranges/index');
                  
               }
               else{
                    $this->session->set_flashdata('not_added','Record not added');
                   redirect('Salary_ranges/index');
               }
                   
            }
             //aadd soe code to occuoation
            
    }

    
    public function deleteR($id)
    {
      //
            $res = $this->Salary_range->dRange($id); //calls a method from the model
           
            if($res)
            {
                $this->session->set_flashdata('deleted','Record successfully added');
                   redirect('Salary_ranges/index');
            }
            else{
                 $this->session->set_flashdata('not_deleted','Record not deleted');
                 redirect('Salary_ranges/index');
                
            }
    }
    
    public function updateR()
    {
        if($this->input->post('submit')==True)
        {
                $id = $this->input->post('uid');
                $data = array(
                    's_range'=> $this->input->post('us_range'),
                        );

                $res = $this->Salary_range->editRange($id,$data);
                if($res)
                {
                    $this->session->set_flashdata('updated','Record successfully updated');
                   redirect('Salary_ranges/index');
                }
                else{
                    $this->session->set_flashdata('not_updated','Record not ');
                   redirect('Salary_ranges/index');
                }
        }
    }
    
    
}
