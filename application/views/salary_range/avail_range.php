
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Edit Salary Range(s)</title>

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
            .logout{background-color: #de1a1a;color:white}
            .logout:hover{background-color: #2390e9;color:white}
            
   </style>
   <script type="text/javascript">
       function deleteRange(id)
       {
           if(confirm("sure you want to delete this record?"))
           {
               window.location.href = "<?php echo base_url('Salary_ranges/deleteR');?>"+'/'+id;
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
            <a class="nav-link js-scroll-trigger text-white" href="<?php echo base_url('Admin')?>">Application(s)</a>
          </li> 
          <li class="nav-item">
              <a class="nav-link js-scroll-trigger text-white" href="<?php echo base_url('Occupations')?>">Occupation</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger text-white" href="<?php echo base_url('Salary_ranges')?>">Salary range</a>
          </li>
           <li class="nav-item">
            <a class="nav-link js-scroll-trigger text-white logout" href="<?php echo base_url('Admin/logout')?>">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  


          <!-- form-->
          <br><br><br>
          
 <div class =" container">
         <!-- Modal -->
         <div class = "modal fade" id = "addModal" tabindex = "-1" role = "dialog" aria-labelledby ="ModalLabel" aria-hidden = "true">
            <div class = "modal-dialog" role = "document">
               <div class = "modal-content">
                  <div class = "modal-header">
                     <h5 class = "modal-title" id = "ModalLabel">Enter Occupation Details</h5>
                     <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
                        <span aria-hidden = "true">×</span>
                     </button>
                  </div>
                  
                  <div class = "modal-body">
                        <form class="form-horizontal" method="post" action="<?php echo base_url('Salary_ranges/addRange')?> ">   
                            <div class="form-group">  
                                <label>Salary Range</label>
                                     <input type="text" class="col-lg-12 input-md form-control" name="s_range" required="" /> 
                                 </div>                 
                            <input type="submit" href="<?php base_url('Salary_ranges/addRange')?> " name="submit" value="Add Occupation" class="btn btn-block btn-md btn-success col-lg-12"/>
                        </form>
                               </div>
                  
                 <!-- <div class = "modal-footer">
                          
                  </div> -->
                  
               </div>
            </div>
         </div>
</div>
          
          
          <br><br><br>
          
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-8">
                    <h4>Available Salary Ranges</h4>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-3">
                    <a class="btn btn-block btn-primary" data-toggle = "modal" data-target = "#addModal">Add</a>
                </div>
            </div> <br>
            
               <?php
          if($added= $this->session->flashdata('added'))
            {
            ?>
              <div class="col-sm-12">
                <div class="alert alert-success" id="success-alert">
                  <button class="close" data-dismiss="alert" type="button">×</button>
                    <?php echo $added; ?>
                  <div class="alerts-con"></div>
                </div>
              </div>
         <?php
              }
            ?>
            
            <?php
             if($not_added = $this->session->flashdata('not_added'))
            {
            ?>
              <div class="col-sm-12">
                <div class="alert alert-danger">
                  <button class="close" data-dismiss="alert" type="button">×</button>
                    <?php echo $not_added; ?>
                  <div class="alerts-con"></div>
                </div>
              </div>
          <?php
              }
            ?>
            
            
             <?php
          if($updated = $this->session->flashdata('updated'))
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
             if($not_updated = $this->session->flashdata('not_updated'))
            {
            ?>
              <div class="col-sm-12">
                <div class="alert alert-success" id="success-alert">
                  <button class="close" data-dismiss="alert" type="button">×</button>
                    <?php echo $not_updated; ?>
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
                <div class="alert alert-danger" >
                  <button class="close" data-dismiss="alert" type="button">×</button>
                    <?php echo $deleted; ?>
                  <div class="alerts-con"></div>
                </div>
              </div>
             <?php
              }
            ?>
            
            <?php
            if($not_deleted = $this->session->flashdata('not_deleted '))
            {
            ?>
              <div class="col-sm-12">
                <div class="alert alert-danger">
                  <button class="close" data-dismiss="alert" type="button">×</button>
                    <?php echo $not_deleted ; ?>
                  <div class="alerts-con"></div>
                </div>
              </div>
            <?php
              }
            ?>
      
            
            <table class="table table-inverse" >
                <thead>
                    <tr>
                       <th>id</th>
                      <th>Title</th>
                      <th>Description</th>
                   </tr>
                </thead>
                 <tbody>
                     <?php foreach($data as $row){?> 
                   <tr>
                       
                       <td><?php echo $row['id']?></td>
                       <td><?php echo $row['s_range']?></td>
                       <td>
                            <a class="btn  btn-sm btn-icon icon-left text-primary" style="margin: 0px"  data-toggle="modal" data-target="#test<?php echo $row['id']?>" title="edit range" onclick=""><i class="far fa-edit"></i>
                            </a>&nbsp;
                            <a class="btn  btn-sm btn-icon icon-left text-danger" href="javascript:deleteRange(<?php echo $row['id']?>)" title="delete range"><i class="fas fa-minus-circle"></i>
                            </a>
                       </td>                       
                  
                   
                   <!-- modal--->
                   <div class = "modal fade" id="test<?php echo $row['id']?>" tabindex = "-1" role = "dialog" aria-labelledby ="ModalLabel" aria-hidden = "true">
            <div class = "modal-dialog" role = "document">
               <div class = "modal-content">
                  <div class = "modal-header">
                     <h5 class = "modal-title" id = "ModalLabel">Edit Salary Range Details</h5>
                     <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
                        <span aria-hidden = "true">×</span>
                     </button>
                  </div>
                  
                  <div class = "modal-body">
                        <form action="<?php echo base_url('Salary_ranges/updateR')?>" method="post">
                          
                                <?php $result = $this->db->get_where('salary_range',array('id'=>$row['id']))->row_array();
                                    //print_r($result);
                                
                                ?>
                                <p><?php ?></p>
                                
                                <div class="form-group">                 
                                    <input type="hidden" class="col-lg-12 input-md form-control" value="<?php echo $result['id']?>" name="uid" /> 
                              </div> 
                                
                                <label>Title</label> 
                              <div class="form-group">                 
                                  <input type="text" class="col-lg-12 input-md form-control" value="<?php echo $result['s_range']?>" name="us_range" required="" placeholder=""/> 
                              </div>    
                         <input type="submit" name="submit" value="Edit" class="btn btn-block btn-md btn-primary col-lg-12"/>
                       </form>
                               </div>
                  </div>
                 <!-- <div class = "modal-footer">      </div> -->                  
               </div>
             
            </div>
                   <!-- end modal -->
                    </tr>
                     <?php }?>
                 </tbody>
            </table>
            
            
             <br><br><br>
             
             
              <div class =" container">
         <!-- Modal -->

         
         
              </div>
       
            <br><br><br>
            
            
            
            
            
              <br><br><br>


        </div>
        <div class="col-lg-6"></div>
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
