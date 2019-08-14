
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Edit Application(s)</title>

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
           .logout{background-color: #de1a1a;color:white}
            .logout:hover{background-color: #2390e9;color:white}
            
   </style>
   <script type="text/javascript">
       function deleteApplication(id)
       {
           if(confirm("sure you want to delete this record?"))
           {
               window.location.href = "<?php echo base_url('Admin/deleteA');?>"+'/'+id;
           }
       }
       function validation()
{
     var image =document.getElementById("pic").value;
     if(image!='')
     {
          var checkimg = image.toLowerCase();
          if (!checkimg.match(/(\.jpg|\.png|\.JPG|\.PNG|\.jpeg|\.JPEG|\.gif|.\GIF)$/)){ // validation of file extension using regular expression before file upload
              document.getElementById("pic").focus();
              document.getElementById("pic_error").innerHTML="Wrong file selected"; 
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
              document.getElementById("pdf_error").innerHTML="Wrong file selected"; 
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
      <button class="navbar-toggler navbar-toggler-right text-white" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
         <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger text-white" href="<?php echo base_url('Admin')?>">Application(s)</a>
          </li> 
          <li class="nav-item">
              <a class="nav-link js-scroll-trigger text-white" href="<?php echo base_url('Occupations')?>">Occupation</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger text-white" href="<?php echo base_url('Salary_ranges')?>">Salary range</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger text-white admin" href="<?php echo base_url('Admin/logout')?>">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  


          <!-- form-->
          <br><br><br>
          

          
          
          <br><br><br>
          
<div class="container-fluid">
    <div class="row">
      
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-5">
                    <h4>Submitted Applications</h4>
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-5">
                <!--    <a class="btn btn-block btn-primary" data-toggle = "modal" data-target = "#addModal">Add</a>
                -->
                </div>
            </div> <br>
             
                 <?php
          if($updated= $this->session->flashdata('updated'))
            {
            ?>
              <div class="col-sm-12">
                <div class="alert alert-success" id="success-alert">
                  <button class="close" data-dismiss="alert" type="button">×</button>
                    <?php echo $updated; ?>
                  <div class="alerts-con"></div>
                </div>
              </div>
         <?php
              }
            ?>
            
            <?php
             if($deleted = $this->session->flashdata('deleted'))
            {
            ?>
              <div class="col-sm-12">
                <div class="alert alert-danger">
                  <button class="close" data-dismiss="alert" type="button">×</button>
                    <?php echo $deleted ; ?>
                  <div class="alerts-con"></div>
                </div>
              </div>
          <?php
              }
            ?>
             
            <table class="table table-hover" >
                <thead>
                    <tr>
                       <th>id</th>
                      <th>Firstname</th>
                      <th>Lastname</th>
                       <th>Gender</th>
                      <th>Date Of Birth</th>
                      <th>Email</th>
                       <th>Occupation</th>
                      <th>Salary Range</th>
                      <th>Profile Picture</th>
                      <th>Resume</th>
                   </tr>
                </thead>
                 <tbody>
                     <?php foreach($application as $row){?>
                   <tr>
                       
                       <td><?php echo $row['id']?></td>
                       <td><?php echo $row['firstname']?></td>
                       <td><?php echo $row['lastname']?></td>
                       <td><?php echo $row['gender']?></td>
                       <td><?php echo $row['dob']?></td>
                       <td><?php echo $row['email']?></td>
                       <td><?php echo $row['occupation']?></td>
                       <td><?php echo $row['s_range']?></td>
                       <td><img src="<?php echo base_url('uploads/pro_pics').'/'.$row['pic']?>" height="30" width="30" alt="profile picture" class=""></td>
                       <td>  
                        <!--opening pdf on screen   
                        <object type="application/pdf" data="<?php //echo $row['resume']?>" width="450" height="600"></object> -->
                        <a href="<?php echo base_url('uploads/resumes/').$row['resume']?>">view cv</a>
                       </td>
                       <td>
                            <a class="btn  btn-sm btn-icon icon-left text-primary" style="margin: 0px"  data-toggle="modal" data-target="#mod<?php echo $row['id']?>" title="edit occupation" onclick=""><i class="far fa-edit"></i>
                            </a>&nbsp;
                            <a class="btn  btn-sm btn-icon icon-left text-danger" href="javascript:deleteApplication(<?php echo $row['id']?>)" title="delete application"><i class="fas fa-minus-circle"></i>
                            </a>
                       </td>  
                       
                       
                       <!-- modal-->
                       
       <div class = "modal fade" id="mod<?php echo $row['id']?>" tabindex = "-1" role = "dialog" aria-labelledby ="ModalLabel" aria-hidden = "true">
            <div class = "modal-dialog" role = "document">
               <div class = "modal-content">
                  <div class = "modal-header">
                     <h5 class = "modal-title" id = "ModalLabel">Edit Occupation Details</h5>
                     <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
                        <span aria-hidden = "true">×</span>
                     </button>
                  </div>
                  <?php $res = $this->db->get_where('applicants',array('id'=>$row['id']))->row_array();?>
                  <div class = "modal-body">
                         <h3>Please apply here</h3>
             <form class="form-horizontal" method="post" onsubmit="return validation()" action="<?php echo base_url('Admin/updateA')?>" enctype="multipart/form-data">
                    
                 <div class="form-group">
                     
                     <input type="text" class="col-lg-12 input-md form-control" name="firstname" required="" value="<?php echo $res['firstname']?>"/> 
                 </div>
                 
                  <div class="form-group">
                     <input type="text" class="col-lg-12 input-md form-control" name="lastname" required="" value="<?php echo $res['lastname']?>"/> 
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
                     <input class="col-lg-12 input-md form-control" name="dob" value="<?php echo $res['dob']?>"type="date"/>
                 </div>
                 
                 
                  <div class="form-group">
                     <input type="email" class="col-lg-12 input-md form-control" name="email" required="" value="<?php echo $res['email']?>"/> 
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
                                        <span><img src="<?php echo base_url('uploads/pro_pics').'/'.$res['pic']?>" height="30" width="30" alt="profile picture" class=""></span>
                                        <br>
                                        <p class="text-danger" id="pic_error"></p>
                              </div>
                 
                             <div class="form-group">
                                 <p>Upload Resume</p>
                                 <input type="file" id="pdf" class="col-lg-12 input-md form-control" name="resume" required="" /> 
                                 <span><a href="<?php echo base_url('uploads/resumes/').$res['resume']?>">view cv</a></span>
                             </div> 
                             <p class="text-danger" id="pdf_error"></p>
                              <input type="submit" name="submit" value="Submit application" class="btn btn-block btn-md btn-success col-lg-12">
             </form>
                  </div>
                  
                 
                  
               </div>
            </div>
         </div>
                       
                       <!--modal -->
                       
                       
                   </tr>
                   <?php }?>
                 </tbody>
            </table>
            
            
             <br><br><br>
             
             
              <div class =" container"></div>
       
            <br><br><br>
            
            
            
            
            
              <br><br><br>


        </div>
  
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
