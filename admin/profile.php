<?php include_once 'header.php'; ?>
 
 
  
<style type="text/css">
.button-time{
background-color: #aaaac4;
color: #f00a0a;
width: 120px;
height: 100px;
font-size: 22px;
border: 2px solid #e6c9c9;
border-radius: 5px;
margin-top: 5px;
margin-left: -20px;
 
    }
   .button-time p{
        color:white; 
        font-size: 14px;
    } 
   .button-time, .time-a:hover {
background-color: green;
color: #f00a0a;
width: 117px;
font-size: 22px;
border: 2px solid #e6c9c9;
border-radius: 5px;
margin-top: 5px;
margin-left: -20px;

    }
    body{
    padding-top: 68px;
    padding-bottom: 50px;
}
        .image-container {
            position: relative;
        }

        .image {
            opacity: 1;
            display: block;
            width: 100%;
            height: auto;
            transition: .5s ease;
            backface-visibility: hidden;
        }

        .middle {
            transition: .5s ease;
            opacity: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
        }

        .image-container:hover .image {
            opacity: 0.3;
        }

        .image-container:hover .middle {
            opacity: 1;
        }
</style>
    <!-- breadcrumb start-->
    <section class="breadcrumb_part breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Doctor profile</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->


<div style="margin-left: 100px;" class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <div class="card-title mb-4">
                            <div class="d-flex justify-content-start">
                              <?php 
                                       $viewdoctor = $sc->selectallId('our_doctor_table','od_id',$drid);
         
                        while ($row = $viewdoctor->fetch_assoc()) {

                               ?>
                                <div class="image-container">
                                    <img src="../<?php echo $row['od_image'];?>" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                                    <div class="middle">
                                        <input type="button" class="btn btn-secondary" id="btnChangePicture" value="Change" />
                                        <input type="file" style="display: none;" id="profilePicture" name="file" />
                                    </div>
                                </div>
                     
                                <div class="userData ml-3">
                                    <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><a href="#"><?php echo $row['od_name'];?></a></h2>
                                    <h6 class="d-block"><a href="#">Email:</a> <?php echo $row['od_email'];?></h6>
                           
                                </div>
                                    <?php } ?>
                                <div class="ml-auto">
                                    <input type="button" class="btn btn-primary d-none" id="btnDiscard" value="Discard Changes" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Basic Info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#connectedServices" role="tab" aria-controls="connectedServices" aria-selected="false">Update Profile</a>
                                    </li>
                                </ul>
                                <div class="tab-content ml-1" id="myTabContent">
                                    <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                                        

                                                      <?php
                if ($_SERVER['REQUEST_METHOD']=='POST') {
                    $login = $up->updateprofiledr($_POST,$_FILES,$drid);
                }
                    $viewdoctor = $sc->Doctorprofileview($drid);
                    if ($viewdoctor) {
                        while ($row = $viewdoctor->fetch_assoc()) {
                ?>




 
                                 


                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Full Name</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <?php echo $row['od_name'];?>
                                            </div>
                                        </div>
                                        <hr />

                  
                                        
                                        
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Email</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <?php echo $row['od_email'];?>
                                            </div>
                                        </div>
                                        <hr />
                          
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Phone</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <?php echo $row['od_phone'];?>
                                            </div>
                                        </div>
                                        <hr />
                  


                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Departmnet</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <?php echo $row['dept_name'];?>
                                            </div>
                                        </div>
                                        <hr />


                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Skype</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <?php echo $row['od_skype'];?>
                                            </div>
                                        </div>
                                        <hr />


                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Description</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <?php echo $row['od_desc'];?>
                                            </div>
                                        </div>
                                        <hr />

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">MY Fee</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <?php echo $row['od_fee'];?> Taka
                                            </div>
                                        </div>
                                        <hr />







                                    </div>
                                    <div class="tab-pane fade" id="connectedServices" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                       <div class="single_text">
                        
                             <div class="single_blog_text">
                                <style type="text/css">
                                    .customform{
                                        width: 600px;
                                        height: auto;
                                        background-color: #c1dfff;
                                        padding-top: 30px;
                                        padding-bottom: 30px;
                                    }
                                    .customform label{
                                         margin-left: 50px;
                                         margin-top: 10px;

                                    }
                                    .customform .inputcls{
                                      
                                        height: 60px; width: auto; 
                                            
                                        }
                                    .customform .inputcls input{
                                          
                                            padding: 5px; width: 400px; border-radius: 5px;float: right; margin-right: 10px;
                                                
                                            }
                                            .genderway{
                                                margin-right: 159px;
                                                margin-top: -10px;
                                            }
                                    .genderway label,input{
                                        float: right;

                                    }

                                </style>
                            <br>
                            <form class="customform" action="" method="post" enctype= multipart/form-data>
                                <?php 
                                 $viewdoctor = $sc->selectallId('our_doctor_table','od_id',$drid);
                                    if ($viewdoctor) {
                                        while ($row = $viewdoctor->fetch_assoc()) {

                                 ?>
                                <div class="inputcls">
                                    
                                <label>Name</label>
                                <input  type="text" value="<?php echo $row['od_name']; ?>"  name="customer_name">
                                </div>
                               <div class="inputcls">
                                    
                                <label>Email</label>
                                <input  type="text" value="<?php echo $row['od_email']; ?>"  name="customer_email">
                                </div>
                               
                                <div class="inputcls">
                                <label>Phone</label>
                                <input value="<?php echo $row['od_phone']; ?>" type="text" name="customer_phone">
                                </div>
                            
                                <div class="inputcls">
                                <label>Skype</label>
                                <input value="<?php echo $row['od_skype']; ?>" type="" name="customer_skype">
                                </div>
                                <div class="inputcls">
                                <label>Description</label>
                                <textarea style="adding: 5px;
    width: 400px;
    border-radius: 5px;
    float: right;
    margin-right: 10px;" type="" name="od_desc"><?php echo $row['od_desc']; ?></textarea>.
                                </div>
                                <div class="inputcls">
                                <label>MY Fee</label>
                                <input value="<?php echo $row['od_fee']; ?>" type="" name="od_fee">
                                </div>
                                
        
  

                              <div style="margin-top: 10px;" class="inputcls">
                                <label>Image</label>
                                 <input style="margin-top: 0px;" type="file" name="image">
                             </div>

                             
                         <?php } } ?>
                             <div style="margin-top: 20px;">
                                 <button style="margin-left: 50%" class="btn btn-primary">Save profile</button>
                             </div>
                            </form>
                            </div>
                      
                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>




























 
    <!--::doctor_part end::-->
 

     <?php }} include_once 'footer.php'; ?>