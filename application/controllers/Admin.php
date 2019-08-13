<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Administration');
        $this->load->helper('url'); 
        $this->load->helper('form'); 
        //$this->load->library('');
      //include APPPATH . 'third_party/guzzle/init.php';
        
    } 
    //admin login
    public function login()
    {
       if($this->input->post('submit'))
       {
           $data = array(
               //s'id' => $this->input->post('id'),
               'username' => $this->input->post('username'),
               'password' => $this->input->post('password')
           );
           
           $username = $this->input->post('username');
           $password = $this->input->post('password');
           $res = $this->Administration->correctDetails($username,$password);
           if($res)
           {
               //print($username."".$password."$res");
              redirect('Admin/index'); //redirects to the admin page
           }
           else{
               //custom messages
               $this->session->set_flashdata('error','Sorry, you have entered wrong user details,please retry!');
               redirect('Welcome');
           }
       }
    }
    public function logout()
    {         //destroys all set session data
            $this->session->sess_destroy();
            redirect('Welcome','refresh');
    }

    public function index()
    {
       $data['application'] = $this->Administration->retrieveApplications();
       return $this->load->view('admin',$data);
        
    }
    
    public function deleteA($id)
    {
       
            $res = $this->Administration->dApplication($id);
            if($res)
            {
                $this->session->set_flashdata('deleted','successfully deleted');
                redirect('Admin');
                //print('deleted');
            }
           // else{print('not deleted');}
        
    }
    
     public function updateA()
    {
        if($this->input->post('submit')==True)
        {
               if($this->input->post('submit')==TRUE)
        {
            
            $type = explode('.',$_FILES["pic"]["name"]); //everything in the name of the file that comes after . ie
            // photo.jpg is the name so the above $type returns jpg because is after "."
            $type = $type['1']; //or $type = $type[count($type)-1];
            $tmp_name = uniqid(rand()).'.'.$type; //random strings generated -- uniqid(rand())
           // $url = base_url();
            $file_path = "uploads/pro_pics/".$tmp_name;
            if(in_array($type,array("jpg","jpeg","gif","png"))){ //checks if any suplied item is in array
                 if(is_uploaded_file($_FILES['pic']['tmp_name']))
                 {
                     if(move_uploaded_file($_FILES['pic']['tmp_name'],$file_path))
                             {
                                $image_name = $tmp_name;
                                //print($_FILES['pic']['tmp_name']);
                             }
                 }
            }
            
            
            $ptype = explode('.',$_FILES["resume"]["name"]); //everything in the name of the file that comes after . ie
            // photo.jpg is the name so the above $type returns jpg because is after "."
            $ptype = $ptype['1']; //or $type = $type[count($type)-1];
            $ptmp_name = uniqid(rand()).'.'.$ptype; //random strings generated -- uniqid(rand())
            //$purl = base_url();
            $pfile_path = "uploads/resumes/".$ptmp_name;
            if(in_array($ptype,array("pdf","PDF"))){ //checks if any suplied item is in array
                 if(is_uploaded_file($_FILES['resume']['tmp_name']))
                 {
                     if(move_uploaded_file($_FILES['resume']['tmp_name'],$pfile_path))
                             {
                                $resume_name = $ptmp_name;
                                //print($_FILES['pic']['tmp_name']);
                             }
                 }
            }
            
             $data = array(
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                    'gender' => $this->input->post('gender'),
                'dob' => $this->input->post('dob'),
                'email' =>$this->input->post('email'),
                'occupation' =>$this->input->post('occupation'),
                's_range' =>$this->input->post('s_range'),
                'pic' => $image_name,
                'resume' =>$resume_name
            );
             
             
      

                $res = $this->Administration->editApplication($id,$data);
                if($res)
                {
                $this->session->set_flashdata('edited','successfully edited');
                redirect('Admin');
                }
                //redirect('Admin','refresh');
        }
    }
    }
    
    
    
}