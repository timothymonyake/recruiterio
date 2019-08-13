<?php
require('init.php');

if( $_GET['state'] != $_SESSION['linkedincsrf'])
{
    die("INVALID REQUEST");
}

$accessToken = $linkedIn->getAccessToken($_GET['code']);
if(!$accessToken)
{
   die("NO ACCESS TOKEN FOUND LOGIN AGAIN"); 
}


$_SESSION['linkedInAccessToken'] = $accessToken;
header("location: profile.php");

var_dump($accessToken);
die();