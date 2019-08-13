<?php 
require('init.php');
$profile = $linkedIn->getPerson($_SESSION['linkedInAccessToken']);
var_dump($profile);
die();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Linked In Demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="bootstrap.min.css" />
 
</head>
<body>



<div class="container">
    <div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
    <h3>Profile</h3>
    <br>
    <p><?php echo $profile->firstName->localized->en_US;?></p>
    <?php echo $profile->lastName->localized->en_US;?></p>
    <?php echo $profile->email->localized->en_US; 
    echo  $profile->id?></p>

    </div>
    <div class="col-lg-4"></div>
    </div>
</div>


</body>
<script src="jquery-3.2.1.slim.min.js"></script>
<script src="bootstrap.min.js"></script>
</html>