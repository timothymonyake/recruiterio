<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applications extends CI_Controller 
{
    public function __construct() {
        parent::__construct();
        $this->load->model('applications/Application');
        $this->load->helper('url'); 
        $this->load->helper('form'); 
      //  $this->load->library('email');
        include APPPATH . 'third_party/guzzle/init.php';
        //loads the linked in library
    } 

    public function index()
    {    //destroy($_SESSION['linked']);
        return $this->load->view('applications/apply');
    }
    
    function linkedIn()
    {   //loads the linked in redirection file
        $this->load->view('redHere');
    }
        
    public function apply()
    {//data from application from
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
             
                 $name = $this->input->post('firstname');
                 $ln = $this->input->post('lastname');
                 $email = $this->input->post('email');
                 $subject = "APPLICATION FOR JOB FROM ".strtoupper($name)." ".strtoupper($ln);
         
 $this->load->library('email');

$this->email->initialize(array(
  'protocol' => 'smtp',
  'smtp_host' => 'smtp.sendgrid.net',
  'smtp_user' => 'apikey',
  'smtp_pass' => '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',
  'smtp_port' => 587,
    'mailtype'=> 'html',
  'crlf' => "\r\n",
  'newline' => "\r\n"
));
$message = '<html><body>';
$message .= '<h4>Good day '
        .$name.' ,please refer to the attached files'
        . '</h4>';
$message .= '<p>Here are details you submitted with your application</p> ';
$message .= '<strong>Firstname : </strong>'.$this->input->post('firstname').'<br>'
            . '<strong>Lastname : </strong>'.$this->input->post('lastname').'<br>'
        . '<strong>Gender : </strong>'.$this->input->post('gender').'<br>'
        . '<strong>Date of Birth : </strong>'. $this->input->post('dob').'<br>'
        . '<strong>Email Address : </strong>'.$this->input->post('email').'<br>'
        . '<strong>Occupation : </strong>'.$this->input->post('occupation').'<br>'
        . '<strong>Expected Salary Range : </strong>'.$this->input->post('s_range').'<br>';
$message .= '</body></html>';

$this->email->from('applications@recruiterio.org', 'RecruiterIO');
$this->email->to($email);
$this->email->cc('segolamemonyake@gmail.com');
$this->email->subject($subject);
$this->email->message($message);
$this->email->attach($file_path);
$this->email->attach($pfile_path);
$this->email->send();



           //print_r($data);
          $res = $this->Application->sendApplication($data);
            if($res)
            {
                $this->session->set_flashdata('applied','Application sent for reviewing, please check <span style="text-decoration:underline">'.$email.'</span> for submitted application.');
                //unset($_SESSION['linked']);
                redirect('Welcome');
            }
            else{
                  $this->session->set_flashdata('error','application not sent, please re-apply');
                redirect('Applications');
                
            }
            
        }

        }
    }

