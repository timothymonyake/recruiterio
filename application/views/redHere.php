<?php
//print("hi");
require_once APPPATH . 'third_party/guzzle/init.php';

//require_once APPPATH . 'third_party/guzzle/LinkedIn.php';

if( $_GET['state'] != $_SESSION['linkedincsrf'])
{
    die("INVALID REQUEST");
}
$linked = unserialize($_SESSION['linked']);
$accessToken = $linked->getAccessToken($_GET['code']);
if(!$accessToken)
{
   die("NO ACCESS TOKEN FOUND LOGIN AGAIN"); 
}


$_SESSION['linkedInAccessToken'] = $accessToken;
redirect('Applications');

var_dump($accessToken);
die();