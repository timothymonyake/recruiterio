<?php
 require_once(APPPATH.'third_party/guzzle/init.php');
 if(isset($_SESSION['linked']))
 {
    $linked = unserialize($_SESSION['linked']);
    $profile = $linked->getPerson($_SESSION['linkedInAccessToken']);
 //  echo"<br><br><br>";
    //var_dump($profile);
 }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Apply - get closer to your dream job</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">

  <!-- Custom fonts for this template -->
 
  <link href="<?php echo base_url('assets/bootstrap/css/all.min.css');?>" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template 
  <link href="<?php //echo base_url('assets/bootstrap/css/grayscale.min.css');?>" rel="stylesheet">-->
  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
   <script src="<?php echo base_url('assets/fa/css/all.min.css');?>"></script>

  <!-- Custom fonts for this template -->
 
  <link href="<?php echo base_url('assets/bootstrap/css/all.min.css');?>" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template 
  <link href="<?php //echo base_url('assets/bootstrap/css/grayscale.min.css');?>" rel="stylesheet">-->
   <style type="text/css">
            
            ul.navbar-nav li.nav-item a:hover{background:#de1a1a}
            .form-group textarea ,.btn,input[type="text"]{border-radius: 0px}
            
            #login{background:#de1a1a;color:white}
            #login:hover{color:#de1a1a;background: white}
            
   </style>
   <script type="text/javascript">
function validation()
{
     var image =document.getElementById("pic").value;
     if(image!='')
     {
          var checkimg = image.toLowerCase();
          if (!checkimg.match(/(\.jpg|\.png|\.JPG|\.PNG|\.jpeg|\.JPEG|\.gif|.\GIF)$/)){ // validation of file extension using regular expression before file upload
              document.getElementById("pic").focus();
              document.getElementById("pic_error").innerHTML="Wrong file format selected"; 
              return false;
           }
            var img = document.getElementById("pic"); 
            //alert(img.files[0].size);
            if(img.files[0].size >  1048576)  // validation according to file size
            {
               var sze = img.files[0].size / 1000000;
               var s = sze.toPrecision(2);
           document.getElementById("pic_error").innerHTML="image too big("+s+"MB) -- max size = 1MB";
            return false;
             }
              var pdf =document.getElementById("pdf").value;
     if(pdf!='')
     {
          var checkimg = pdf.toLowerCase();
          if (!checkimg.match(/(\.pdf|\.PDF)$/)){ // validation of file extension using regular expression before file upload
              document.getElementById("pdf").focus();
              document.getElementById("pdf_error").innerHTML="Wrong file format selected"; 
              return false;
           }
            var pdf = document.getElementById("pdf"); 
            //alert(img.files[0].size);
            if(pdf.files[0].size >  1048576)  // validation according to file size
            {
               var sze = pdf.files[0].size / 1000000;
               var s = sze.toPrecision(2);
           document.getElementById("pdf_error").innerHTML="pdf too big("+s+"MB) -- max size = 1MB";
            return false;
             }
             return true;
      }
      }
     
}
   </script>

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav" style="background: black">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger text-white" href="<?php echo base_url()?>">Recruiter<span style="color:#de1a1a">IO</span></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger text-white" href="<?php echo base_url('Applications')?>">Apply Now</a>
          </li> 
          </ul>
      </div>
    </div>
  </nav>

  
          <br><br><br>
          

          
          <?php $linkedIn= unserialize($_SESSION['linked']);
          //print($this->session->userdata('linked'));?>
            <div class="container-fluid">
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
             <h3>Please apply here</h3>
              <a href="javascript:void(0)"  onclick="location.href='<?php echo $linkedIn->getAuthUrl();?>'" class="btn btn-block btn-primary btn-flat">Fill the form using LinkedIn</a>
   <br>
               
               <?php
          if($applied= $this->session->flashdata('applied'))
            {
            ?>
              <div class="col-sm-12">
                <div class="alert alert-success" id="success-alert">
                  <button class="close" data-dismiss="alert" type="button">×</button>
                    <?php echo $applied; ?>
                  <div class="alerts-con"></div>
                </div>
              </div>
         <?php
              }
            ?>
            
            <?php
             if($error = $this->session->flashdata('error'))
            {
            ?>
              <div class="col-sm-12">
                <div class="alert alert-danger">
                  <button class="close" data-dismiss="alert" type="button">×</button>
                    <?php echo $error; ?>
                  <div class="alerts-con"></div>
                </div>
              </div>
          <?php
              }
            ?>
             
   <form class="form-horizontal" method="post" onsubmit="return validation()" action="<?php echo base_url('Applications/apply')?>" enctype="multipart/form-data">
                    
                 <div class="form-group">
                     <label>Firstname</label>
                     <input type="text" class="col-lg-12 input-md form-control" value="<?php if(isset($profile)){ echo $profile->firstName->localized->en_US;}?>" name="firstname"  required="" /> 
                 </div>
                 <label>Lastname</label>
                  <div class="form-group">
                     <input type="text" class="col-lg-12 input-md form-control" value="<?php if(isset($profile)){echo $profile->lastName->localized->en_US;}?>" name="lastname" required="" /> 
                 </div>
                 
                 <div class="col-lg-12">
                     <div class="col-lg-6">
                         <label>Gender</label>
                         <div class="form-group">                     
                            <select name="gender" class="col-lg-12">
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                         </div>
                     </div>
                 </div>
                 
                 <div class="form-group">
                     <label>Date of birth</label>
                     <input class="col-lg-12 input-md form-control" name="dob" type="date"/>
                 </div>
                 
                 
                  <div class="form-group">
                     <input type="email" class="col-lg-12 input-md form-control" name="email" required="" placeholder="Email Address"/> 
                 </div>          
                 
                 
                  <div class="col-lg-12">
                     <div class="col-lg-6">
                         <label>Current Occupation</label>
                        
                         <div class="form-group">                     
                            <select name="occupation" class="col-lg-12">
                                <?php //$occs = $this->db->get('occupation'); var_dump($occs);
                          $occupation = $this->db->get('occupation')->result_array();
                          
                          foreach($occupation as $occ){
                         ?>
                                <option><?php echo $occ['title']?>
                           <?php }?>
                                    </option>
                            </select>
                            
                         </div>
                     </div>
                      
                      
                       <div class="col-lg-6">
                         <label>Salary Range</label>
                        
                         <div class="form-group">                     
                            <select name="s_range" class="col-lg-12">
                                <?php //$occs = $this->db->get('occupation'); var_dump($occs);
                          $s_ranges = $this->db->get('salary_range')->result_array();
                          
                          foreach($s_ranges as $sr){
                         ?>
                                <option><?php echo $sr['s_range']?>
                           <?php }?>
                                    </option>
                            </select>
                            
                         </div>
                     </div>
                  
                 </div>
                 
                 
                 
                              <div class="form-group">
                                        <p>Profile Picture</p>
                                        <input type="file" id="pic" class="col-lg-12 input-md form-control"  name="pic" required="" /> 
                                        <br>
                                        <p class="text-danger" id="pic_error"></p>
                              </div>
                 
                             <div class="form-group">
                                 <p>Upload Resume</p>
                                 <input type="file" id="pdf" class="col-lg-12 input-md form-control" name="resume" required="" /> 
                             </div> 
                             <p class="text-danger" id="pdf_error"></p>
                              <input type="submit" name="submit" value="Submit application" class="btn btn-block btn-md btn-success col-lg-12">
            </form>
             
             <!-- 
             <form class="form-horizontal" method="post" action="<?php echo base_url('Applications/tester')?>" enctype="multipart/form-data">
                 
                 <div class="form-group">
                     <a class="btn btn-block btn-md btn-primary col-lg-12  text-black" href="https://www.linkedin.com/uas/oauth2/authorization?response_type=code&client_id=86gaftoyzq1mq8&redirect_uri=http://localhost/alphad/&state=987654321&scope=r_emailaddress">Apply using LinkedIn info</a>
                 </div>
                 
                 
                 
                 
                
               
                 
                 
                <div class="form-group">
                    <p>Profile Picture</p>
                    <input type="file" class="col-lg-12 input-md form-control" name="pic" required="" /> 
                </div>
                 
                 <div class="form-group">
                    <p>Upload Resume</p>
                    <input type="file" class="col-lg-12 input-md form-control" name="resume" required="" /> 
                </div>
                 
                 <input type="submit" value="Submit application" class="btn btn-block btn-md btn-success col-lg-12">
               
             </form>
             -->
        </div>
        <div class="col-lg-4"></div>
    </div>
   
</div>
          
   

  
  <!-- Bootstrap core JavaScript -->
 <script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>

 <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
 
  <script src="<?php echo base_url('assets/bootstrap/js/popper.min.js');?>"></script>
  
  <script src="<?php echo base_url('assets/fa/js/all.min.js');?>"></script>
 
<script src="<?php echo base_url('assets/bootstrap/js/jquery.easing.min.js');?>"></script>

  <!-- Custom scripts for this template -->
 

</body>

</html>
