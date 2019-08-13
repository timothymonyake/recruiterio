<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    //application default load method
    public function index()
	{		
		return $this->load->view('home');
	}
        
        public function two()
                {
                    $this->load->view('occupations/avail_occ');
                }
}
