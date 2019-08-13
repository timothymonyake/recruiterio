<?php

//session_start();

require('vendor/autoload.php');
require('LinkedIn.php');

use myPHPNotes\LinkedIn;

$id = "86gaftoyzq1mq8";
$secret = "ix9U4bCMssHTFuWU";
$redirect = "http://localhost/alphad/Applications/linkedIn";
$scopes = "r_emailaddress r_basicprofile r_liteprofile w_member_social rw_company_admin";
$ssl = "false"; //true for production purposes

$linked = new LinkedIn($id,$secret,$redirect,$scopes,$ssl);
$_SESSION['linked'] = serialize($linked);
//$this->session->set_userdata('linked',$linked);
http://localhost/alphad/Applications/
/*var_dump($linkedIn);
die();*/
