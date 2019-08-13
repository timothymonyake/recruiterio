<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Getting you your dream job</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">

  <!-- Custom fonts for this template -->
 
  <link href="<?php echo base_url('assets/bootstrap/css/all.min.css');?>" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url('assets/bootstrap/css/grayscale.min.css');?>" rel="stylesheet">
   <style type="text/css">
            .btn-primary:hover{border-radius: 0px;border: #de1a1a solid thin;color: white;background:  #de1a1a }
            .btn-primary{border-radius: 0px;border: white solid thin;background: none}
            ul.navbar-nav li.nav-item a:hover{background:#de1a1a}
            .form-group textarea ,.btn,input[type="text"]{border-radius: 0px}
            
   </style>

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
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
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger text-white" data-target="#login" data-toggle="modal">Login</a>
          </li> 
     
        </ul>
      </div>
    </div>
  </nav>
  
  
   <div class = "modal fade" id="login" tabindex = "-1" role = "dialog" aria-labelledby ="ModalLabel" aria-hidden = "true">
            <div class = "modal-dialog" role = "document">
               <div class = "modal-content">
                  <div class = "modal-header">
                     <h5 class = "modal-title" id = "ModalLabel">Please log in with provided details</h5>
                     <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
                        <span aria-hidden = "true">×</span>
                     </button>
                  </div>
                  
                  <div class = "modal-body">
                        <form action="<?php echo base_url('Admin/login')?>" method="post">
                          
                       
                               <label>username</label> 
                              <div class="form-group">                 
                                  <input type="text" class="col-lg-12 input-md form-control" name="username" required="" placeholder=""/> 
                              </div>  
                                
                               <label>password</label> 
                              <div class="form-group">                 
                                  <input type="password" class="col-lg-12 input-md form-control" name="password" required="" placeholder=""/> 
                              </div>    
                         <input type="submit" name="submit" value="Login" style="color:white;background:#de1a1a" class="btn btn-block btn-md btn-primary col-lg-12"/>
                       </form>
                               </div>
                  </div>
                 <!-- <div class = "modal-footer">      </div> -->                  
               </div>
             
            </div>

  <!-- Header -->
  <header class="masthead">
     
    <div class="container d-flex h-100 align-items-center">
      <div class="mx-auto text-center">
        <h1 class="mx-auto my-0 text-uppercase">RecruiterIO</h1>
        <h2 class="text-white mx-auto mt-2 mb-5">Recruiter<span style="color:#de1a1a">IO</span> a smarter way to apply for jobs online.</h2>
        <a href="<?php echo base_url('Applications/apply')?>" class="btn btn-primary js-scroll-trigger">Apply now</a>
      <?php 
       if($error = $this->session->flashdata('error'))
            {
            ?>
              <div class="col-sm-12">
                <div class="alert alert-success" id="success-alert">
                  <button class="close" data-dismiss="alert" type="button">×</button>
                    <?php echo $error; ?>
                  <div class="alerts-con"></div>
                </div>
              </div>
         <?php
              }
            ?>
      </div>
    </div>
  </header>

  
  <!-- Bootstrap core JavaScript -->
 <script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>

 <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
 
<script src="<?php echo base_url('assets/bootstrap/js/jquery.easing.min.js');?>"></script>

  <!-- Custom scripts for this template -->
 

</body>

</html>
